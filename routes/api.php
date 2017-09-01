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
//启赋有机签到接口(弃用)
//Route::post('qf/user', 'Qf\QfController@user');

//阿里公益三小时
Route::post('img/ali', 'Api\ImageController@ali');

Route::get('test', function (Request $request){
    if ($request->id == '1'){
        return response()->json([
            'code' => 'true',
            'hours' => '5',
            'name' => 'xxxx'
        ]);
    }else {
        return response()->json([
            'code' => 'false',
            'hours' => '',
            'name' => ''
        ]);
    }

});