<?php

namespace App\Http\Controllers\Hx;

use App\Http\Requests\HxRegisterRequest;
use App\Models\Hx1;
use App\Models\Hx2;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Overtrue\EasySms;

class HxController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 扫码签到接口
     */
    public function sign(Request $request)
    {
        $id = $request->id;
        //0签到失败，1签到成功，2重复签到
        $userInfo = Hx1::find($id);
        if (is_null($userInfo)) {
            return response()->json([
                'status' => 0,
                'name' => '空',
                'company' => '空'
            ]);
        } elseif ($userInfo->sign) {
            return response()->json([
                'status' => 2,
                'name' => $userInfo->name,
                'company' => $userInfo->company
            ]);
        } else {
            $userInfo->sign = 1;
            $userInfo->save();

            return response()->json([
                'status' => 1,
                'name' => $userInfo->name,
                'company' => $userInfo->company
            ]);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 显示签到二维码页面
     */
    public function qrcode($id)
    {
        return view('hx.qrcode', compact('id'));
    }

    public function register(HxRegisterRequest $request)
    {
        $company = $request->input('company');
        $phone = $request->input('phone');
        $name = $request->input('name');
        $user = new Hx2();
        $user->name = $name;
        $user->phone = $phone;
        $user->company = $company;
        $user->save();
        return back()->with('success','提交成功');
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
            'content' => '您的验证码为: 6379',
            'template' => 'SMS_82255160',
            'data' => [
                'customer' => '666'
            ],
        ]);
        dd($easySms);
    }
}
