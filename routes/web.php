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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// --------------------player controller----------------------
Route::resource('players','PlayerController');
Route::get('/players/{playerId}/injured', 'PlayerController@injuredCreate');
Route::post('/players/{playerId}/injured', 'PlayerController@injuredStore');
Route::get('/players/{playerId}/recovered', 'PlayerController@recoveryUpdate');

// ------------------------Tournament controller------------------
Route::resource('tournaments', 'TournamentController');

// ----------------------------match controller-----------------------
Route::get('/tournaments/{tournamentId}/matches/create', 'MatchController@create');
Route::post('/tournaments/{tournamentId}/matches', 'MatchController@store');
Route::get('/tournaments/{tournamentId}/matches/{matchId}', 'MatchController@show');
//matchStats create
Route::get('/tournaments/{tournamentId}/matches/{matchId}/matchStats/create', 'MatchController@createMatchStats'); 
//matchStats post
Route::post('/tournaments/{tournamentId}/matches/{matchId}/matchStats', 'MatchController@storeMatchStats'); 
//playerStats post
Route::post('/tournaments/{tournamentId}/matches/{matchId}/squads/{squadId}/playerStats/{playerId}', 'MatchController@storePlayerStats'); 
//match Calendar
Route::get('/match_schedual', 'MatchController@calendar');
// ----------------------------Squad Controller----------------------------
Route::get('/squads', 'SquadController@index');
Route::get('/squad/create', 'SquadController@create');
Route::get('/ajax-match/{tournamentId}', 'SquadController@matchView');
Route::post('/squads', 'SquadController@store');

// --------------------------jquery Squad test------------------------------
Route::get('test_squad', 'SquadController@test');