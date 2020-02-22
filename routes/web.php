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

// ----------------------------Squad Controller----------------------------
Route::get('/squad/create', 'SquadController@create');
Route::get('/ajax-match/{tournamentId}', 'SquadController@matchView');
// ================temporary==================
Route::get('/squad', 'PlayerController@squad');
