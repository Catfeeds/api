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

        //判断用户次数
        //今天挑战次数
        $userCount = AiaScore::where('openid', $wechatInfo['id'])
            ->where('created_at', '>', Carbon::today())
            ->count();
        if (!is_null($userInfo->share) && $userInfo->share >= Carbon::today()) {
            $userCount -= 1;
        }
        return view('aia.index', compact('js', 'wechatInfo', 'userInfo', 'userCount'));
    }

    public function fail(Request $request)
    {
        $wechatInfo = session('wechat.oauth_user');
        $time = $request->time;
        $score = $request->score;
        $scene = $request->scene;//失败关卡，1，2，3，4，5
        //更新用户总分，总游玩时间
        $userInfo = Aia::where('openid', $wechatInfo['id'])->first();
//        $userInfo->totalTime += $time;
//        $userInfo->totalScore += $score;
//        $userInfo->save();

        //记录用户游戏日志，用于排行，最高分
//        AiaScore::create([
//            'openid' => $wechatInfo['id'],
//            'score' => $score
//        ]);

        $js = EasyWeChat::js();

        return view('aia.custom', compact('scene', 'userInfo', 'time', 'score', 'wechatInfo', 'js'));
    }

    public function result(Request $request)
    {
        $wechatInfo = session('wechat.oauth_user');
        $openid = $request->openid;
        $time = $request->time;
        $score = $request->score;

        //查询用户信息
        $userInfo = Aia::where('openid', $wechatInfo['id'])->first();

        //今天挑战次数
        $userCount = AiaScore::where('openid', $wechatInfo['id'])
            ->where('created_at', '>', Carbon::today())
            ->count();
        if (!is_null($userInfo->share) && $userInfo->share >= Carbon::today()) {
            $userCount -= 1;
        }

        //战绩排行
        $countAll = Aia::count();
        $count = Aia::where('topScore', '<=', $userInfo->topScore)
            ->count();
        $rank = floor($count / $countAll * 100);
        $js = EasyWeChat::js();


        return view('aia.record', compact('userInfo', 'userCount', 'score', 'rank', 'js'));
    }

    public function phone(Request $request)
    {
        $phone = $request->input('ipu');
        $wechatInfo = session('wechat.oauth_user');
        $userInfo = Aia::where('openid', $wechatInfo['id'])->first();
        $userInfo->phone = $phone;
        $userInfo->save();
        return back()->with('status', 'true');
    }

    public function resultApi(Request $request)
    {
        $openid = $request->openid;
        $time = $request->time;
        $score = $request->score;

        //更新用户总分，总游玩时间
        $userInfo = Aia::where('openid', $openid)->first();
        $userInfo->totalTime += $time;
        $userInfo->totalScore += $score;
        if ($userInfo->topScore < $score) {
            $userInfo->topScore = $score;
        }
        $userInfo->save();

        //记录用户游戏日志，用于排行，最高分
        AiaScore::create([
            'openid' => $openid,
            'score' => $score
        ]);

        return 'true';
    }

    public function share(Request $request)
    {
        $openid = $request->openid;
        $userInfo = Aia::where('openid', $openid)->first();
        $userInfo->share = Carbon::now();
        $userInfo->save();
        return 'true';
    }

}
