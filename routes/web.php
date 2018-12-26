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

/**
 * oss 分享
 */

Route::get('oss/img/share', 'Api\OssController@imgShare');

Route::get('test', 'TestController@test');

/*
 * 科思创项目
 */

Route::get('/audios/{audio}', 'Ksc\\AudioController@index');

/**
 * 中控系统
 */
//Route::get('/touch', function () {
//    return view('touch');
//});

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
//    Route::get('/jc/video', 'Api\VideoController@show');
});

/**
 * 阿里巴巴公益三公里
 */
Route::get('ali/user/{uid}', 'Ali\AliController@index');
Route::get('ali/h5', 'Ali\AliController@h5');
Route::get('ali/h5share/{id}', 'Ali\AliController@h5Share');
Route::get('ali/show', function () {
    return view('ali.show');
});

Route::get('ali/bmShow', function () {
    $js = EasyWeChat::officialAccount();
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
//    Route::get('aiaGame/index', function () {
//        return redirect('http://cs.touchworld-sh.com/lolo/aia_end/');
//    });
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
//Route::get('hxSign', function () {
//    return view('hx.register');
//});
//Route::post('hxSign/register', 'Hx\HxController@register');
//Route::get('hxSign/{id}', 'Hx\HxController@qrcode');
//Route::get('hxSms', 'Hx\HxController@sms');

/**
 * 赛诺菲星球邀请函
 */
//杭州
Route::get('snf/hz', function () {
    $js = EasyWeChat::officialAccount();
    return view('planet.hz', compact('js'));
});
//深圳
Route::get('snf/sz', function () {
    $js = EasyWeChat::officialAccount();
    return view('planet.sz', compact('js'));
});

/**
 * 中梁翡翠滨江弹幕签到 ，现用作碧桂园弹幕
 */
//    Route::get('zl/sign', function () {
//        return view('zl.sign');
//    });
//    Route::post('zl/sign', 'Zl\ZlController@sign');

Route::group(['middleware' => ['web', 'wechat.oauth:snsapi_userinfo']], function () {
    Route::get('barrage/barrageSubmit', 'Api\BgyController@index');
    Route::post('barrage/barrageSubmit', 'Api\BgyController@create');
});

//抽奖
//Route::get('zl/result', 'Zl\ZlController@draw');
//操控
//Route::get('zl/control', function () {
//    return view('zl.change');
//});
//Route::post('zl/control', 'Zl\ZlController@control');

/**
 * 180度摄影,莱美医疗
 */
//Route::get('myLike', 'MyLike\IndexController@index');
//Route::get('myLike2', 'MyLike\IndexController@index2');

/**
 *哥伦比亚羽绒服显示热成像拍照
 */
Route::get('columbia', 'Columbia\IndexController@index');

/**
 * 人脸融合
 */
Route::get('face/index', function () {
    return view('face.test');
});

/**
 * 浪琴h5 8场活动
 */

Route::group(['prefix' => 'longines'], function () {
    Route::get('sjz', 'Longines\IndexController@sjz');
    Route::get('bd', 'Longines\IndexController@bd');
    Route::get('hhht', 'Longines\IndexController@hhht');
    Route::get('hz/jl', 'Longines\IndexController@hzjl');
    Route::get('hz/yt', 'Longines\IndexController@hzyt');
    Route::get('bj/lx', 'Longines\IndexController@bjlx');
    Route::get('bj/sl', 'Longines\IndexController@bjsl');
    Route::get('bj/xsj', 'Longines\IndexController@bjxsj');
    Route::get('socket/{location}', 'Longines\HelperController@socket');

    Route::get('share', 'Longines\HelperController@share');
});

/**
 * castrol工厂开业
 */
Route::get('castrol/index', 'Castrol\CastrolController@index');
Route::get('castrol/upload', 'Castrol\CastrolController@uploadPhoto');
Route::get('castrol/gather', 'Castrol\CastrolController@gather');

/**
 * 渣打银行h5兑奖
 */
Route::get('zc/index', function () {
    return redirect('http://api.touchworld-sh.com:8001/vvip');
});

/**
 * 凯翼汽车h5
 */
Route::group(['middleware' => ['web', 'wechat.oauth:snsapi_userinfo']], function () {
    Route::get('cowin/index', 'Cowin\IndexController@index');//邀请函首页
    Route::post('cowin/greeting', 'Cowin\IndexController@greeting');
    Route::get('ky/index', 'Cowin\IndexController@guide');

});
Route::get('cowin/share/{id}', 'Cowin\IndexController@share');

/**
 * friso美素佳儿2018
 */
Route::get('friso/pyj', 'Friso\PyjController@index');//显示派样机领奖包
Route::get('friso/reward', 'Friso\PyjController@reward');
Route::get('friso/h5/index', 'Friso\H5Controller@index');
Route::post('friso/h5/draw', 'Friso\H5Controller@draw');
/* 美素互动20181103 */
Route::get('friso/answer/index', 'Friso\UserController@index')
    ->middleware('wechat.oauth:snsapi_base');
/**
 * 2018腾讯大会评论互动
 */
Route::get('zyhx/index', 'Zyhx\IndexController@screen');
Route::group(['middleware' => ['web', 'wechat.oauth:snsapi_userinfo']], function () {
    Route::get('zyhx/phone', 'Zyhx\IndexController@phoneIndex');
});
/**
 * 纯悦项目
 */
Route::group(['middleware' => ['web', 'wechat.oauth:snsapi_base']], function () {
    Route::get('dew/index', 'Dew\PhoneController@index');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * 阿玛尼视频上传显示
 */
Route::get('armani/video', 'Armani\VideoController@show');

/**
 * 联邦照片
 */
Route::get('fed/index', 'Fed\FedController@index');

Route::get('tencent/share', function (\Illuminate\Http\Request $request) {
    $path = $request->path;
    $js = EasyWeChat::officialAccount();
    return view('tencent', compact('js', 'path'));
});

/*
 * 滴露跑酷游戏
 */
Route::group(['middleware' => ['web', 'wechat.oauth:snsapi_base']], function () {
    Route::get('res/dettol/index', 'Dettol\DettolController@index');
});

/**
 * 创新能源大会入口 20180907
 */
Route::get('html/energy/index', function () {
    $js = EasyWeChat::officialAccount();
    return view('energy', compact('js'));
});

Route::get('html/energy/index2', function () {
    $js = EasyWeChat::officialAccount();
    return view('energy', compact('js'));
});

/**
 * 名爵车展数据统计
 */
Route::group(['middleware' => ['web', 'auth'],], function () {
    Route::get('mg/everyday', 'Mc\StatisticsController@everyday');
    Route::get('mg/setting', 'Mc\StatisticsController@setting');
    Route::get('mg/search', 'Mc\StatisticsController@searchIndex');
});
/*
 * coach 取照片
 */
Route::get('coach/photo', 'Coach\CoachController@GetImage');

/*
 * 科莱丽人员信息
 */
Route::get('res/clari/{id}', 'Clari\ClariController@index');

/*
 * 雪佛兰电音节h5入口
 */
Route::get('res/chevy/index', 'ChevyController@index');
Route::get('res/chevy/rank/index', 'ChevyController@rank');
Route::get('res/chevy/scan/index', 'ChevyController@scan');//先用做语音变换灯光
/**
 * 复旦项目
 */
Route::get('fudan/send/message', 'Fudan\MeetController@sendMessage');
/* 复旦教师节(取消) */
//Route::get('res/fudan/index', 'FudanController@index');

/*
 * absolut
 */
Route::get('res/absolut/pad/{id}', 'Absolut\IndexController@pad');
Route::get('res/absoult/phone', function () {
    return redirect(url('res/absolut/phone/index'));
});
Route::get('res/absolut/phone/index', 'Absolut\IndexController@phone');
Route::get('res/absolut/share', 'Absolut\IndexController@share');

/* oreal第一次 */
Route::get('res/oreal/register/index', 'Oreal\IndexController@register');
/* oreal第二次注册 20181113 */
Route::redirect('res/oreal/register/second', url('/'). '/res/oreal/oreal_register/register.html');
/* oreal 第三次 游戏 20190108 */


/*
 * 平安
 */
Route::get('res/pingAn/zh/index', 'PingAn\IndexController@zh');
Route::get('res/pingAn/en/index', 'PingAn\IndexController@en');
Route::get('res/pingAn/imgdemo/index', 'PingAn\IndexController@imgDemo');
/* 郑-图片分享 20181123 */
Route::get('pingAn/img/share', 'PingAn\ImgShareController@index');
/*
 * 天猫精灵活动战队
 */
Route::get('tmall/genie/sign', 'Tmall\GenieController@index');
Route::get('tmall/genie/control', 'Tmall\GenieController@control');
Route::get('res/genie/album/index', 'Tmall\GenieController@album');
/* 天猫汽车 */
Route::get('res/tmall/car/index', 'Tmall\CarController@register');
Route::post('tmall/car/user/store', 'Tmall\CarController@store');
Route::get('res/tmall/rank1/index', 'Tmall\CarController@carIndex');
/*
 * 雅培活动
 */
Route::redirect('res/wyeth/album/index', 'http://cs.touchworld-sh.com/lolo/album/');
Route::get('res/abbott/index', function () {
    $js = EasyWeChat::officialAccount();
    return view('abbott.index', compact('js'));
});
Route::get('res/abbott/index2', function () {
    $js = EasyWeChat::officialAccount();
    return view('abbott.index2', compact('js'));
});

/*
 * 进博会新西兰
 */
Route::get('newzealand/share', 'Newzealand\IndexController@index');
Route::get('res/ciie/panoramic', 'Newzealand\IndexController@panoramic');

/**
 * 上海马拉松
 */
Route::get('shangma', 'ShangmaController@index');

/**
 * 玫凯琳
 */
Route::get('res/marykay/register', 'Marykay\MarykayController@index')->middleware('wechat.oauth:snsapi_base');

/**
 * 渣打银行
 */
Route::get('res/sc/card', 'Sc\CardController@card'); //梦想留言机

/**
 * 苏宁
 */
Route::group(['middleware' => ['web', 'wechat.oauth:snsapi_userinfo']], function () {
    Route::get('res/suning/game/index', 'Suning\GameController@index');
});

/**
 *  前后端分离重定向
 */
Route::get('front/{v}', 'Front\IndexController@index')->where('v', '.*');