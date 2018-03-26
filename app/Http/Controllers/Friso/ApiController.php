<?php

namespace App\Http\Controllers\Friso;

use App\Models\Friso;
use App\Models\FrisoLoc;
use App\Models\FrisoLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    /**
     * @param Request $request
     * @return string
     *
     * 派样机确定是否可以领取奖品
     */
    public function gift(Request $request)
    {
        $openid = $request->openid;
        $client = new Client([
            'base_uri' => 'https://gw.rfc-china.com/',
            'timeout'  => 5.0,
        ]);
        $res = $client->request('GET', 'api/sso/access_token?appid=demo.TangJi&appsecret=demo.TangJi');
        $body = $res->getBody();
        $code = json_decode((string)$body)->data;
        $res = $client->request('GET', 'api/customer/customer/getcustomer?openid='.$openid, [
            'headers' => [
                'authorization' => 'bearer '.$code,
            ]
        ]);
        $body = $res->getBody();
        $code = json_decode((string)$body)->data;

        if (is_null($code)) {
            return $res->getBody();
        }
        return 'true';
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * 游戏启动获取验证码
     */
    public function verify(Request $request)
    {
        $loc = $request->location;
        $category = $request->category;
        $location = FrisoLoc::where('location', $loc)
            ->where('category', $category)
            ->first();
        return response()->json([
            'verify' => $location->verify,
        ]);
    }

    public function user(Request $request)
    {
        $loc = $request->location;
        $category = $request->category;

        //返回队列用户信息
        $arr = $this->queue($loc, $category);

        //广播user准备

        return response()->json($arr);
    }

    public function ready(Request $request)
    {
        $loc = $request->location;
        $category = $request->category;
        $openid = $request->openid;

        //广播游戏开始

        return 'true';
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * 游戏超时处理
     */
    public function overtime(Request $request)
    {
        $loc = $request->location;
        $category = $request->category;
        $openid = $request->openid;

        //返回队列用户信息
        $arr = $this->queue($loc, $category);

        //广播user超时
        //广播游戏准备

        return response()->json($arr);
    }

    public function result(Request $request)
    {
        $loc = $request->location;
        $category = $request->category;
        $openid = $request->openid;
        $result = $request->result;

        $user = Friso::where('openid', $openid)->first();
        //录入游戏日志
        $log = new FrisoLog();
        $log->location = $loc;
        $log->award = $result;
        $log->category = $category;
        $log->friso_id = $user->id;
        $log->save();

        //返回队列用户信息
        $arr = $this->queue($loc, $category);

        //广播游戏准备
        //广播游戏结果

        return response()->json($arr);
    }

    /**
     * @param $loc
     * @param $category
     * @return array
     *
     * 获取队列信息
     */
    public function queue($loc, $category)
    {
        //获取场次信息
        $location = FrisoLoc::where('location', $loc)
            ->where('category', $category)
            ->first();
        //根据场次信息拿到队列信息
        $queueId = Redis::get($location->id . '_queueId');
        $openid = Redis::lindex($location->id . '_queue', $queueId);

        //判断队列有没有用户
        if (is_null($openid)) {
            return [
                'code' => false,
                'openid' => $openid,
                'queueId' => $queueId
            ];
        }

        Redis::incr($location->id . '_queueId');

        return [
            'code' => true,
            'openid' => $openid,
            'queueId' => $queueId
        ];
    }
}
