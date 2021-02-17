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

Route::get('/', 'App\Http\Controllers\HomeController@home');


Route::get('/about', function(){
    return view('about');
});

Route::get('/service', 'App\Http\Controllers\ServiceController@index');
Route::post('/service', 'App\Http\Controllers\ServiceController@store');

Route::get('/customer', 'App\Http\Controllers\CustomerController@index');
Route::get('/customer/create', 'App\Http\Controllers\CustomerController@create');
Route::get('/customer/{customer}', 'App\Http\Controllers\CustomerController@show');
Route::get('/customer/{customer}/edit', 'App\Http\Controllers\CustomerController@edit');
Route::patch('/customer/{customer}', 'App\Http\Controllers\CustomerController@update');
Route::post('/customer', 'App\Http\Controllers\CustomerController@store');