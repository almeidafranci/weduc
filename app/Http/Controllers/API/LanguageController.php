<?php

namespace App\Http\Controllers\API;

use App\ProgrammingLanguage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('functions');
    }

    public function index()
    {
        $languages = ProgrammingLanguage::get(['id', 'name', 'description']);

        return $languages;
    }

    public function functions(ProgrammingLanguage $language)
    {
        return $language->functions;
    }


    public function downloadSending(ProgrammingLanguage $language)
    {
        return response()->download($language->getFirstMedia('send')->getPath(), $language->id.'.zip');
    }
}
