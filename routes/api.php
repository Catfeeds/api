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

/**
 * 公共接口
 */

//二维码生成接口
Route::get('qrcode/generate', 'Api\QrcodeController@qrcode');
/* 阿里云oss */
Route::post('ali/oss/upload/image', 'Api\ImageController@aliOssUploadImage');
Route::post('ali/oss/upload/video', 'Api\VideoController@oss');
Route::get('ali/oss/files/all', 'Api\OssController@allFiles');

/*
 * 腾讯AI接口
 */
Route::post('face/cosmetic', 'Api\TencentAIController@faceCosmetic');
Route::post('img/filter', 'Api\TencentAIController@imgFilter');
Route::post('face/identify', 'Api\TencentAIController@faceIdentify');
Route::post('face/newperson', 'Api\TencentAIController@faceNewPerson');

//音频上传接口
Route::post('audio/upload', 'Api\\AudioController@upload');
//图片上传接口(宋-用于人脸识别比对 美素用于上传派样机拍照图片)
Route::post('image/upload', 'Api\\ImageController@upload');

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
//用于h5上传拍照
Route::post('ali/h5/upload', 'Ali\ApiController@h5Upload');
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

/**
 * Cowin接口
 * COWIN微信头像转base64
 * 下载抽奖头像
 */
Route::post('cowin/image', 'Cowin\ApiController@image');
Route::get('cowin/avatar', 'Cowin\ApiController@api');
Route::post('cowin/phone', 'Cowin\ApiController@phone');
/**
 * 美素2018路演
 */
Route::post('friso/gift', 'Friso\ApiController@gift');//派样机判断奖品领取接口
Route::post('friso/reward', 'Friso\ApiController@qr');//现场h5核销二维码
/**
 * 2018腾讯大会评论互动
 */
Route::get('zyhx/comments', 'Zyhx\ApiController@getComments');
Route::post('zyhx/comment', 'Zyhx\ApiController@comment');
Route::post('zyhx/zan', 'Zyhx\ApiController@zan');

/**
 * 中泰证券
 */
Route::post('zt/user', 'Api\ZtController@user');

/**
 * 纯悦互动展厅
 */
Route::post('dew/upload', 'Dew\ApiController@dew');//拍照上传
Route::post('dew/user', 'Dew\ApiController@user');
Route::post('dew/score', 'Dew\ApiController@score');
Route::get('dew/rank', 'Dew\ApiController@rank');

//百度语音
Route::get('baidu/voice', 'Api\VoiceController@voice');

/**
 * 名爵互动车展小程序接口
 */
Route::get('mc/user/check', 'Mc\ApiController@userCheck');
Route::post('mc/sms', 'Mc\ApiController@sms');
Route::post('mc/user/store', 'Mc\ApiController@userStore');
Route::get('mc/qrcode/check', 'Mc\ApiController@qrcodeCheck');
Route::get('mc/qrcode/scan', 'Mc\ApiController@qrcodeScan');
Route::get('mc/goods', 'Mc\ApiController@goods');
Route::get('mc/exchange', 'Mc\ApiController@exchange');
Route::get('mc/openid', 'Mc\ApiController@openid');
//游戏开始
Route::post('mc/game/start', 'Mc\GameController@gameStart');
//游戏结束
Route::post('mc/game/over', 'Mc\GameController@gameOver');
//查询游戏结果
Route::post('mc/game/status', 'Mc\GameController@status');
//简单注册用户
Route::post('mc/user/new', 'Mc\ApiController@sign');
//数据统计
Route::get('mc/search/phone', 'Mc\StatisticsController@searchUser');
Route::post('mc/set', 'Mc\StatisticsController@setWait');


/**
 * 天猫精品h5
 */
Route::post('tmail/coin/sub', 'Tmail\ApiController@subCoin');
Route::post('tmail/coin/add', 'Tmail\ApiController@addCoin');
Route::get('tmail/statistic', 'Tmail\ApiController@statistic');

/**
 * 阿玛尼20180501
 */
Route::get('armani/email','Armani\EmailController@mail');
//视频上传接口(用于armani项目，20180530)
//Route::post('video/upload', 'Armani\VideoController@upload');

/**
 * 联邦快递(永久)
 */
Route::post('fed/upload', 'Fed\FedController@api');
/**
 * ar 素材接口
 */
Route::get('ar/audio', 'Material@audio');
Route::get('ar/material/android', 'Material@android');
Route::get('ar/material/ios', 'Material@ios');

/**
 * absolut 接口
 */
Route::post('absolut/upload/image', 'Absolut\ApiController@uploadImg');
Route::get('absolut/print/image', 'Absolut\ApiController@printImg');
Route::get('absolut/print/confirm', 'Absolut\ApiController@printConfirm');

/*
 * 滴露跑酷游戏
 */
Route::post('dettol/rank', 'Dettol\DettolController@api');


/**
 * coach 照片存储
 */
Route::post('coach/upload/image', 'Coach\CoachController@UploadImage');

/*
 * 雪佛兰电音节
 */
Route::post('chevy/score', 'ChevyController@api');
Route::post('chevy/redirect', 'ChevyController@h5rank');

/*
 * 复旦教师节
 */
Route::post('fudan/user', 'FudanController@info');

/*
 * 欧莱雅h5接口
 */
Route::post('oreal/user', 'Oreal\ApiController@register');

/*
 * 平安云加速器D-day
 */
Route::post('pingAn/user', 'PingAn\ApiController@user');

/*
 * 天猫精灵
 */
Route::post('genie/sign', 'Tmall\GenieController@sign');
Route::get('genie/time', 'Tmall\GenieController@genieTime');
Route::get('genie/confirm/{id}', 'Tmall\GenieController@confirm');
Route::get('genie/teams', 'Tmall\GenieController@teams');
Route::get('genie/punish/{id}', 'Tmall\GenieController@punish');
Route::get('genie/rank', 'Tmall\GenieController@rank');