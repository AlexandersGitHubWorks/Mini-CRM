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

Auth::routes(['register' => false]);

Route::group(['middleware' => ['web', 'auth']], function() {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/companies', 'CompanyController@index');
    Route::get('/create/company', 'CompanyController@create');
    Route::post('/create/company', 'CompanyController@store');
    Route::get('/edit/company/{id}', 'CompanyController@edit');
    Route::post('/edit/company/{id}', 'CompanyController@update');
    Route::delete('/delete/company/{id}', 'CompanyController@destroy');

    Route::get('/employees', 'EmployeeController@index');
    Route::get('/create/employee', 'EmployeeController@create');
    Route::post('/create/employee', 'EmployeeController@store');
    Route::get('/edit/employee/{id}', 'EmployeeController@edit');
    Route::post('/edit/employee/{id}', 'EmployeeController@update');
    Route::delete('/delete/employee/{id}', 'EmployeeController@destroy');
});