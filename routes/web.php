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

	Route::post('/movies/{movie}/', 'ReviewsController@add');
});

Route::group(['middleware' => ['admin']], function()
{
	Route::get('/admin', 'UsersController@index');
	Route::post('/admin', 'MoviesController@add');
	Route::delete('/admin/{movie}', 'MoviesController@remove');
	//return view('admin.index');
});
