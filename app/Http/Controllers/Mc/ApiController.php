<?php

namespace App\Http\Controllers\Mc;

use App\Models\Mc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Overtrue\EasySms;
use Validator;

class ApiController extends Controller
{
    public function sms(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required|numeric',
            'openid' => 'required'
        ]);
        $config = [
            // HTTP 请求的超时时间（秒）
            'timeout' => 5.0,

            // 默认发送配置
            'default' => [
                // 网关调用策略，默认：顺序调用
//                'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,

                // 默认可用的发送网关
                'gateways' => [
                    'yunpian',
                ],
            ],
            // 可用的网关配置
            'gateways' => [
                'yunpian' => [
                    'api_key' => env('yunpian_key')
                ]
            ],
        ];
        $easySms = new EasySms\EasySms($config);

        if (Redis::get(Carbon::today()->format('ydm') . $request->openid) >= 5) {
            //判断是否重发超过5次
            return response()->json([
                'code' => 0,
                'result' => '今日发送数量超过5条！'
            ]);
        } else {
            $code = random_int(000000, 999999);
            $easySms->send($request->phone, [
                'content' => '【上汽名爵】您的验证码是' . $code,
            ]);
            Redis::setex($request->phone.'_' . $request->openid, 180, $code);//录入验证码
            Redis::incr(Carbon::today()->format('ydm') . $request->openid);
            return response()->json([
                'code' => 1,
                'result' => '发送成功!'
            ]);
        }
    }

    public function userStore(Request $request)
    {
        $this->validate($request, [
            'openid' => 'required',
            'username' => 'required',
            'sms' => 'required|numeric',
            'intention' => 'required',
            'phone' => 'required|numeric',
        ]);
        if (Redis::exists($request->phone . '_' . $request->openid)) {
            $sms = Redis::get($request->phone . '_' . $request->openid);
            if ($sms == $request->sms) {
                //保存用户信息
                $mc = new Mc();
                $mc->username = $request->username;
                $mc->openid = $request->openid;
                $mc->intention = $request->intention;
                $mc->phone = $request->phone;
                $mc->save();

                return response()->json([
                    'code' => 1,
                    'result' => '提交成功!'
                ]);
            } else {
                return response()->json([
                    'code' => 0,
                    'result' => '验证码输入错误！'
                ]);
            }
        } else {
            return response()->json([
                'code' => 0,
                'result' => '验证码不匹配！'
            ]);
        }
    }

    public function userCheck(Request $request)
    {
        $this->validate($request, [
            'openid' => 'required'
        ]);

        $user = Mc::where('openid', $request->openid)->first();

        if (is_null($user)) {
            return response()->json([
                'code' => 0,
                'userInfo' => null
            ]);
        }
        return response()->json([
            'code' => 1,
            'userInfo' => $user->all(),
        ]);
    }
}
