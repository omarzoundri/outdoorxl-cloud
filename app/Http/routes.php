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

Route::get('/', 'Auth\AuthController@getLogin');
Route::post('/', 'Auth\AuthController@postLogin');
Route::get('nieuws', 'HomeController@dashboard' );
Route::post('nieuws-toevoegen', ['middleware' => 'admin', 'uses' => 'HomeController@postAddNieuws']);
Route::get('nieuws-toevoegen', ['middleware' => 'admin', 'uses' => 'HomeController@getAddNieuws']);
// Route::get('nieuws/{id}/editnieuws', ['middleware' => 'admin', 'uses' => 'HomeController@getEditNieuws']);
// Route::post('nieuws/{id}/editnieuws',['middleware' => 'admin', 'uses' => 'HomeController@postEditNieuws']);
Route::get('nieuws/{id}', 'HomeController@getNieuws'); //Gets the specific news id
Route::get('nieuws/{id}/edit', ['middleware' => 'admin', 'uses' => 'HomeController@getEditNieuws']);
Route::post('nieuws/{id}/edit', ['middleware' => 'admin', 'uses' => 'HomeController@postEditNieuws']);
Route::get('nieuws/{id}/delete', ['middleware' => 'admin', 'uses' => 'HomeController@getDeleteNieuws']);
Route::post('nieuws/{id}/delete', ['middleware' => 'admin', 'uses' => 'HomeController@postDeleteNieuws']);

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

Route::get('medewerkers-inplannen', ['middleware' => 'admin', 'uses' => 'HomeController@getScheduleEmployee']);
Route::post('medewerkers-inplannen', ['middleware' => 'admin', 'uses' => 'HomeController@postScheduleEmployee']);

Route::get('planning-wijzigen', ['middleware' => 'admin', 'uses' => 'HomeController@getEditSchedule']);
Route::post('planning-wijzigen', ['middleware' => 'admin', 'uses' => 'HomeController@postEditSchedule']);

Route::get('beschikbaarheid', ['middleware' => 'admin', 'uses' => 'HomeController@getAvailability']);
Route::post('beschikbaarheid', ['middleware' => 'admin', 'uses' => 'HomeController@postAvailability']);

Route::get('planning', 'EventController@calendar');
Route::get('test', 'TestController@test');




Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
