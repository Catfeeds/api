<?php

namespace App\Http\Controllers\Zl;

use App\Models\Zl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZlController extends Controller
{
    public function sign()
    {
        $wechatInfo = session('wechat.oauth_user');
        Zl::firstOrCreate(['openid' => $wechatInfo['id']], [
            'nickname' => $wechatInfo['nickname'],
            'avatar' => $wechatInfo['avatar']
        ]);
        return '签到成功';
    }

    public function draw()
    {

    }
}
