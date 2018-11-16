<?php

namespace App\Http\Controllers\Marykay;

use App\Models\Marykay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarykayController extends Controller
{
    public function index()
    {
        return '活动尚未开始';
    }

    public function draw(Request $request)
    {
        $type = $request->input('type');
        //一二三四等奖
        $users = Marykay::where('reward', $type)->get();

        if ($users->isEmpty()) {

            //根据奖项抽取不同人数
            $type == 1 ? $count = 5 : (
            $type == 2 ? $count = 10 : (
            $type == 3 ? $count = 50 : (
            $type == 4 ? $count = 100 : $count = 0)));
            if ($count != 0) {
                $users = Marykay::where('reward', 0)->get()->random($count);
                foreach ($users as $user) {
                    $user->reward = $type;
                    $user->save();
                }
            }
        }


        return response()->json([
            'data' => $users
        ]);
    }

    public function special()
    {
        $lucky = Marykay::where('special', 1)->first();

        if (!$lucky) {
            //根据投票结果，从投票最多的组中随机抽取一个人
            $result = Marykay::selectRaw('`show`, count(*) as count')
                ->where('show', '!=', null)
                ->groupBy('show')
                ->orderByDesc('count')
                ->first();

            $lucky = Marykay::where('show', $result->show)->get()->random();

            $lucky->special = 1;
            $lucky->save();
        }

        return response()->json([
            'data' => [$lucky]
        ]);
    }

    public function reset()
    {
        Marykay::where('special', '!=', 0)
            ->orWhere('reward', '!=', 0)
            ->update([
                'special' => 0,
                'reward' => 0
            ]);


        return '重置成功';
    }
}
