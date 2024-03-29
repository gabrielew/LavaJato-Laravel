<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('usercad', 'UserCadController');
Route::resource('automovelcad', 'AutomovelCadController')->middleware('auth');
Route::resource('clientcad', 'ClientCadController')->middleware('auth');
Route::resource('servicescad', 'ServiceCadController')->middleware('auth');
Route::resource('washescad', 'WashCadController')->middleware('auth');
Route::get('listservice/{id}', 'ListServiceController@index');
