<?php

use Illuminate\Http\Request;

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

Route::get('/conversions', 'ConversionsController@index')->name('conversions.index');

Route::get('/conversions/popular', 'ConversionsController@popular')->name('conversions.popular');

Route::post('/conversions', 'ConversionsController@store')->name('conversions.store');

