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

Route::group(['prefix' => '/account'], function () {
    Route::get('/add', 'App\Http\Controllers\AccountController@create')->name('account-add');
    Route::post('/add', 'App\Http\Controllers\AccountController@postAccount')->name('post-account');
    Route::get('update/{id}', 'App\Http\Controllers\AccountController@create')->name('account-update');
});

Route::group(['prefix' => '/location'], function () {
    Route::get('city', 'App\Http\Controllers\LocationController@index');
    Route::get('/district', 'App\Http\Controllers\LocationController@getListDistrict');
    Route::get('update/{id}', 'App\Http\Controllers\AccountController@create')->name('account-update');
});


