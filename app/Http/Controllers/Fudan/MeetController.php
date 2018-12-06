<?php

namespace App\Http\Controllers\Fudan;

use App\Models\FudanBig;
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
        $user = FudanSmall::where('message', 0)
            ->where('phone', '!=', null)
            ->first();

        while (!is_null($user)) {
            $user->message = '1';
            $user->save();

            $easySms->send($user->phone, [
                //二维码短信
                'content' => '【复旦大学EMBA】感谢您报名参加复旦大学EMBA2018中国企业家高峰论坛暨同学会年会！请您于12月8日8:30莅临上海国际会议中心7楼上海厅（上海市浦东新区滨江大道2727号）。本短信仅限本人签到入场，无法二次识别，转发截屏无效，请善存！本人现场签到二维码请点击此链接：https://api.shanghaichujie.com/api/qrcode/generate?text='.$user->phone,
                //8：00
//                'content' => '【复旦大学EMBA】欢迎您来到复旦大学EMBA2018中国企业家高峰论坛，大会将于9:00准时开始，请您在7楼上海厅门口签到处及时办理签到入场。签到时请出示手机短信二维码，若无法提供二维码，请向工作人员告知您的姓名和班级，工作人员将会在现场帮您办理签到。二维码仅限本人签到使用，无法二次识别。',
                //12：30
//                'content' => '【复旦大学EMBA】感谢您参加复旦大学EMBA2018中国企业家高峰论坛，请根据胸牌上的用餐提示至滨江厅、欧洲厅、明珠厅、西餐厅享用午餐，祝您用餐愉快！',
                //13：15
//                'content' => '【复旦大学EMBA】欢迎您参加下午的同学会产业论坛，会议将于13:30准时开始，请至5楼/9楼签到处办理签到。签到时请出示手机短信二维码，若无法提供二维码，请向工作人员告知您的姓名和班级，工作人员将会在现场帮您办理签到。分论坛主题和地点分别为：医疗健康产业分会-5楼BC，奥林分会-5楼DE，教育论坛分会-5楼F，创投分会-5楼H，房地产分会-9楼浦江厅；二维码仅限本人签到使用，无法二次识别。',
                //18：00
//                'content' => '【复旦大学EMBA】欢迎您来到2018复旦大学EMBA同学会年会·沃尔沃之夜，晚宴将于18:30准时开始，请您在7楼上海厅门口签到处及时办理签到，签到后您将领取晚宴Lucky Draw奖券。签到时请出示手机短信二维码，若无法提供二维码，请向工作人员告知您的姓名和班级，工作人员将会在现场帮您办理签到。二维码仅限本人签到使用，无法二次识别。请根据座位引导图至您指定的区域就座，祝您用餐愉快！',
                //21：00
//                'content' => '【复旦大学EMBA】2018复旦大学EMBA同学会年会圆满结束，感谢您的倾情参与，请携带好随身物品，有序离开会场。如需返回复旦管理学院，我们已安排大巴接送，大巴将于21:30准时发车，请至上海国际会议中心1楼正门上车。祝您旅途愉快，我们明年再见！',

            ]);

            $user = FudanSmall::where('message', 0)
                ->where('phone', '!=', null)
                ->first();
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
        $a = FudanBig::where('user', $user)
            ->where('print', 1)
            ->first();

        $status = 0;

        if (!is_null($a)) {
            $status = 1;
            $a->print = 0;
            $a->save();

            //记录日志
            $log = new FudanLog();
            $log->username = $a->username;
            $log->type = '打印';
            $log->grade = $a->grade;
            $log->save();
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
        $a = FudanBig::where('phone', $phone)->first();

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
