<?php

namespace App\Http\Controllers\Fudan;

use App\Models\FudanLog;
use App\Models\FudanSmall;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Overtrue\EasySms;

class MeetController extends Controller
{
    public function sendMessage()
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
        $user = FudanSmall::where('message', 0)->fisrt();

        while (!is_null($user)) {
            $easySms->send($user->phone, [
                'content' => '【复旦大学EMBA】感谢您报名参加复旦大学EMBA2018中国企业家高峰论坛暨同学会年会！请您于12月8日8:30莅临上海国际会议中心7楼上海厅（上海市浦东新区滨江大道2727号）。本短信仅限本人签到入场，无法二次识别，转发截屏无效，请善存！本人现场签到二维码请点击此链接：https://api.shanghaichujie.com/api/qrcode/generate?text='.$user->phone,
            ]);
            $user->message = '1';
            $user->save();

            $user = FudanSmall::where('message', 0)->fisrt();
        }

        return 'true';
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * 手动队列打印，根据录入电脑区分
     */
    public function queue(Request $request)
    {
        $user = $request->input('user');

        $a = FudanSmall::where('user', $user)
            ->where('print', 1)
            ->first();

        $status = 0;

        if (!is_null($a)) {
            $status = 1;
            $a->print = 0;
            $a->save();
        }
        return response()->json([
            'status' => $status,
            'data' => $a
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * 扫码签到
     */
    public function sign(Request $request)
    {
        $phone = $request->input('phone');
        $type = $request->input('type');
        $a = FudanSmall::where('phone', $phone)->first();

        $status = 0; //0为查不到数据，1为签到成功，2为重复签到

        if (!is_null($a)) {
            $status = 2;
            if ($a->sign === 0) {
                $a->sign = 1;
                $a->save();
                $status = 1;
                //记录日志
                $log = new FudanLog();
                $log->username = $a->username;
                $log->type = $type;
                $log->grade = $a->grade;
                $log->save();
            }

        }
        return response()->json([
            'status' => $status,
            'data' => $a
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * 返回所有已经签到的人用于抽奖
     */
    public function all()
    {
        $a = FudanSmall::where('sign', 1)->get();

        return response()->json([
            'data' => $a
        ]);
    }
}
