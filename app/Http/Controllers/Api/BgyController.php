<?php

namespace App\Http\Controllers\Api;

use App\Events\ZlBarrage;
use App\Http\Requests\BgySignRequest;
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

//        $bgy = Bgy::updateOrCreate(
//            ['openid' => $userInfo['id']],
//            ['avatar' => $userInfo->avatar, 'nickname' => $userInfo['name']]
//        );
        $bgy = Bgy::where('openid', $userInfo["id"])->first();
        if (is_null($bgy)) {
            return view('barrage.sign');
        }
        return view('barrage.sign')->with('status', '您已经签到过了！');
    }

    public function create(BgySignRequest $request)
    {
        $name = $request->input('name');
        $phone = $request->input('phone');
//        event(new ZlBarrage($barrage));
        $userInfo = session('wechat.oauth_user');
        $bgy = new Bgy;
        $bgy->name=$name;
        $bgy->phone = $phone;
        $bgy->openid = $userInfo['id'];
        $bgy->avatar = $userInfo['avatar'];
        $bgy->nickname = $userInfo['name'];
        $bgy->save();
        return view('barrage.sign')->with('status', '提交成功!');
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
                'code' => 0,
                'name' => '',
                'url' => ''
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
