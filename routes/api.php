<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProgramController;
use App\Http\Controllers\Api\ProgrammingLanguageController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/sanctum/token', [AuthController::class, 'makeToken']);

Route::middleware(['auth:sanctum', 'locale'])->group(function () {

    Route::prefix('/user')->group(function () {
        Route::get('/', [UserController::class, 'index']);
    });

    Route::prefix('/programs')->group(function () {
        Route::post('/', [ProgramController::class, 'store']);

        Route::prefix('/user')->group(function () {
            Route::get('/current', [ProgramController::class, 'indexOfCurrentUser']);
            Route::get('/current/language/{language}', [ProgramController::class, 'indexOfCurrentUserOfLanguage']);
            //Route::get('/{user}', [ProgramController::class, 'indexForUser']);
        });

        Route::prefix('/{program}')->group(function () {
            Route::get('/', [ProgramController::class, 'show']);
            Route::put('/', [ProgramController::class, 'update']);
            Route::delete('/', [ProgramController::class, 'destroy']);
            Route::get('/compile', [ProgramController::class, 'compile']);
            //Route::get('/download/sender', 'ProgramController@downloadCodeSender');
        });
    });
});

Route::middleware('throttle:60,1')->group(function () {
    Route::prefix('/languages')->group(function () {
        Route::get('/', [ProgrammingLanguageController::class, 'index']);
        Route::get('/{language}/functions', [ProgrammingLanguageController::class, 'functions']);
    });
});