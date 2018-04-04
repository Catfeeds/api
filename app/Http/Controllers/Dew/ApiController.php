<?php

namespace App\Http\Controllers\Dew;

use App\Models\Dew;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    /**
     * @param Request $request
     * @return string
     *
     * 纯悦上传用户信息
     */
    public function user(Request $request)
    {
        $this->validate($request, [
            'openid' => 'required',
            'username' => 'required',
            'connect' => 'required',
        ]);
        $dew = new Dew();
        $dew->openid = $request->openid;
        $dew->username = $request->username;
        $dew->connect = $request->connect;
        $dew->save();

        return 'true';
    }

    /**
     * @param Request $request
     * @return string
     *
     * 纯悦上传分数信息
     */
    public function score(Request $request)
    {
        $this->validate($request, [
            'openid' => 'required',
            'score' => 'required',
        ]);
        Redis::incr('dew_num');//统计游戏次数
        try {
            $dew = Dew::where('openid', $request->openid)->first();
            if ($dew->score < $request->score) {
                $dew->score = $request->score;
                $dew->save();
            }
            return 'true';
        }catch (\Exception $e) {
            return 'false';
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * 返回排行榜信息
     */
    public function rank()
    {
        $dew = Dew::select(['username', 'score'])
            ->orderByDesc('score')
            ->limit(100)->get();
        if (empty($dew)) {
            return response()->json([]);
        }
        Redis::incr('dew_share');//统计分享次数
        return response()->json($dew->all());
    }

    /**
     * @param Request $request
     * @return string
     *
     * 2018纯悦展厅项目互动上传照片
     */
    public function dew(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
        ]);
        $path = Storage::disk('public_path')->putFile('dew', $request->file('image'));

        return env('APP_URL') . '/upload/' . $path;
    }
}
