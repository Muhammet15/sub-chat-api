<?php

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


Route::namespace('App\Http\Controllers\Api')->group(function () {
    Route::post('/auth', 'AuthController@authControl')->name('api.auth');
});

Route::middleware(['rate.limit', 'auth:sanctum'])->namespace('App\Http\Controllers\Api')->group(function () {

    Route::prefix('subscription')->group(function () {
        Route::post('/', 'SubscriptionController@purchase')->name('api.subscription.purchase');
        Route::get('/info', 'SubscriptionController@info')->name('api.subscription.info');
    });

    Route::prefix('chat')->group(function () {
        Route::post('/', 'ChatController@chat')->name('api.chat.send');
        Route::get('/list', 'ChatController@chatList')->name('api.chat.list');
    });
});


