<?php

namespace App\Http\Controllers\Yh;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\gameSuning;

class ShakeController extends Controller
{
    public function shake()
    {
        $wechat = session('wechat.oauth_user.default');
        event(new GameSuning($wechat['id'], $wechat['avatar'], $wechat['nickname']));
        return view('yh.shake', compact('wechat'));
    }
}
