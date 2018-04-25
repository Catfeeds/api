<?php

namespace App\Http\Controllers\Tmail;

use App\Models\Tmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class IndexController extends Controller
{
    public function index()
    {
        $js= \EasyWeChat::js();
        $wechat = session('wechat.oauth_user');
        $user = Tmail::firstOrCreate([
            'openid'=>$wechat['id']
        ],[
            'nickname' => $wechat['nickname'],
            'avatar' => $wechat['avatar'],
        ]);
        return view('tmail.index', compact('user', 'js'));
    }
}
