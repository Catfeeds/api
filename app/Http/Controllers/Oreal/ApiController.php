<?php

namespace App\Http\Controllers\Oreal;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function getReqSign($params)
    {

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
        $str .= 'app_key=' . env('tencent-AI-AppKey');

        // 4. MD5运算+转换大写，得到请求签名
        $sign = strtoupper(md5($str));
        return $sign;
    }
    

    public function faceCosmetic(Request $request)
    {
        $image = $request->input('photo');

        $image = str_replace('data:image/jpeg;base64,', '' , $image);
        $image = str_replace('data:image/png;base64,', '' , $image);
        $image = str_replace('data:image/jpg;base64,', '' , $image);

        $params = array(
            'app_id'     => env('tencent-AI-AppId'),
            'image'      => $image,
            'cosmetic'   => '1',
            'time_stamp' => strval(time()),
            'nonce_str'  => strval(rand()),
            'sign'       => '',
        );
        $params['sign'] = $this->getReqSign($params);
        $client = new Client([
            'timeout' =>2.0,
        ]);
        $response = $client->request('POST', 'https://api.ai.qq.com/fcgi-bin/ptu/ptu_facecosmetic', [
            'form_params' => $params
        ]);
        $body = $response->getBody();

        return (string)$body;
    }


}
