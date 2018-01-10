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

//音频上传接口
Route::post('audio/upload', 'Api\\AudioController@upload');
//图片上传接口(宋-用于人脸识别比对)
Route::post('image/upload', 'Api\\ImageController@upload');
//视频上传接口(JC_Campaign_tech)
Route::post('video/upload', 'Api\VideoController@upload');
//微信小程序
Route::group(['namespace' => 'Mini', 'prefix' => 'mini'], function () {
    Route::get('/index', 'IndexController@index');
    Route::get('/groups', 'IndexController@group');
    Route::get('/setting', 'IndexController@setting_info');
    Route::post('/setting', 'IndexController@setting');
    Route::get('/setting2', 'IndexController@setting2');
});

/**
 * 阿里公益三小时项目
 *
 */
//用于拍照上传生成二维码
Route::post('img/ali', 'Api\ImageController@ali');
//用于门禁和拍照
Route::get('ali/user', 'Ali\ApiController@user');
//用于小主机服务器访问阿里数据接口，更新公益数据
Route::get('ali/total', 'Ali\ApiController@total');
//大屏更新轮播图，10张正面照片
Route::get('ali/event', 'Ali\ApiController@event');

/**
 * 天麓府（已经结束）
 */
Route::get('bgy/user', 'Api\BgyController@user');

/**
 * AIA项目上传游戏数据
 */
Route::post('aiaGame/resultApi', 'Aia\AiaController@resultApi');
Route::get('aia/share', 'Aia\AiaController@share');//AIA游戏分享增加次数

/**
 * 阿里云栖大会线下分享
 */
//上传6秒视频
Route::post('ali/yun/photos', 'Api\ImageController@yun');
//上传拍照图片
Route::post('ali/yun/photo', 'Api\ImageController@yunPhoto');



/**
 * 和讯网签到
 */
//Route::get('hxSign', 'Hx\HxController@sign');

/**
 * 弹幕签到
 */
Route::get('zl/users', 'Zl\ZlController@users');

/**
 * MyLike180度摄影
 */
Route::post('myLike/upload','MyLike\ApiController@upload'); //上传gif图片
Route::post('myLike2/upload', 'MyLike\ApiController@upload2');

/**
 * columbia 热成像图片上传接口
 */
Route::post('/columbia/photo', 'Api\ImageController@columbia');

/**
 * 人脸融合接口
 */
Route::post('qq/face/upload', 'Api\FaceController@upload');

/**
 * suning 上传参会人员信息
 */
Route::post('suning/userInfo', 'Api\SuningController@user');

/**
 * Castrol 现场签到
 */
Route::post('castrol/photo/upload', 'Castrol\CastrolController@upload');
