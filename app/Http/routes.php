<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| and give it the controller to call when that URI is requested.
|
*/

//login
Route::get('/', 'Auth\AuthController@getLogin');
Route::post('/', 'Auth\AuthController@postLogin');

//edit profile
Route::get('editprofile', 'HomeController@getEditProfile');
Route::post('editprofile', 'HomeController@postEditProfile');

//dashboard
Route::get('nieuws', 'HomeController@dashboard' );
Route::post('nieuws-toevoegen', ['middleware' => 'admin', 'uses' => 'HomeController@postAddNews']);
Route::get('nieuws-toevoegen', ['middleware' => 'admin', 'uses' => 'HomeController@getAddNews']);
Route::get('nieuws/{id}', 'HomeController@getNieuws');
Route::get('nieuws/{id}/edit', ['middleware' => 'admin', 'uses' => 'HomeController@getEditNews']);
Route::post('nieuws/{id}/edit', ['middleware' => 'admin', 'uses' => 'HomeController@postEditNews']);
Route::get('nieuws/{id}/delete', ['middleware' => 'admin', 'uses' => 'HomeController@getDeleteNews']);
Route::post('nieuws/{id}/delete', ['middleware' => 'admin', 'uses' => 'HomeController@postDeleteNews']);
Route::get('myschedule', 'HomeController@viewRoster' );

//employee
Route::get('medewerker-toevoegen',['middleware' => 'admin', 'uses' => 'HomeController@getAddEmployee']);
Route::post('medewerker-toevoegen',['middleware' => 'admin', 'uses' => 'HomeController@postAddEmployee']);
Route::get('medewerkers', ['middleware' => 'admin', 'uses' => 'HomeController@employees']);
Route::get('medewerker/{id}/edit', ['middleware' => 'admin', 'uses' => 'HomeController@getEditEmployee']);
Route::post('medewerker/{id}/edit',['middleware' => 'admin', 'uses' => 'HomeController@postEditEmployee']);
Route::get('medewerker/{id}/delete', ['middleware' => 'admin', 'uses' => 'HomeController@getDeleteEmployee']);
Route::post('medewerker/{id}/delete', ['middleware' => 'admin', 'uses' => 'HomeController@postDeleteEmployee']);

//divisions
Route::get('afdelingen', ['middleware' => 'admin', 'uses' => 'HomeController@divisions']);
Route::get('afdeling-toevoegen', ['middleware' => 'admin', 'uses' => 'HomeController@getAddDivision']);
Route::post('afdeling-toevoegen', ['middleware' => 'admin', 'uses' => 'HomeController@postAddDivision']);
Route::get('afdeling/{id}/edit', ['middleware' => 'admin', 'uses' => 'HomeController@getEditDivision']);
Route::post('afdeling/{id}/edit',['middleware' => 'admin', 'uses' => 'HomeController@postEditDivision']);
Route::get('afdeling/{id}/delete', ['middleware' => 'admin', 'uses' => 'HomeController@getDeleteDivision']);
Route::post('afdeling/{id}/delete', ['middleware' => 'admin', 'uses' => 'HomeController@postDeleteDivision']);

//scheduling for employers
Route::get('medewerkers-inplannen', ['middleware' => 'admin', 'uses' => 'HomeController@getScheduleEmployee']);
Route::post('medewerkers-inplannen', ['middleware' => 'admin', 'uses' => 'HomeController@postScheduleEmployee']);

//daily roster for admin
Route::get('dagelijkse-rooster', 'HomeController@getDailyRoster');

//availability
Route::get('beschikbaarheid', 'HomeController@getAvailability');
Route::post('beschikbaarheid', 'HomeController@postAvailability');

//daily hours
Route::get('dagelijkseuren', 'HomeController@getAddHoursEmployee');
Route::post('dagelijkseuren', 'HomeController@postAddHoursEmployee');

//test environment
Route::get('planning', 'EventController@calendar');
Route::get('test', 'TestController@test');
Route::get('charts', 'TestController@charts');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
