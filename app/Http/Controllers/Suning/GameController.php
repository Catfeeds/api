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
        dd($wechat);
        event(new GameSuning('test1', 'https://ss1.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=1788562038,3472846301&fm=27&gp=0.jpg', 'xxx'));
        return view('suning.shake');
    }

    public function shake()
    {
        return view('suning.shake');
    }
}
