<?php

use App\Mail\WelcomeMail;
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

Route::get('/', 'App\Http\Controllers\HomeController@home');


Route::get('/about', function(){
    return view('about');
});


Route::get('/email', function(){
    return new WelcomeMail();
});


Route::get('/service', 'App\Http\Controllers\ServiceController@index');
Route::get('/service/create', 'App\Http\Controllers\ServiceController@create');
Route::get('/service/{service}', 'App\Http\Controllers\ServiceController@show');
Route::get('/service/{service}/edit', 'App\Http\Controllers\ServiceController@edit');
Route::patch('/service/{service}', 'App\Http\Controllers\ServiceController@update');
Route::post('/service', 'App\Http\Controllers\ServiceController@store');
Route::delete('/service/{service}', 'App\Http\Controllers\ServiceController@destroy');


Route::get('/customer', 'App\Http\Controllers\CustomerController@index');
Route::get('/customer/create', 'App\Http\Controllers\CustomerController@create');
Route::get('/customer/{customer}', 'App\Http\Controllers\CustomerController@show');
Route::get('/customer/{customer}/edit', 'App\Http\Controllers\CustomerController@edit');
Route::patch('/customer/{customer}', 'App\Http\Controllers\CustomerController@update');
Route::post('/customer', 'App\Http\Controllers\CustomerController@store');
Route::delete('/customer/{customer}', 'App\Http\Controllers\CustomerController@destroy');
