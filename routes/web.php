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

Route::group(['prefix' => 'admin','middleware' => 'auth'],function () {
    Route::get('resavation/create', 'Admin\ResavationController@add');
    Route::post('resavation/create', 'Admin\ResavationController@create');
    Route::get('resavation', 'Admin\ResavationController@index');
    Route::get('resavation/edit', 'Admin\ResavationController@edit');
    Route::post('resavation/edit', 'Admin\ResavationController@update');
    Route::get('resavation/delete', 'Admin\ResavationController@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ResavationController@index');
