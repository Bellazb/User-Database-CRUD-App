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

Route::get('/bella', function() {
   return "Saya Bella";
});

Route::get('phones', 'PhoneController@index');
Route::get('phones/create', 'PhoneController@create');
Route::get('phones/{id}/edit', 'PhoneController@edit');
Route::get('phones/{id}', 'PhoneController@show');
Route::put('phones/{id}', 'PhoneController@update');
Route::post('phones', 'PhoneController@store');
Route::delete('phones/{id}', 'PhoneController@destroy');
