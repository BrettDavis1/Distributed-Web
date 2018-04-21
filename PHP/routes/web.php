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

Route::get('/', 'SessionsController@index');
Route::get('/login', 'SessionsController@index');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

Route::get('/register', 'RegisterController@index');
Route::post('/register', 'RegisterController@store');

Route::get('/home', 'HomeController@index');

Route::get('/movies', 'MoviesController@index');
Route::get('/movies/{movie}', 'MoviesController@description');

Route::get('/cart', 'HomeController@index');

Route::get('/home', 'HomeController@index');
