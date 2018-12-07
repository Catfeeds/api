<?php

namespace App\Http\Controllers\Suning;

use App\Events\gameSuning;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class GameController
 * @package App\Http\Controllers\Suning
 *
 * 20181106
 *
 * 用于苏宁跑酷摇一摇
 */
class GameController extends Controller
{
    public function index()
    {
        $wechat = session('wechat.oauth_user.default');
        event(new GameSuning($wechat['id'], $wechat['avatar'], $wechat['nickname']));
        return view('suning.shake', compact('wechat'));
    }

}
