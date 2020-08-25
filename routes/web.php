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
    Route::get('resevation/create', 'Admin\ResevationController@add');
    Route::post('resevation/create', 'Admin\ResevationController@create');
    Route::get('resevation', 'Admin\ResevationController@index');
    Route::get('resevation/edit', 'Admin\ResevationController@edit');
    Route::post('resevation/edit', 'Admin\ResevationController@update');
    Route::get('resevation/delete', 'Admin\ResevationController@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ResevationController@index');
