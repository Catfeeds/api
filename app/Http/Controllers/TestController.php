<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Mockery\Exception;

class TestController extends Controller
{
    public function test(Request $request)
    {


    }

    public function getReqSign(&$params)
    {
        // 0. 补全基本参数
        $params['app_id'] = Configer::getAppId();

        if (!$params['nonce_str'])
        {
            $params['nonce_str'] = uniqid("{$params['app_id']}_");
        }

        if (!$params['time_stamp'])
        {
            $params['time_stamp'] = time();
        }

        // 1. 字典升序排序
        ksort($params);

        // 2. 拼按URL键值对
        $str = '';
        foreach ($params as $key => $value)
        {
            if ($value !== '')
            {
                $str .= $key . '=' . urlencode($value) . '&';
            }
        }

        // 3. 拼接app_key
        $str .= 'app_key=' . Configer::getAppKey();

        // 4. MD5运算+转换大写，得到请求签名
        $sign = strtoupper(md5($str));
        return $sign;
    }
}
