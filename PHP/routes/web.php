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

Route::get('/login', 'SessionsController@index');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

Route::get('/register', 'RegisterController@index');
Route::post('/register', 'RegisterController@store');

Route::get('/home', 'HomeController@index');

Route::get('/movies', 'MoviesController@index');
Route::get('/movies/{movie}', 'MoviesController@description');
Route::get('/movies/{movie}/add', 'MoviesController@add');

Route::get('/cart', 'ShopController@getCart');
Route::post('/cart', 'ShopController@store');
Route::get('/checkout', 'ShopController@getCheckout');
Route::post('/checkout', 'ShopController@buy');
Route::get('/reduce/{id}', 'ShopController@getReduceByOne');
Route::get('/remove/{id}', 'ShopController@getRemoveItem');

Route::get('/history', 'ShopController@history');
Route::get('history/{transaction}', 'ShopController@transaction');

Route::get('/', 'SessionsController@index');
