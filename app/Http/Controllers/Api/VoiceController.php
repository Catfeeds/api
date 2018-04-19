<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use GuzzleHttp\Client;

class VoiceController extends Controller
{
    public function voice(Request $request)
    {
        $token = $this->token();
        $text = urlencode($request->text);
        return 'https://tsn.baidu.com/text2audio?tex='.$text.'&lan=zh&cuid=xxx&ctp=1&per=2&tok='.$token;
    }

    public function token()
    {
        if (Redis::EXISTS('baiduVoice')) {
            return Redis::GET('baiduVoice');
        }
        $client = new Client([
            'timeout' => 3.0,
        ]);
        $res = $client->get('https://openapi.baidu.com/oauth/2.0/token?grant_type=client_credentials&client_id='. config("baidu.ApiKey") .'&client_secret='.config('baidu.ApiSecret'));
        $res = json_decode($res->getBody());
        Redis::setex('baiduVoice', $res->expires_in, $res->access_token);
        return $res->access_token;
    }
}
