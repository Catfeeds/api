<?php

namespace App\Http\Controllers\Aia;

use App\Models\Aia;
use App\Models\AiaScore;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat;

class AiaController extends Controller
{
    public function index()
    {
        $wechatInfo = session('wechat.oauth_user');
        $js = EasyWeChat::js();
        $userInfo = Aia::firstOrCreate([
            'openid' => $wechatInfo['id']
        ], [
            'totalScore' => 0
        ]);
        return view('aia.index', compact('js', 'wechatInfo', 'userInfo'));
    }

    public function fail(Request $request)
    {
        $wechatInfo = session('wechat.oauth_user');
        $time = $request->time;
        $score = $request->score;
        $scene = $request->scene;//失败关卡，1，2，3，4，5
        //更新用户总分，总游玩时间
        $userInfo = Aia::where('openid', $wechatInfo['id'])->first();
        $userInfo->totalTime += $time;
        $userInfo->totalScore += $score;
        $userInfo->save();

        //记录用户游戏日志，用于排行，最高分
        AiaScore::create([
            'openid' => $wechatInfo['id'],
            'score' => $score
        ]);

        return view('aia.custom', compact('scene', 'userInfo', 'time', 'score', 'wechatInfo'));
    }

    public function result(Request $request)
    {
        $wechatInfo = session('wechat.oauth_user');
        $openid = $request->openid;
        $time = $request->time;
        $score = $request->score;

        //更新用户总分，总游玩时间
        $userInfo = Aia::where('openid', $wechatInfo['id'])->first();
        $userInfo->totalTime += $time;
        $userInfo->totalScore += $score;
        $userInfo->save();

        //记录用户游戏日志，用于排行，最高分
        AiaScore::create([
            'openid' => $wechatInfo['id'],
            'score' => $score
        ]);

        //查询该用户最高分
        $topScore = AiaScore::where('openid', $openid)
            ->max('score');

        //今天剩余挑战次数
        $userCount = AiaScore::where('openid', $wechatInfo['id'])
            ->where('created_at', '>', Carbon::today())
            ->count();

        //战绩排行
        $countAll = AiaScore::count();
        $count = AiaScore::where('score', '<=', $score)
            ->count();
        $rank = floor($count / $countAll * 100);
        return view('aia.record', compact('userInfo', 'userCount', 'topScore', 'score', 'rank'));
    }

    public function phone(Request $request)
    {
        $phone = $request->input('ipu');
        dd($phone);
        $wechatInfo = session('wechat.oauth_user');
        $userInfo = Aia::where('openid', $wechatInfo['id'])->first();
        $userInfo->phone += $phone;
        $userInfo->save();
        return back()->with('status', 'true');
    }

    public function test(Request $request)
    {
        return $request->openid . '&' . $request->score;
    }


}
