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
    Route::get('reservation/create', 'Admin\ReservationController@add');
    Route::post('reservation/create', 'Admin\ReservationController@create');
    Route::get('reservation', 'Admin\ReservationController@index');
    Route::get('reservation/edit', 'Admin\ReservationController@edit');
    Route::post('reservation/edit', 'Admin\ReservationController@update');
    Route::get('reservation/delete', 'Admin\ReservationController@delete');
    Route::get('reservation/{id}', 'Admin\ReservationController@show');
    Route::post('reservation/{id}/update_status','Admin\ReservationController@update_status');
    Route::post('reservation/{id}/remove','Admin\ReservationController@remove');
    Route::get('course/create','Admin\CourseController@add');
    Route::post('course/create','Admin\CourseController@create');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
