<?php

namespace App\Http\Controllers\Dew;

use App\Models\Dew;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat;

class PhoneController extends Controller
{
    public function index()
    {
        $wechatInfo = session('wechat.oauth_user');
        $js = EasyWeChat::officialAccount();
        $user = Dew::where('openid', $wechatInfo['id'])->first();

        return view('dew.index', compact('js', 'user', 'wechatInfo'));
    }
}
