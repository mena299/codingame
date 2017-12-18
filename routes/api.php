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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'easy'], function () {
    Route::get('temperatures', 'TemperatureController@gettemperature');
    Route::get('horse', 'HorseController@horseRacing');
    Route::get('defibrillators', 'DefibrillatorsController@getLocation');
});


