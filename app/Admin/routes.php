<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->get('/aia', 'AiaController@index');
    $router->get('/aia/index', 'AiaindexController@index');
    $router->get('mg/index', 'MgController@index');
    $router->get('mg/statistic', 'MglogController@index');
    $router->resource('/hx1','Hx1Controller');
    $router->resource('/hx2', 'Hx2Controller');
    $router->resource('/zyhx/topic', 'TopicController');
    $router->resource('zyhx/comment', 'CommentController');
    $router->resource('friso/location', 'FrisolocController');
    $router->resource('friso/log', 'FrisologController');
    $router->resource('tmall/car/user', 'Tmall\CarUserController', [
        'except' => ['create', 'store']
    ]);
    $router->resource('tmall/car/time', 'Tmall\TimeController', [
        'except' => ['create', 'edit']
    ]);
    $router->resource('tmall/car/game', 'Tmall\GameController');

    //复旦大学EMBA同学会后台
    $router->resource('fudan/big', 'Fudan\BigController')->except('destroy');
    $router->resource('fudan/small', 'Fudan\SmallController');
    $router->resource('fudan/log', 'Fudan\LogController');
});
