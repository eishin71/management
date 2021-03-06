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

Route::get('reservation/create', 'ReservationController@add');
Route::post('reservation/create', 'ReservationController@create');
Route::get('reservation/confirm', 'ReservationController@add');
Route::post('reservation/confirm', 'ReservationController@confirm');
Route::post('reservation/receptionist', 'ReservationController@receptionist');


Route::group(['prefix' => 'admin','middleware' => ['auth', 'can:admin']], function () {
    Route::get('start/', 'Admin\StartController@index');

    Route::get('reservation', 'Admin\ReservationController@index');
    Route::get('reservation/edit', 'Admin\ReservationController@edit');
    Route::post('reservation/edit', 'Admin\ReservationController@update');
    Route::get('reservation/delete', 'Admin\ReservationController@delete');
    Route::get('reservation/schedule', 'Admin\ReservationController@schedule');
    Route::get('reservation/{id}', 'Admin\ReservationController@show');
    Route::post('reservation/{id}/update_status', 'Admin\ReservationController@update_status');
    Route::post('reservation/{id}/remove', 'Admin\ReservationController@remove');

    Route::get('course/create', 'Admin\CourseController@add');
    Route::post('course/create', 'Admin\CourseController@create');
    Route::get('course', 'Admin\CourseController@index');
    Route::get('course/{id}', 'Admin\CourseController@show');
    Route::post('course/{id}/hidden', 'Admin\CourseController@hidden');
    Route::post('course/{id}/return', 'Admin\CourseController@return');

    Route::get('client/create', 'Admin\ClientController@add');
    Route::post('client/create', 'Admin\ClientController@create');
    Route::get('client/', 'Admin\ClientController@index');
    Route::get('client/{id}/edit', 'Admin\ClientController@edit');
    Route::get('client/{id}/details', 'Admin\ClientController@details');
    Route::post('client/{id}/update', 'Admin\ClientController@update');
    Route::get('client/{id}', 'Admin\ClientController@show');
    Route::post('client/{id}/remove', 'Admin\ClientController@remove');


    Route::get('question/create', 'Admin\QuestionController@add');
    Route::post('question/create', 'Admin\QuestionController@create');
    Route::get('question/', 'Admin\QuestionController@index');
    Route::get('question/{id}', 'Admin\QuestionController@show');
    Route::post('question/{id}/hidden', 'Admin\QuestionController@hidden');
    Route::post('question/{id}/return', 'Admin\QuestionController@return');

    Route::get('medicalhistory/{id}/create', 'Admin\MedicalHistoryController@add');
    Route::post('medicalhistory/create', 'Admin\MedicalHistoryController@create');
    Route::get('medicalhistory/{id}', 'Admin\MedicalHistoryController@index');
    Route::get('medicalhistory/{client_id}/{answer_date}', 'Admin\MedicalHistoryController@show');
    Route::get('medicalhistory/{client_id}/{answer_date}/edit', 'Admin\MedicalHistoryController@edit');
    Route::post('medicalhistory/{client_id}/{answer_date}/update', 'Admin\MedicalHistoryController@update');
    Route::post('medicalhistory/{client_id}/{answer_date}/remove', 'Admin\MedicalHistoryController@remove');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
