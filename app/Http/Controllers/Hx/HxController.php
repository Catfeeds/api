<?php

namespace App\Http\Controllers\Hx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Overtrue\EasySms;

class HxController extends Controller
{
    public function sign(Request $request)
    {
        $id= $request->id;
        //0签到失败，1签到成功，2重复签到
        return response()->json([
            'status' => 1,
            'name' => '张国荣',
            'company' => '上海触界数码科技'.$id
        ]);
    }

    public function sms()
    {
        $config = [
            // HTTP 请求的超时时间（秒）
            'timeout' => 5.0,

            // 默认发送配置
            'default' => [
                // 网关调用策略，默认：顺序调用
//                'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,

                // 默认可用的发送网关
                'gateways' => [
                    'aliyun',
                ],
            ],
            // 可用的网关配置
            'gateways' => [
                'aliyun' => [
                    'access_key_id' => 'LTAIBA9gKn4R2Zap',
                    'access_key_secret' => 'JGrYLZeYL4vQYIc0bKCAzCbuR5zEbt',
                    'sign_name' => '阿里云短信测试专用',
                ],
            ],
        ];
        $easySms = new EasySms\EasySms($config);

        $easySms->send(13331936826, [
            'content'  => '您的验证码为: 6379',
            'template' => 'SMS_82255160',
            'data' => [
                'customer' => '666'
            ],
        ]);
        dd($easySms);
    }
}
