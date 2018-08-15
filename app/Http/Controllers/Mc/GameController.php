<?php

namespace App\Http\Controllers\Mc;

use App\Events\GameOver;
use App\Events\GameStart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    /*
     * 通知游戏开始
     */
    public function gameStart(Request $request)
    {
        //场地id、openid、头像
        event(new GameStart($request->id, $request->openid, $request->avatar));
        return 'true';
    }
    /*
     * 游戏结束上传分数,通知游戏结束
     */
    public function gameOver(Request $request)
    {
        event(new GameOver($request->openid, $request->score));
        return 'true';
    }
}
