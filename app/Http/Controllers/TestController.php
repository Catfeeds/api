<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Mockery\Exception;

class TestController extends Controller
{
    public function test()
    {
        $messageStruct = '12312415';
        $messageId = rand(1, 100000);
        $postIp = '106.14.154.36';
        $accountType = 1;
        $uid = '1252946101';
        $appId = '1252946101';

        $SecretKey = 'JWXP9jsz8JaxFLFx46xpX3QbaR8dw2we';
        $method = 'GET';
        $url = 'csec.api.qcloud.com/v2/index.php';
        $Action = 'UgcAntiSpam';
        $Nonce = '23123';
        $Region = 'ap-shanghai-2';
        $SecretId = 'AKIDHjCXhfY3ShkcImzA3kFalmcIm4C8AlY9';
        $Timestamp = time();

        $bytes = $method . $url . '?Action=' . $Action . '&Nonce=' . $Nonce . '&Region=' . $Region . '&SecretId=' . $SecretId . '&Timestamp=' . $Timestamp;
        $Signature = base64_encode(hash_hmac('sha1', $bytes, $SecretKey, true));
        $Signature = urlencode($Signature);

        $client = new Client([
            'timeout' => 2.0,
        ]);
        $urlStr = 'Action=' . $Action . '&Nonce=' . $Nonce . '&Region=' . $Region . '&SecretId=' . $SecretId . '' . '&Timestamp='
            . $Timestamp . '&Signature' . $Signature . '&messageStruct='
            . $messageStruct . '&messageId=' . $messageId . '&postIp=' . $postIp . '&accountType=' . $accountType . '&uid=' . $uid . '&appId=' . $appId;
//        dd('https://csec.api.qcloud.com/v2/index.php?'. $urlStr);
        $res = $client->request('GET', 'https://csec.api.qcloud.com/v2/index.php?' . $urlStr, [
        ]);
        return $res->getBody();
    }
}
