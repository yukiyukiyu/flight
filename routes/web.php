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

Route::view('/', 'index');

Route::view('/register', 'auth.register');
Route::post('/register', 'AuthController@register');

Route::view('/login', 'auth.login');
Route::post('/login', 'AuthController@login');

Route::get('/logout', 'AuthController@logout');

Route::view('/admin', 'admin.index')->middleware('admin');

Route::get('/admin/airports', 'AdminController@airportsPage')->middleware('admin');
Route::post('/admin/airport/{id}/update', 'AdminController@airportUpdate')->middleware('admin');
Route::get('/admin/airport/{id}', 'AdminController@airportPage')->middleware('admin');
Route::post('/admin/airport/add', 'AdminController@airportAdd')->middleware('admin');

Route::get('/admin/flights', 'AdminController@flightsPage')->middleware('admin');
Route::post('/admin/flight/{id}/update', 'AdminController@flightUpdate')->middleware('admin');
Route::get('/admin/flight/{id}', 'AdminController@flightPage')->middleware('admin');
Route::post('/admin/flight/add', 'AdminController@flightAdd')->middleware('admin');

Route::get('/admin/users', 'AdminController@usersPage')->middleware('admin');
Route::post('/admin/user/{id}/update', 'AdminController@userUpdate')->middleware('admin');
Route::get('/admin/user/{id}', 'AdminController@userPage')->middleware('admin');
Route::post('/admin/user/add', 'AdminController@userAdd')->middleware('admin');

Route::view('/flight', 'flight.index');
Route::get('/flight/result', 'FlightController@result');

Route::get('/personal', 'UserController@personalPage');
Route::post('/personal/update', 'UserController@personalUpdate');
