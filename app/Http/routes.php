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
Route::get('nieuws', 'HomeController@dashboard' );
Route::get('nieuws-toevoegen', ['middleware' => 'admin', 'uses' => 'HomeController@getAddNieuws']); // good kid m.A.A.d city
Route::get('medewerker-toevoegen',['middleware' => 'admin', 'uses' => 'HomeController@getAddEmployee']);
Route::post('medewerker-toevoegen',['middleware' => 'admin', 'uses' => 'HomeController@postAddEmployee']);
Route::get('medewerkers', ['middleware' => 'admin', 'uses' => 'HomeController@employees']);
Route::get('medewerker/{id}/edit', ['middleware' => 'admin', 'uses' => 'HomeController@getEditEmployee']);
Route::post('medewerker/{id}/edit',['middleware' => 'admin', 'uses' => 'HomeController@postEditEmployee']);
Route::get('medewerker/{id}/delete', ['middleware' => 'admin', 'uses' => 'HomeController@getDeleteEmployee']);
Route::post('medewerker/{id}/delete', ['middleware' => 'admin', 'uses' => 'HomeController@postDeleteEmployee']);
Route::get('afdelingen', ['middleware' => 'admin', 'uses' => 'HomeController@divisions']);
Route::get('afdeling-toevoegen', ['middleware' => 'admin', 'uses' => 'HomeController@getAddDivision']);
Route::post('afdeling-toevoegen', ['middleware' => 'admin', 'uses' => 'HomeController@postAddDivision']);
Route::get('afdeling/{id}/edit', ['middleware' => 'admin', 'uses' => 'HomeController@getEditDivision']);
Route::post('afdeling/{id}/edit',['middleware' => 'admin', 'uses' => 'HomeController@postEditDivision']);
Route::get('afdeling/{id}/delete', ['middleware' => 'admin', 'uses' => 'HomeController@getDeleteDivision']);
Route::post('afdeling/{id}/delete', ['middleware' => 'admin', 'uses' => 'HomeController@postDeleteDivision']);
Route::get('planning', 'EventController@calendar');
Route::get('test', 'TestController@test');




Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
