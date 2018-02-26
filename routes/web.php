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


// --Homepage of the Website
Route::get('/', 'PagesController@index');

//AUTHENTIFICATION
Auth::routes();

//CRUD USERS
Route::get('/users', 'UsersController@index');
Route::get('/users/{user}', 'UsersController@show');
Route::get('/users/create', 'UsersController@create');

//CRUD EVENTS
Route::get('/events', 'EventsController@index');
Route::get('/events/{event}', 'EventsController@show');
Route::get('/events/create', 'EventsController@create');




Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

