<?php

namespace App\Http\Controllers\Yh;

use App\Models\Yh;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\gameSuning;

class ShakeController extends Controller
{
    public function shake()
    {
        $wechat = session('wechat.oauth_user.default');
        $user = Yh::where('openid', $wechat['id'])->first();
        if (is_null($user)) {
            $user=new Yh();
            $user->openid = $wechat['id'];
            $user->avatar = $wechat['avatar'];
            $user->nickname = $wechat['nickname'];
            $user->save();
            event(new GameSuning($wechat['id'], $wechat['avatar'], $wechat['nickname']));
        }elseif ($user->status == 0) {
            event(new GameSuning($wechat['id'], $wechat['avatar'], $wechat['nickname']));
        }
        return view('yh.shake', compact('wechat', 'user'));
    }

    public function upload(Request $request)
    {
        $arr = json_decode($request->input('data'));
        foreach ($arr->users as $openid) {
            $user = Yh::where('openid', $openid)->first();
            $user->status =1;
            $user->save();
        }
        return 'true';
    }
}
