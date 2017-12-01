<?php

namespace App\Http\Controllers\Longines;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class IndexController extends Controller
{
    public function sjz()
    {
        $location = "sjz";
        $status = Redis::get('sjz_status');
        if (is_null($status)) {
            Redis::setex('sjz_status', 15, 'true');
            return view('longines.index', compact('location'));
        }
        return '有其他用户正在游戏中～请等待15秒后重试';
    }

    public function bd()
    {
        $location = "bd";
        $status = Redis::get('bd_status');
        if (is_null($status)) {
            Redis::setex('bd_status', 15, 'true');
            return view('longines.index', compact('location'));
        }
        return '有其他用户正在游戏中～请等待15秒后重试';
    }

    public function hhht()
    {
        $location = "hhht";
        $status = Redis::get('hhht_status');
        if (is_null($status)) {
            Redis::setex('hhht_status', 15, 'true');
            return view('longines.index', compact('location'));
        }
        return '有其他用户正在游戏中～请等待15秒后重试';
    }

    public function bjlx()
    {
        $location = "bjlx";
        $status = Redis::get('bjlx_status');
        if (is_null($status)) {
            Redis::setex('bjlx_status', 15, 'true');
            return view('longines.index', compact('location'));
        }
        return '有其他用户正在游戏中～请等待15秒后重试';
    }

    public function bjsl()
    {
        $location = "bjsl";
        $status = Redis::get('bjsl_status');
        if (is_null($status)) {
            Redis::setex('bjsl_status', 15, 'true');
            return view('longines.index', compact('location'));
        }
        return '有其他用户正在游戏中～请等待15秒后重试';
    }

    public function bfxsj()
    {
        $location = "bfxsj";
        $status = Redis::get('bfxsj_status');
        if (is_null($status)) {
            Redis::setex('bfxsj_status', 15, 'true');
            return view('longines.index', compact('location'));
        }
        return '有其他用户正在游戏中～请等待15秒后重试';
    }

    public function hzjl()
    {
        $location = "hzjl";
        $status = Redis::get('hzjl_status');
        if (is_null($status)) {
            Redis::setex('hzjl_status', 15, 'true');
            return view('longines.index', compact('location'));
        }
        return '有其他用户正在游戏中～请等待15秒后重试';
    }

    public function hzyt()
    {
        $location = "hzyt";
        $status = Redis::get('hzyt_status');
        if (is_null($status)) {
            Redis::setex('hzyt_status', 15, 'true');
            return view('longines.index', compact('location'));
        }
        return '有其他用户正在游戏中～请等待15秒后重试';
    }

}
