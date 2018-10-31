<?php

namespace App\Http\Controllers;

use App\Models\Chevy;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChevyController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * 雪佛兰首页，通过官方公众号授权回调
     */
    public function index(Request $request)
    {
        $openid = $request->openid;
        $nickname = $request->nickname;
        $avatar = $request->headimage;

        $user = Chevy::firstOrCreate(
            ['openid' => $openid], [
            'nickname' => $nickname,
            'avatar' => $avatar,
            'score' => 0,
            'top' => 0,
        ]);
        $js = \EasyWeChat::officialAccount();
        return view('chevy.index', compact('user', 'js'));
    }

    /*
     * h5 排行榜
     */
    public function rank(Request $request)
    {
        $rank = Chevy::where('top', '>', 0)->orderBy('top', 'desc')->limit(100)->get();
        if ($request->openid) {
            $user = Chevy::where('openid', $request->openid)->first();
            $user->rank = Chevy::where('top', '>', $user->score)->count();
            $user->rank += 1;
            return view('chevy.rank', compact('rank', 'user'));

        }
        return view('chevy.rank', compact('rank'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * 扫码验证vip
     */
    public function scan()
    {
        $js = \EasyWeChat::officialAccount();
        return view('chevy.scan', compact('js'));
    }

    public function api(Request $request)
    {
        $score = $request->score;
        $user = Chevy::where('openid', $request->openid)->first();
        if (is_null($user)) return 'false';

        //录入今日分数
        $today = Carbon::today();
        if ($user->updated_at > $today) {
            $user->score = $score;
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
