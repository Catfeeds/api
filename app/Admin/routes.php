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
});
