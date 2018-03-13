<?php

namespace App\Http\Controllers\Friso;

use App\Models\Friso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class GameController extends Controller
{
    public function enter(Request $request)
    {
        //游戏初始化
        $openid = $request->openid;
        $headimg = $request->headimgurl;
        $nickname = $request->nickname;
        $isnewreg = $request->isnewreg;

        $user_info = Meisu::where('openid', '=', $openid)->first();
        $location_list = Location::where('enabled', '=', 1)->orderBy('id', 'desc')->get();
        if ($user_info == null) {
            $Meisu = new Meisu;
            $Meisu->openid = $openid;
            $Meisu->headimg = $headimg;
            $Meisu->nickname = $nickname;
            $Meisu->save();
            session(['user_info.openid' => $openid]);
            session(['user_info.status' => 3]);
            $status = 3;
        } else {
            session(['user_info.openid' => $user_info->openid]);
            session(['user_info.status' => $user_info->status]);
            $status = $user_info->status;
        }

        return view('location', compact('request'));
    }

    public function queue(Request $request)
    {
        //录入查询信息
        $openid = $request->openid;
        $headimg = $request->headimgurl;
        $nickname = $request->nickname;
        $isnewreg = $request->isnewreg;

        $userInfo = Friso::firstOrCreate(
            ['openid' => $openid],
            [
                'headimg'=> $headimg,
                'nickname' => $nickname,
            ]
        );

    }
}
