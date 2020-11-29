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

    Route::get('start/','Admin\StartController@index');

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
    Route::get('client/','Admin\ClientController@index');
    Route::get('client/{id}/edit','Admin\ClientController@edit');
    Route::get('client/{id}/details','Admin\ClientController@details');
    Route::post('client/{id}/update','Admin\ClientController@update');
    Route::get('client/{id}','Admin\ClientController@show');

    Route::get('question/create','Admin\QuestionController@add');
    Route::post('question/create','Admin\QuestionController@create');
    Route::get('question/','Admin\QuestionController@index');
    Route::get('question/{id}','Admin\QuestionController@show');
    Route::post('question/{id}/hidden','Admin\QuestionController@hidden');
    Route::post('question/{id}/return','Admin\QuestionController@return');

    Route::get('medical_history/{id}/create','Admin\Medical_historyController@add');
    Route::post('medical_history/create','Admin\Medical_historyController@create');
    Route::get('medical_history/{id}','Admin\Medical_historyController@index');
    Route::get('medical_history/{client_id}/{answer_date}', 'Admin\Medical_historyController@show');
    Route::get('medical_history/{id}/edit','Admin\Medical_historyController@edit');
    Route::get('medical_history/{id}/details','Admin\Medical_historyController@details');
    Route::get('medical_history/{id}/update','Admin\Medical_historyController@update');


});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
