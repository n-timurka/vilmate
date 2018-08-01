<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/listings', 'ListingController@index');
Route::get('/listings/{listing}', 'ListingController@show')->name('show_listing');
Route::post('/listings', 'ListingController@store');
Route::post('/listings/{listing}', 'ListingController@update');
Route::delete('/listings/{listing}', 'ListingController@destroy');
