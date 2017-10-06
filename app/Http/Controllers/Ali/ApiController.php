<?php

namespace App\Http\Controllers\Ali;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Models\Ali;
use App\Events\AliPhoto;

class ApiController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     * 阿里公益小主机访问公益统计数据接口
     */
    public function total()
    {
        $timestamp = strftime('%Y-%m-%dT%H:%M:%S.000+08:00');
        $nonce = sprintf('%d000%d', time(), rand(1000, 9999));
        $method = 'POST';
        $params = '';
        $url = '/commonweal/thisFiscalYearStat';
//        $url = '/commonweal/overThreeTimes';

        $bytes = sprintf("%s\n%s\n%s\n%s\n%s", $method, $timestamp, $nonce, $url, $params);
        $hash = hash_hmac('sha256', $bytes, env('apiSecret'), true);
        $signature = base64_encode($hash);

        $client = new Client(['base_uri' => env('apiServer')]);
        try {
            $res = $client->request('POST', $url, [
                'headers' => [
                    'X-Hmac-Auth-Timestamp' => $timestamp,
                    'X-Hmac-Auth-IP' => env('X-Hmac-Auth-IP'),
                    'X-Hmac-Auth-MAC' => env('X-Hmac-Auth-MAC'),
                    'X-Hmac-Auth-Version' => env('X-Hmac-Auth-Version'),
                    'X-Hmac-Auth-Nonce' => $nonce,
                    'apiKey' => env('apiKey'),
                    'X-Hmac-Auth-Signature' => $signature,
                    'x-fulltrace-pressure' => 'Y'
                ],
            ]);
            $res = json_decode($res->getBody());
            return response()->json([
                'totalCount' => $res->content->totalCount,
                'totalFullCount' => $res->content->totalFullCount,
                'totalTimes' => $res->content->totalTimes
            ]);
        } catch (RequestException $e) {
            return response()->json([
                'code' => 'false'
            ]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 阿里公益小主机根据id访问用户公益数据接口，
     */
    public function user(Request $request)
    {
        if ($request->id == '0000') {
            return response()->json([
                'code' => 'true',
                'hours' => '10.5',
                'name' => 'test'
            ]);
        }
        $timestamp = strftime('%Y-%m-%dT%H:%M:%S.000+08:00');
        $nonce = sprintf('%d000%d', time(), rand(1000, 9999));
        $method = 'POST';
        $params = 'empId=' . $request->id;
//        $url = '/commonweal/thisFiscalYearStat';
        $url = '/commonweal/overThreeTimes';

        $bytes = sprintf("%s\n%s\n%s\n%s\n%s", $method, $timestamp, $nonce, $url, $params);
        $hash = hash_hmac('sha256', $bytes, env('apiSecret'), true);
        $signature = base64_encode($hash);

        $client = new Client(['base_uri' => env('apiServer')]);
        try {
            $res = $client->request('POST', $url, [
                'headers' => [
                    'X-Hmac-Auth-Timestamp' => $timestamp,
                    'X-Hmac-Auth-IP' => env('X-Hmac-Auth-IP'),
                    'X-Hmac-Auth-MAC' => env('X-Hmac-Auth-MAC'),
                    'X-Hmac-Auth-Version' => env('X-Hmac-Auth-Version'),
                    'X-Hmac-Auth-Nonce' => $nonce,
                    'apiKey' => env('apiKey'),
                    'X-Hmac-Auth-Signature' => $signature,
                    'x-fulltrace-pressure' => 'Y'
                ],
                'form_params' => [
                    'empId' => $request->id
                ]
            ]);
            $res = json_decode($res->getBody());
            if ($res->content->full) {
                return response()->json([
                    'code' => 'true',
                    'name' => $res->content->name,
                    'hours' => $res->content->thisFiscalYearHours
                ]);
            } else {
                return response()->json([
                    'code' => 'false',
                    'hours' => '0',
                    'name' => ''
                ]);
            }

        } catch (RequestException $e) {
            return response()->json([
                'code' => 'false',
                'hours' => '0',
                'name' => ''
            ]);
        }

    }

    /**
     * @return string
     * 阿里公益大屏改变轮播
     */
    public function event()
    {
        $alis = Ali::select('uid')
            ->inRandomOrder()
            ->limit(10)
            ->get()->all();
        event(new AliPhoto($alis));
        return 'true';
    }
}
