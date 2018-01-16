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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/', 'AppointmentController@index');
//Route::get('/reservations/create', 'AppointmentController@create');
//Route::get('/reservations/{reservations}', 'AppointmentController@show');

Route::get('/', 'Auth\LoginController@showLoginForm');
//Admin routes
Route::middleware(['auth:api'])->prefix('admin')->group(function () {

    Route::resource('/appointment', 'AppointmentController');

    Route::resource('/users', 'UserController');
    });

//user routes
Route::middleware(['auth:api'])->prefix('user')->group(function () {

    Route::resource('appointments', 'ReservationController', ['except' =>[
        'create', 'destroy', 'store'
    ]]);

    Route::resource('/reservations', 'ReservedappointmentsController', ['except' =>[
        'create', 'destroy', 'store', 'edit', 'update' , 'show'
    ]]);

    });
