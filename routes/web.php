<?php

use App\Http\Controllers\Dashboard\LanguageController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  // dd(session());
  return view('welcome');
});

Route::middleware(['auth:sanctum', 'locale'])->prefix('/dashboard')->group(function () {
  Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

  Route::prefix('/languages')->group(function () {
    Route::get('/', [LanguageController::class, 'index'])->name('languages');
    Route::get('/{id}', [LanguageController::class, 'view'])->name('languages.view');
  });
});