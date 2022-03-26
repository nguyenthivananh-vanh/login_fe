<?php

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

Route::get('home', function () {
    return view('Account.list');
});
Route::get('login', 'App\Http\Controllers\LoginController@login');
Route::post('loginApi', 'App\Http\Controllers\LoginController@loginApi')->name('loginApi');
Route::get('list', 'App\Http\Controllers\AccountController@index');