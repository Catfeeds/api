<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TencentAIController extends Controller
{
    /*
     * 获取签名
     */
    public function getReqSign($params)
    {

        // 1. 字典升序排序
        ksort($params);

        // 2. 拼按URL键值对
        $str = '';
        foreach ($params as $key => $value) {
            if ($value !== '') {
                $str .= $key . '=' . urlencode($value) . '&';
            }
        }

        // 3. 拼接app_key
        $str .= 'app_key=' . env('tencent-AI-AppKey');

        // 4. MD5运算+转换大写，得到请求签名
        $sign = strtoupper(md5($str));
        return $sign;
    }

    /**
     * @param Request $request
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * 人脸美妆
     */
    public function faceCosmetic(Request $request)
    {
        $image = $request->input('photo');
        $id = $request->input('id');
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace('data:image/jpg;base64,', '', $image);

        $params = array(
            'app_id' => env('tencent-AI-AppId'),
            'image' => $image,
            'cosmetic' => $id,
            'time_stamp' => strval(time()),
            'nonce_str' => strval(rand()),
            'sign' => '',
        );
        $params['sign'] = $this->getReqSign($params);
        $client = new Client([
            'timeout' => 5.0,
        ]);
        $response = $client->request('POST', 'https://api.ai.qq.com/fcgi-bin/ptu/ptu_facecosmetic', [
            'form_params' => $params
        ]);
        $body = $response->getBody();

        return response()->json((string)$body);
    }

    public function imgFilter(Request $request)
    {
        $type = $request->input('type');//上传类型，天天p图/AIlab
        $image = $request->input('photo');
        $id = $request->input('id');
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace('data:image/jpg;base64,', '', $image);

        if ($type == 'ptu') {
            $params = array(
                'app_id' => env('tencent-AI-AppId'),
                'image' => $image,
                'filter' => $id,
                'time_stamp' => strval(time()),
                'nonce_str' => strval(rand()),
                'sign' => '',
            );

            $url = 'https://api.ai.qq.com/fcgi-bin/ptu/ptu_imgfilter';
        } elseif ($type == 'AILab') {
            $params = array(
                'app_id' => env('tencent-AI-AppId'),
                'image' => $image,
                'filter' => $id,
                'session_id' => uniqid(),
                'time_stamp' => strval(time()),
                'nonce_str' => strval(rand()),
                'sign' => '',
            );

            $url = 'https://api.ai.qq.com/fcgi-bin/vision/vision_imgfilter';
        } else {
            return response()->json([
                'ret' => 110,
                'msg' => '类型错误',
                'data' => [
                    'image' => ''
                ]
            ]);
        }

        $params['sign'] = $this->getReqSign($params);
        $client = new Client([
            'timeout' => 5.0,
        ]);
        $response = $client->request('POST', $url, [
            'form_params' => $params
        ]);
        $body = $response->getBody();

        return response()->json((string)$body);
    }
}
