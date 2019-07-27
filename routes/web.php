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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/azcwr/guest/time-in', 'GuestTimeTrackingController@showTimeIn')->name('time-in');
Route::post('/azcwr/guest/time-in', 'GuestTimeTrackingController@timeIn');
Route::get('/azcwr/guest/time-out', 'GuestTimeTrackingController@showTimeOut')->name('time-out');
Route::post('/azcwr/guest/time-out/{id}', 'GuestTimeTrackingController@timeOut');

//Auth::routes();

Route::get('/azcwr/admin', 'HomeController@index')->name('home');
Route::get('/azcwr/admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/azcwr/admin/login', 'Auth\LoginController@login');
Route::post('/azcwr/admin/logout', 'Auth\LoginController@logout')->name('logout');
