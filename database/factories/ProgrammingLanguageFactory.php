<?php

namespace Database\Factories;

use App\Models\ProgrammingLanguage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgrammingLanguageFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = ProgrammingLanguage::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'user_id' => "1",
      'name' => "C#",
      'description' => "C# Factory Create",
      'robot' => "",
      'call_function' => "",
      'compile_code' => "",
      'compiler_file' => "",
      'extension' => "",
      'header' => null,
      'footer' => null,
      'main_function' => "void Main() { comandos }",
      'other_functions' => "void funcao() { comandos }",
      'send_code' => "",
      'sent_extension' => "",
      'data_types' => json_encode([
        'declare_float' => "float variavel = valor;",
        'declare_string' => "string variavel = valor;",
        'declare_boolean' => "bool variavel = valor;",
        'declare_true' => "true",
        'declare_false' => "false",
      ]),
      'control_flows' => json_encode([
        'if_code' => "if(condicao){comandos}",
        'else_if' => "else if(condicao){comandos}",
        'else' => "else{comandos}",
        'repeat_code' => "",
        'while_code' => "while(condicao){comandos}",
        'for_code' => "for(variavel;valor1 < valor2;passo){comandos}",
        'switch_code' => "",
        'case' => "",
        'do_code' => "do{condicao}while(comandos)",
        'break_code' => "break;",
      ]),
      'data_operators' => json_encode([
        'equals_to' => "==",
        'not_equal_to' => "!=",
        'greater_than' => ">",
        'greater_than_or_equals_to' => ">=",
        'less_than' => "<",
        'less_than_or_equals_to' => "<=",
        'logical_and' => "&&",
        'logical_or' => "||",
        'logical_not' => "!",
      ]),
      'is_private' => "0",
    ];
  }
}
