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
//Route::get('live-room/{area}', '\App\Http\Controllers\Api\LiveController@liveRoom');
Route::post('live-room/{area}', '\App\Http\Controllers\Api\LiveController@liveRoom');


