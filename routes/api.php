<?php

use App\Http\Controllers\Api\ProgramController;
use App\Http\Controllers\Api\ProgrammingLanguageController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

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

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! \Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return json_encode([
        'access_token' => $user->createToken($request->device_name)->plainTextToken
    ]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/languages')->middleware('throttle:60,1')->namespace('Api')->group(function () {
    Route::get('/', [ProgrammingLanguageController::class, 'index']);
    Route::get('/{language}/functions', [ProgrammingLanguageController::class, 'functions']);
//    Route::get('/{language}/download/sending', 'LanguageController@downloadSending');
});

Route::middleware('auth:sanctum')->prefix('/programs')->namespace('Api')->group(function () {
    Route::post('/', [ProgramController::class, 'store']);
    Route::get('/user/current', [ProgramController::class, 'indexOfCurrentUser']);
    Route::get('/user/current/language/{language}', [ProgramController::class, 'indexOfCurrentUserOfLanguage']);
    Route::get('/user/{user}', [ProgramController::class, 'indexForUser']);
    Route::get('/{program}', [ProgramController::class, 'show']);
    Route::put('/{program}', [ProgramController::class, 'update']);
    Route::delete('/{program}', [ProgramController::class, 'destroy']);
    Route::get('/{program}/compile', [ProgramController::class, 'compile']);
//    Route::get('/{program}/download/sender', 'ProgramController@downloadCodeSender');
});
