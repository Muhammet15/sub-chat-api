<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::namespace('App\Http\Controllers\Web')->group(function () {
    Route::get('/', 'AuthController@showLoginForm')->name('admin.login.form');
    Route::post('/', 'AuthController@showLoginFormPost')->name('admin.login');
});


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

});
