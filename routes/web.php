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
Route::get('/test', function () {
    return view('test');
});

/*
 * 科思创项目
 */

Route::get('/audios/{audio}', 'Ksc\\AudioController@index');

/**
 * 中控系统
 */
Route::get('/touch', function () {
    return view('touch');
});

/**
 *启赋有机
 */

Route::group(['prefix' => 'qf', 'middleware' => ['web', 'wechat.oauth:snsapi_userinfo']], function () {
    Route::get('/sign', 'Qf\QfController@sign');
    Route::get('/pasture', 'Qf\QfController@pasture');
    Route::get('/vr', 'Qf\QfController@vr');

    Route::get('/user', function () {
        $user = session('wechat.oauth_user'); // 拿到授权用户资料

    });
});