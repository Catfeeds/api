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
    Route::get('/share', 'Qf\QfController@share');
    Route::get('/shareto', 'Qf\QfController@shareTo');
    Route::get('/online/{openid}', 'Qf\QfController@online');
});

Route::get('qf/time', 'Qf\QfController@time');

Route::any('/wechat', 'Wechat\WechatController@serve');

/**
 * jc(吕)项目，用户显示上传的视频
 */
Route::group(['middleware' => ['web', 'wechat.oauth:snsapi_base']], function () {
    Route::get('/jc/video', 'Api\VideoController@show');
});

/**
 * 阿里巴巴公益三公里
 */
Route::get('ali/user/{uid}', 'Ali\AliController@index');
Route::get('ali/show', function () {
    return view('ali.show');
});

Route::get('ali/event', function (){
   event(new \App\Events\AliPhoto('20170905143420'));

   return 'true';
});