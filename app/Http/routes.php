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
Route::post('/', 'Auth\AuthController@postLogin');
Route::get('/home', 'HomeController@dashboard' );
Route::get('add',['middleware' => 'admin', 'uses' => 'HomeController@add']);
Route::post('add',['middleware' => 'admin', 'uses' => 'HomeController@AddEmployee']);
Route::get('employees', ['middleware' => 'admin', 'uses' => 'HomeController@employees']);
Route::get('employees/{id}/edit', ['middleware' => 'admin', 'uses' => 'HomeController@employee']);
Route::post('employees/{id}/edit',['middleware' => 'admin', 'uses' => 'HomeController@EditEmployee']);
Route::get('addafdeling', 'HomeController@AddAfdeling');




Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
