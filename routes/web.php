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

Route::group(['middleware' => ['web']], function() 
{
	Auth::routes();

	Route::get('/', 'HomeController@index');
	Route::get('/movies', 'MoviesController@index');
	Route::get('/movies/{movie}', 'MoviesController@show');
	Route::post('/movies/{movie}', 'ReviewsController@add');
});

Route::group(['middleware' => ['user']], function()
{
	Route::get('/profile', 'UsersController@user');
	Route::get('/profile/{review}/edit', 'ReviewsController@edit');
	Route::patch('/profile/{review}', 'ReviewsController@patch');
	Route::delete('/profile/{review}', 'ReviewsController@remove');
});

Route::group(['middleware' => ['admin']], function()
{
	Route::get('/admin', 'UsersController@index');
	Route::post('/admin', 'MoviesController@add');
	Route::delete('/admin/{movie}', 'MoviesController@remove');
	Route::patch('/admin/{user}/disable/', 'UsersController@disable');
	Route::patch('/admin/{user}/enable/', 'UsersController@enable');
	Route::get('/admin/hidden/', 'UsersController@hiddenUsers');
});