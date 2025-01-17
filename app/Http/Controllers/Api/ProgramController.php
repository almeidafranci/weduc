<?php

namespace App\Http\Controllers\Api;

use App\Events\ProgramCompiled;
use App\Models\Program;
use App\Models\ProgrammingLanguage;
use App\Services\CodeSender;
use App\Services\TargetCompiler;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Natalnet\Relex\Exceptions\InvalidCharacterException;
use Natalnet\Relex\Exceptions\SymbolNotDefinedException;
use Natalnet\Relex\Exceptions\SymbolRedeclaredException;
use Natalnet\Relex\Exceptions\TypeMismatchException;
use Natalnet\Relex\Exceptions\UnexpectedTokenException;
use Natalnet\Relex\FunctionSymbol;
use Natalnet\Relex\ReducLexer;
use Natalnet\Relex\EnglishReducLexer;
use Natalnet\Relex\ReducParser;
use Natalnet\Relex\Translator\Translator;
use Natalnet\Relex\Types;

class ProgramController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:api');
    }

    public function indexOfCurrentUser()
    {
        return auth()->user()->programs;
    }

    public function indexOfCurrentUserOfLanguage(ProgrammingLanguage $language)
    {
        return auth()->user()->programs()->ofLanguage($language)->get();
    }

    public function indexForUser(User $user)
    {
        return $user->programs;
    }

    public function store(Request $request)
    {
        $request->validate([
            'target_language_id' => 'required|exists:programming_languages,id',
            'name' => [
                'required',
                Rule::unique('programs')->where(function ($query) {
                    return $query->where('user_id', auth()->id());
                })
            ],
            'blockly_code' => [
                'bail',
                'required_without_all:reduc_code,target_code',
                Rule::requiredIf(function () use ($request) {
                    return $request->reduc_code === null && $request->target_code === null;
                })
            ],
            'reduc_code' => 'required_without:target_code|required_if:target_code,null',
            'target_code' => 'required_if:reduc_code,null',
        ]);

        $language = ProgrammingLanguage::findOrFail($request->target_language_id);
        $program = new Program();
        $program->user_id = auth()->user()->id;
        $program->name = $request->name;
        $program->blockly_code = $request->blockly_code;
        $program->reduc_code = $request->reduc_code;
        $program->custom_code = $request->target_code;

        return $language->programs()->save($program);
    }

    public function show(Program $program)
    {
        $this->authorize('view', $program);

        return $program;
    }

    public function update(Request $request, Program $program)
    {
        $request->validate([
            'name' => 'required',
            'blockly_code' => [
                'bail',
                'required_without_all:reduc_code,target_code',
                Rule::requiredIf(function () use ($request) {
                    return $request->reduc_code === null && $request->target_code === null;
                })
            ],
            'reduc_code' => 'required_without:target_code|required_if:target_code,null',
            'target_code' => 'required_if:reduc_code,null',
        ]);

        $program->name = $request->name;
        $program->blockly_code = $request->blockly_code;
        $program->reduc_code = $request->reduc_code;
        $program->custom_code = $request->target_code;
        $program->save();

        return response(null, 204);
    }

    public function compile(Request $request, Program $program)
    {
        $this->authorize('compile', $program);

        if ($program->reduc_code === null) {
            throw ValidationException::withMessages([
                'reduc_code' => 'O código reduc é obrigatório.'
            ]);
        }

        $started_at = Carbon::now()->toDateTimeString();

        try {
            // Create a new Redux Lexer from the code to be compiled
            if ($program->language->keywords_language === 'pt_BR')
                $lexer = new ReducLexer($program->reduc_code);
            else {
                $lexer = new EnglishReducLexer($program->reduc_code);
            }

            // Use the Lexer to generate an Reduc Parser
            $parser = new ReducParser($lexer);

            $language = $program->language;

            // Loop through each language function and define its corresponding symbol in the parser
            foreach ($language->functions as $function) {
                $parameters = $this->getFunctionParams($function->code);

                $returnType = null;
                switch ($function->return_type) {
                    case 'float':
                        $returnType = Types::NUMBER_TYPE;
                        break;
                    case 'String':
                        $returnType = Types::STRING_TYPE;
                        break;
                    case 'boolean':
                        $returnType = Types::BOOLEAN_TYPE;
                        break;
                }

                $parser->symbolTable->define(new FunctionSymbol($function->name, $returnType, $parameters));
            }

            $parser->parse();

            $trans = new Translator($parser->parseTree);

            if ($program->language->keywords_language !== 'pt_BR')
                $trans->setTranslationKeywordsLanguage($program->language->keywords_language);

            $trans->setMainFunction($language->main_function);
            $trans->setTaskDeclaration($language->other_functions);
            $trans->setCallFunction($language->call_function);
            $trans->setInstructionSeparator(";\r\n");
            $controlFlow = $language->controlFlowStatements()->first();

            $trans->setIfStatement($controlFlow->if_code);
            $trans->setElseIfStatement($controlFlow->else_if);
            $trans->setElseStatement($controlFlow->else);
            $trans->setRepeatStatement($controlFlow->repeat_code);
            $trans->setWhileStatement($controlFlow->while_code);
            $trans->setForStatement($controlFlow->for_code);
            $trans->setSwitchStatement($controlFlow->switch_code);
            $trans->setSwitchCaseStatement($controlFlow->case);
            $trans->setDoStatement($controlFlow->do_code);
            $trans->setOperators([
                ReducLexer::T_E => '&&',
                ReducLexer::T_OU => '||',
                ReducLexer::T_NEGATE => '!',
                ReducLexer::T_EQUALS_EQUALS => '==',
                ReducLexer::T_NOT_EQUAL => '!=',
                ReducLexer::T_LESS_THAN => '<',
                ReducLexer::T_GREATER_THAN => '>',
                ReducLexer::T_LESS_THAN_EQUAL => '<=',
                ReducLexer::T_GREATER_THAN_EQUAL => '>=',
            ]);

            $trans->setVariableDeclarations([
                Types::NUMBER_TYPE => $language->getDataType('declare_float'),
                Types::STRING_TYPE => $language->getDataType('declare_string'),
                Types::BOOLEAN_TYPE => $language->getDataType('declare_boolean'),
            ]);

            $functions = [];
            foreach ($language->functions as $function) {
                $functions[$function->name] = $function->code;
            }
            $trans->setFunctions($functions);
            $trans->translate();

            $program->custom_code = $language->header . $trans->getTranslation() . $language->footer;
            $program->save();

            event(new ProgramCompiled($program));
        } catch (\Exception $e) {
            if ($e instanceof InvalidCharacterException) {
                $line = $e->codeLine;
                $message = __('reduc.invalid_character', ['character' => $e->character]);
            } elseif ($e instanceof SymbolNotDefinedException) {
                $line = $e->codeLine;
                $message = __('reduc.symbol_not_defined', ['symbol' => $e->symbolName]);
            } elseif ($e instanceof TypeMismatchException) {
                $line = $e->codeLine;
                $message = __('reduc.type_mismatch', ['expected' => __('reduc.' . $e->expectedType), 'found' => __('reduc.' . $e->foundType)]);
            } elseif ($e instanceof UnexpectedTokenException) {
                $line = $e->codeLine;
                $message = __('reduc.unexpected_token', ['expected' => $e->expectedToken, 'found' => $e->foundToken]);
            } elseif ($e instanceof SymbolRedeclaredException) {
                $line = $e->codeLine;
                $message = __('reduc.symbol_redeclared', ['symbol' => $e->symbolName]);
            } else {
                $line = 0;
                $message = $e->getMessage();
            }

            event(new ProgramCompiled($program, $e));

            return response()->json([
                'message' => 'The compilation failed.',
                'errors' => [
                    'reduc_code' => [
                        'line' => $line,
                        'message' => $message
                    ]
                ],
                'started_at' => $started_at,
                'finished_at' => Carbon::now()
            ], 422);
        }

        return [
            'success' => true,
            'target_code' => $program->custom_code,
            'started_at' => $started_at,
            'finished_at' => Carbon::now()->toDateTimeString()
        ];
    }

//    public function compileTarget(Program $program)
//    {
//        TargetCompiler::compile($program);
//
//        return response(null, 204);
//    }

//    public function downloadCodeSender(Program $program)
//    {
//        $codeSender = (new CodeSender())->for($program)->prepare()->makeClient();
//
//        return response()->download($codeSender->senderPath());
//    }

    protected function getFunctionParams($functionCode)
    {
        $parameters = [];
        preg_match_all('/var[1-9]+\(([a-zA-Z]+)\)/', $functionCode, $matches);
        foreach (array_combine($matches[0], $matches[1]) as $parameter => $parameterType) {
            switch ($parameterType) {
                case 'int':
                    $parameters[$parameter] = Types::NUMBER_TYPE;
                    break;
                case 'String':
                    $parameters[$parameter] = Types::STRING_TYPE;
                    break;
                case 'boolean':
                    $parameters[$parameter] = Types::BOOLEAN_TYPE;
                    break;
            }
        }

        return array_values($parameters);
    }

    public function destroy(Program $program)
    {
        $program->delete();

        return response(null, 204);
    }
}
