<?php

namespace App\Http\Controllers;

use App\Models\Chevy;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChevyController extends Controller
{
    public function index(Request $request)
    {
        return '雪佛兰电音节h5入口';
    }

    public function api(Request $request)
    {
        $score = $request->score;
        $user = Chevy::where('openid', $request->openid)->first();
        if (is_null($user)) return 'false';

        //录入今日分数
        $today = Carbon::today();
        if ($user->updated_at > $today) {
            if ($user->score < $score) {
                $user->score = $score;
            }
        } else {
            $user->score = $score;
        }

        //最高分数
        if ($user->top < $score)
            $user->top = $score;

        $user->save();

        return 'true';
    }

    /*
     * h5游戏结束跳转排行榜
     */
    public function h5rank(Request $request)
    {
        $user = Chevy::where('openid', $request->openid)->first();
        $cb = Carbon::createFromFormat('Y-m-d H:i:s', $request->gameTime);
        if ($cb < $user->updated_at) {
            return 'true';
        }
        return 'false';
    }
}
