<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['prefix' => 'v1'], function() {
    Route::group([
        'middleware' => 'api',
        'prefix' => 'auth'
    ], function ($router) {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
    });

    Route::group(['middleware' => 'jwt.auth'], function (){
        Route::post('/news', [NewsController::class, 'createNews']);
        Route::put('/news/{id}', [NewsController::class, 'updateNews']);
        Route::delete('/news/{id}', [NewsController::class, 'deleteNews']);
    });
    Route::get('/news', [NewsController::class, 'getAllNews']);
    Route::get('/news/{id}', [NewsController::class, 'getNewsById']);
    Route::post('/register', [RegisterController::class, 'register']);
});

