<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
  public function index()
  {
    return view('languages');
  }
  public function view()
  {
    return view('languages_view');
  }
}
