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

Route::get('/{area}','\App\Http\Controllers\Home\HomeController@index');
Route::get('/{area}/live','\App\Http\Controllers\Home\HomeController@live');
Route::get('/{area}/contest','\App\Http\Controllers\Home\HomeController@contest');
Route::get('/{area}/room/xiaomi','\App\Http\Controllers\Home\HomeController@room');
