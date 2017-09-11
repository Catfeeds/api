<?php

namespace App\Http\Controllers\Api;

use App\Models\Bgy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BgyController extends Controller
{
    /**
     * 天麓府项目签到
     *
     * @return string
     */
    public function index()
    {
        $userInfo = session('wechat.oauth_user');
        $bgy = Bgy::updateOrCreate(
            ['openid' => $userInfo->id],
            ['avatar' => $userInfo->avatar, 'nickname' => $userInfo->name]
        );

        return '签到成功！';
    }

    /**
     * 天麓府项目api接口，返回签到用户信息
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function user()
    {
        $bgy = Bgy::where('status', 0)->first();
        if (is_null($bgy)) {
            return response()->json([
                'code' => 1,
                'name' => '陈兆阳',
                'url' => 'http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTJuqVss6FgN8D7Vqoib1H29bicOdF5uvFa4rfRZnK7WLXsoTwZX1iaiauye91M7OydZWOZevgsWWVZUww/0'
            ]);
        }
        $bgy->status = 1;
        $bgy->save();

        return response()->json([
            'code' => 1,
            'name' => $bgy->nickname,
            'url' => $bgy->avatar
        ]);
    }
}
