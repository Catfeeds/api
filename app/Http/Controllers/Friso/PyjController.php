<?php

namespace App\Http\Controllers\Friso;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use GuzzleHttp\Client;

class PyjController extends Controller
{
    public function index(Request $request)
    {
        $path = $request->path;
        return view('friso.pyj', compact('path'));
    }

    public function reward(Request $request)
    {
        $openid = $request->openid;
        $client = new Client([
            'base_uri' => 'https://gw.rfc-china.com/',
            'timeout' => 5.0,
        ]);
        $res = $client->request('GET', 'api/sso/access_token?appid=demo.TangJi&appsecret=demo.TangJi');
        $body = $res->getBody();
        $code = json_decode((string)$body)->data;
        $res = $client->request('GET', 'api/customer/customer/getcustomer?openid=' . $openid, [
            'headers' => [
                'authorization' => 'bearer ' . $code,
            ]
        ]);
        $body = $res->getBody();
        $data = json_decode((string)$body)->data;

        if (is_null($data)) {
            return redirect('http://frisowechat.rfc-china.com/frontPage/Reg.aspx?regsourceid=180&retUrl=https%3a%2f%2fapi.shanghaichujie.com%2ffriso%2freward%3Fopenid=oSG6Njto383u5YW9KCm0DyT0uCzs
');
        }
        return view('friso.reward', compact('openid'));
    }
}
