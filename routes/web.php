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

use App\User; 

// --Homepage of the Website
Route::get('/', 'PagesController@index');

//AUTHENTIFICATION
Auth::routes();

//CRUD USERS
Route::resource('users', 'UsersController');

//CRUD EVENTS
Route::resource('events', 'EventsController');

//ATTENDANCE
Route::get('attendance', 'AttendanceController@index');



Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

