<?php

use Illuminate\Support\Facades\Route;

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
Route::prefix('events')->group(function () {
    Route::get('', 'EventController@index')->name('event.index');
    Route::get('month', 'EventController@indexMonth')->name('event.month');
    Route::get('{event}', 'EventController@show')->name('event.show');
    Route::put('{event}', 'EventController@update')->name('event.update');
});
