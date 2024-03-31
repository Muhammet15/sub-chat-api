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
    Route::get('/', 'AuthController@loginForm')->name('admin.login.form');
    Route::post('/', 'AuthController@login')->name('admin.login');
});


Route::namespace('App\Http\Controllers\Web')->prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('panel','HomeController@index')->name('admin.index');
    Route::get('users','HomeController@userList')->name('users.list');
    Route::get('users/{detail}','HomeController@userDetail')->name('users.detail');
    Route::get('subscriptions','HomeController@subscriptions')->name('subscriptions.list');
    Route::get('logout',  'AuthController@logout')->name('admin.panel.logout');
});
