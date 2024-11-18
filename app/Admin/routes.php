<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {
    $router->get('/', 'LiveRoomController@index')->name('home');
    $router->resource('live-room','LiveRoomController');
    $router->resource('ban-user','BanUserController');
    $router->resource('match','MatchController');
});
