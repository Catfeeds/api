<?php

namespace App\Http\Controllers\Tmail;

use App\Models\Tmail;
use App\Models\Tmaillog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class ApiController extends Controller
{
    public function subCoin(Request $request)
    {
        $type = $request->type;
        $coin = $request->coin;
        $uid = $request->uid;

        $user = Tmail::find($uid);
        if (is_null($user)) {
            return '查询不到该用户！';
        }
        if ($user->{$type} < $coin) {
            return "该用户积分为{$user->{$type}},少于{$coin}, 不能兑换";
        }
        $user->{$type} -= $coin;
        $user->save();

        $log = new Tmaillog();
        $log->uid = $user->id;
        $log->nickname = $user->nickname;
        $log->reward = $type;
        $log->coin = $coin;
        $log->save();

        return '兑换成功！';
    }

    /**
     * @param Request $request
     * @return string
     *
     * 抽奖增加积分
     */
    public function addCoin(Request $request)
    {
        $type = $request->type;
        $coin = $request->coin;
        $uid = $request->uid;

        $user = Tmail::find($uid);
        $user->{$type} += $coin;
        $user->save();
        return 'true';
    }

    public function statistic(Request $request)
    {
        $type = $request->type;
        Redis::incr('tmail_' . $type);
        return 'true';
    }
}
