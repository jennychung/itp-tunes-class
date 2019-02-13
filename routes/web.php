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



Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

Route::middleware(['authenticated'])->group(function() {
  Route::get('/profile', 'AdminController@index');
  Route::get('/settings', 'ConfigurationsController@index');
  Route::get('/settings', 'ConfigurationsController@configure');
  Route::post('/settings', 'ConfigurationsController@settings');
}); //doesn't correspond to class name but maps and runs handle function before route of profile

  Route::get('/maintenance', 'MaintenanceController@index');

Route::middleware(['maintenanceMode'])->group(function() {
  // Route::get('/maintenance', 'MaintenanceController@index');


  Route::get('/invoices', 'InvoicesController@index');

  //WEEK3 HOMEWORK
  Route::get('/genres', 'GenresController@index');
  Route::get('/genres/edit', 'GenresController@create');
  // Route::get('/genres/{id}/edit', 'GenresController@show');
  Route::get('/genres/{id}/edit', ['as'=>'genres', 'uses'=>'GenresController@show']);
  // Route::get('/genres/{id}/edit', 'GenresController@index');
  Route::post('/genres', 'GenresController@store');

  Route::get('/tracks', 'TracksController@index');

  //WEEK 4 IN CLASS
  Route::get('/', 'PlaylistController@index');
  Route::get('/playlists/new', 'PlaylistController@create');
  Route::get('/playlists/{id}', 'PlaylistController@index');
  Route::post('/playlists', 'PlaylistController@store'); //post route. "store"
  // Route::get('/playlists/{id}', 'PlaylistController@show');
  //will display form to create a new playlist. create is a action/method

  //the @ is arbitrary.

  Route::get('/tracks', 'TracksController@index');
  Route::get('/tracks/new', 'TracksController@create');
  Route::post('/tracks', 'TracksController@store');

  Route::get('/signup', 'SignUpController@index');
  Route::post('/signup', 'SignUpController@signup');



});
