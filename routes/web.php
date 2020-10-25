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

  Route::get('reservation/create', 'Admin\ReservationController@add');
  Route::post('reservation/create', 'Admin\ReservationController@create');
  Route::post('reservation/confirm', 'Admin\ReservationController@confirm');

Route::group(['prefix' => 'admin','middleware' => 'auth'],function () {
    Route::post('reservation/receptionist','Admin\ReservationController@receptionist');
    Route::get('reservation', 'Admin\ReservationController@index');
    Route::get('reservation/edit', 'Admin\ReservationController@edit');
    Route::post('reservation/edit', 'Admin\ReservationController@update');
    Route::get('reservation/delete', 'Admin\ReservationController@delete');
    Route::get('reservation/schedule','Admin\ReservationController@schedule');
    Route::get('reservation/{id}', 'Admin\ReservationController@show');
    Route::post('reservation/{id}/update_status','Admin\ReservationController@update_status');
    Route::post('reservation/{id}/remove','Admin\ReservationController@remove');

    Route::get('course/create','Admin\CourseController@add');
    Route::post('course/create','Admin\CourseController@create');
    Route::get('course','Admin\CourseController@index');
    Route::get('course/{id}','Admin\CourseController@show');
    Route::post('course/{id}/hidden','Admin\CourseController@hidden');
    Route::post('course/{id}/return','Admin\CourseController@return');

    Route::get('client/create','Admin\ClientController@add');
    Route::post('client/create','Admin\ClientController@create');
    Route::post('client/create2','Admin\ClientController@create2');
    Route::get('client/','Admin\ClientController@index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
