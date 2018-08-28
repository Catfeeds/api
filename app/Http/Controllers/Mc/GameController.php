<?php

namespace App\Http\Controllers\Mc;

use App\Events\GameOver;
use App\Events\GameStart;
use App\Models\Mc;
use App\Models\Mclog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class GameController extends Controller
{
    /*
     * 通知游戏开始
     */
    public function gameStart(Request $request)
    {
        if (Redis::get($request->openid)) {
            //上一局游戏尚未结束
            return 'false';
        }

        //场地id、openid、头像
        event(new GameStart($request->id, $request->openid, $request->avatar));

        return 'true';
    }

    /*
     * 游戏状态查询，防止手机息屏没有收到socket信息
     */
    public function status(Request $request)
    {
        if (Redis::get($request->openid)) {
            //上一局游戏尚未结束
            return response()->json([
                'status' => false,
                'top_score' => -1,
                'last_score' => -1
            ]);
        }
        $mg = Mc::where('openid', $request->openid)->first();
        return response()->json([
            'status' => true,
            'top_score' => $mg->top_score,
            'last_score' => $mg->last_score
        ]);

    }
    /*
     * 游戏结束上传分数,通知游戏结束
     */
    public function gameOver(Request $request)
    {
        $openid = $request->openid;
        $score = $request->score;

        $mg = Mc::where('openid', $openid)->first();

        if($score > $mg->top_score) {
            if ($mg->top_score == -1) {
                $mg->coin += $score;
                $log = new Mclog();
                $log->openid = $openid;
                $log->type = '激情对爵';
                $log->handle = '增加';
                $log->coin = $score;
                $log->save();
            }
            $mg->top_score = $score;

        }
        $mg->last_score = $score;
        $mg->save();

        event(new GameOver($openid, $score));
        //注销游戏状态
        Redis::del($openid);
        return 'true';
    }
}
