<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class FaceController extends Controller
{
    public function upload(Request $request)
    {
        $image = $request->input('photo');
        $model = $request->input('model');

        return  $image;
        $app_id = env('face_app_id');
        $time_stamp = time();
        $nonce_str = rand(1, 100000);
        $app_key = env('face_app_key');
        $image = str_replace('data:image/jpeg;base64,', '' , $image);
        $str = 'app_id='.urlencode($app_id) . '&image=' . urlencode($image)
            . '&model=' .urlencode($model) . '&nonce_str=' . urlencode($nonce_str)
            . '&time_stamp=' . urlencode($time_stamp) . '&app_key=' . urlencode($app_key);
        $sign = strtoupper(md5($str));
        $client = new Client([
            'timeout' => 6.0,
        ]);
        $body = 'app_id='.urlencode($app_id)
            . '&model=' .urlencode($model) . '&nonce_str=' . urlencode($nonce_str)
            . '&time_stamp=' . urlencode($time_stamp) . '&sign=' . $sign . '&image=' . urlencode($image);
        $res = $client->request('post', 'https://api.ai.qq.com/fcgi-bin/ptu/ptu_facemerge', [
            'form_params' => [
                'app_id' => $app_id,
                'model' => $model,
                'nonce_str' => $nonce_str,
                'time_stamp' => $time_stamp,
                'sign' => $sign,
                'image' => $image
            ],
        ]);
        return $res->getBody();
    }
}
