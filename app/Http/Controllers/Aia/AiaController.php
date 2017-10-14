<?php

namespace App\Http\Controllers\Aia;

use App\Models\Aia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat;

class AiaController extends Controller
{
    public function index()
    {
        $wechatInfo = session('wechat.oauth_user');
        $js = EasyWeChat::js();
        $userInfo = Aia::firstOrCreate([
            'openid' => $wechatInfo['id']
        ], [
            'totalScore' => 0
        ]);
        dd($userInfo);
        return view('aia.index', compact('js', 'wechatInfo', 'userInfo'));
    }

    public function test(Request $request)
    {
        return $request->openid . '&' . $request->score;
    }

    public function phone(Request $request)
    {
        $phone = $request->phone;
        $openid = $request->openid;
        return $phone . '/' . $openid;
    }
}
