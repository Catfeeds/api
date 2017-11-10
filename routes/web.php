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

Route::get('test', 'TestController@test');

Route::get('test1', function () {
    event(new \App\Events\ZlBarrage('666', 'http://wx.qlogo.cn/mmopen/CQFhtHfg7bll1aztrVrUPQjnwydU7cte79roAPSwvaXJCL4A8BLLMoEX0QVxeuYzHqJYwyGdJmqB2Mia2AQTZawWL2yODR3yB/0', '0000'));
    return 'true';
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

Route::get('ali/bmShow', function () {
    $js = EasyWeChat::js();
    return view('ali.bm', compact('js'));
});
/**
 * 阿里云栖大会
 */
Route::get('ali/yunShow', 'Ali\AliController@yun');
Route::get('ali/yunVideo', 'Ali\AliController@yunVideo');

/**
 * 天麓府项目(已经结束)
 */
Route::group(['middleware' => ['web', 'wechat.oauth:snsapi_userinfo']], function () {
    Route::get('bgy', 'Api\BgyController@index');
});

/**
 * AIA游戏项目
 */
Route::group(['middleware' => ['web', 'wechat.oauth:snsapi_base']], function () {
    //游戏首页
    Route::get('aiaGame/index', 'Aia\AiaController@index');
    //游戏战绩页面
    Route::get('aiaGame/result', 'Aia\AiaController@result');
    //游戏失败页面
    Route::get('aiaGame/fail', 'Aia\AiaController@fail');
    //游戏上传手机号参与易服务
    Route::post('aiaGame/phone', 'Aia\AiaController@phone');
});

/**
 * 和讯网签到项目
 */
Route::get('hxSign', function () {
    return view('hx.register');
});
Route::post('hxSign/register', 'Hx\HxController@register');
Route::get('hxSign/{id}', 'Hx\HxController@qrcode');
Route::get('hxSms', 'Hx\HxController@sms');

/**
 * 赛诺菲星球邀请函
 */
//杭州
Route::get('snf/hz', function () {
    $js = EasyWeChat::js();
    return view('planet.hz', compact('js'));
});
//深圳
Route::get('snf/sz', function () {
    $js = EasyWeChat::js();
    return view('planet.sz', compact('js'));
});

/**
 * 中梁翡翠滨江弹幕签到 ，现用作碧桂园弹幕
 */
//    Route::get('zl/sign', function () {
//        return view('zl.sign');
//    });
//    Route::post('zl/sign', 'Zl\ZlController@sign');
Route::get('barrage/barrageSubmit', 'Zl\ZlController@barrageInput');
Route::post('barrage/barrageSubmit', 'Zl\ZlController@barrageSubmit');

//抽奖
Route::get('zl/result', 'Zl\ZlController@draw');
//操控
Route::get('zl/control', function () {
    return view('zl.change');
});
Route::post('zl/control', 'Zl\ZlController@control');

/**
 * 180度摄影,莱美医疗
 */
Route::get('myLike', 'MyLike\IndexController@index');
Route::get('myLike2', 'MyLike\IndexController@index2');

/**
 *哥伦比亚羽绒服显示热成像拍照
 */
Route::get('columbia', 'Columbia\IndexController@index');
