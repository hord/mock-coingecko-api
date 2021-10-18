<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

# Coingecko
Route::group(['prefix' => 'api/v3/coins'], function ($router) {
    Route::get('/list', [\App\Http\Controllers\TokenController::class, 'list']);
    Route::get('/{coin_id}', [\App\Http\Controllers\TokenController::class, 'info']);
});
