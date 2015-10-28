<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Auth\AuthController@getLogin');
Route::get('add', 'HomeController@add');
Route::post('add', 'HomeController@AddEmployee');
Route::get('employees', 'HomeController@employees');
Route::get('employees/{id}/edit', 'HomeController@employee');
Route::post('employees/{id}/edit', 'HomeController@EditEmployee');




Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);