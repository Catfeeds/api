<?php

namespace App\Http\Controllers\Oreal;

use App\Models\OrealGame;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    public function rank()
    {
        $users = OrealGame::select(['username', 'score', 'cost'])
            ->where('score', '>', 0)
            ->where('cost', '>', 0)
            ->orderByDesc('score')
            ->orderBy('cost')
            ->take(10)
            ->get();

        return response()->json([
            'data' => $users
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * 检查用户是否注册
     */
    public function check(Request $request)
    {
        $openid = $request->input('openid');

        $user = OrealGame::where('openid', $openid)->first();

        return response()->json([
            'status' => is_null($user) ? false : true,
            'data' => $user
        ]);
    }

    /**
     * @param Request $request
     * @return string
     *
     * 上传成绩
     */
    public function game(Request $request)
    {
        $openid = $request->input('openid');
        $cost = $request->input('cost');
        $score = $request->input('score');
        $type = $request->input('type');

        $user = OrealGame::where('openid', $openid)->first();
        $user->{$type} = 1;
        $user->score += $score;
        $user->cost += (double)$cost;
        $user->save();

        return response()->json([
            'data' => $user
        ]);
    }

    public function register(Request $request)
    {
        $openid = $request->input('openid');
        $username = $request->input('username');
        $phone = $request->input('phone');

        $user = new OrealGame();
        $user->username = $username;
        $user->phone = $phone;
        $user->openid = $openid;
        $user->save();

        return response()->json([
            'data' => $user
        ]);
    }

    public function exchange(Request $request)
    {
        $openid = $request->input('openid');

        $user = OrealGame::where('openid', $openid)->first();
        if ($user) {
            if (!is_null($user->exchange)) {
                return response()->json([
                    'res' => '兑换失败！您已经兑换过了' . $user->exchange,
                ]);
            }
            $user->exchange = 'test';
            $user->save();

            return response()->json([
                'res' => '兑换成功！获得礼品' . $user->exchange,
            ]);
        }
        return response()->json([
            'res' => '兑换失败！二维码错误'
        ]);

    }
}
