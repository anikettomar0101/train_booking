<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', '\App\Http\Controllers\BookingController@home')->name('home');
Route::get('/create-booking', '\App\Http\Controllers\BookingController@createBooking')->name('create-booking');
Route::post('/create-booking', '\App\Http\Controllers\BookingController@createBooking')->name('create-booking');
Route::get('/all-bookings', '\App\Http\Controllers\BookingController@showBookings')->name('all-bookings');


