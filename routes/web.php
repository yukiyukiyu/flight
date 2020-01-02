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

Route::group(['middleware' => ['all']], function () {
    Route::get('/', 'ContentController@index');

    Route::view('/flight', 'flight.index');
    Route::get('/flight/result', 'FlightController@result');

    Route::get('/announcement/{id}', 'AnnouncementController@announcement');

    Route::group(['middleware' => ['notLogin']], function () {
        Route::view('/register', 'auth.register');
        Route::post('/register', 'AuthController@register');

        Route::view('/login', 'auth.login');
        Route::post('/login', 'AuthController@login');
    });

    Route::group(['middleware' => ['login']], function () {
        Route::get('/logout', 'AuthController@logout');
        
        Route::group(['middleware' => ['admin']], function () {
            Route::get('/admin', 'AdminController@announcementsPage');

            Route::get('/admin/airports', 'AdminController@airportsPage');
            Route::post('/admin/airport/{id}/update', 'AdminController@airportUpdate');
            Route::get('/admin/airport/{id}', 'AdminController@airportPage');
            Route::redirect('/admin/airport/add', '/admin/airport/0/update');

            Route::get('/admin/flights', 'AdminController@flightsPage');
            Route::post('/admin/flight/{id}/update', 'AdminController@flightUpdate');
            Route::get('/admin/flight/{id}', 'AdminController@flightPage');
            Route::redirect('/admin/flight/add', '/admin/flight/0/update');

            Route::get('/admin/users', 'AdminController@usersPage');
            Route::post('/admin/user/{id}/update', 'AdminController@userUpdate');
            Route::get('/admin/user/{id}', 'AdminController@userPage');
            Route::redirect('/admin/user/add', '/admin/user/0/update');
            
            Route::post('/admin/announcement/{id}/update', 'AdminController@announcementUpdate');
            Route::get('/admin/announcement/{id}', 'AdminController@announcementPage');
            Route::redirect('/admin/announcement/add', '/admin/announcement/0/update');
        });

        Route::group(['middleware' => ['passenger']], function () {
            Route::get('/flight/{id}/buy', 'FlightController@buyPage');
            Route::post('/flight/{id}/buy', 'FlightController@buy');

            Route::get('/personal', 'UserController@personalPage');
            Route::get('/personal/orders', 'UserController@ordersPage');
            Route::post('/personal/update', 'UserController@personalUpdate');

            Route::get('/order/{id}/change', 'OrderController@changePage');
            Route::post('/order/{id}/change', 'OrderController@change');
            Route::get('/order/{id}/refund', 'OrderController@refundPage');
            Route::post('/order/{id}/refund', 'OrderController@refund');
        });
    });
    
    Route::get('/flight/{id}', 'FlightController@detail');
});
