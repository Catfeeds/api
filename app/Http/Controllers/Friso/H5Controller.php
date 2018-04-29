<?php

namespace App\Http\Controllers\Friso;

use App\Models\FrisoLoc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class H5Controller extends Controller
{
    public function index(Request $request)
    {
        $openid = $request->openid;
        $client = new Client([
            'base_uri' => 'https://gw.rfc-china.com/',
            'timeout' => 5.0,
        ]);

        //获取access—token
        $res = $client->request('GET', 'api/sso/access_token?appid=demo.TangJi&appsecret=demo.TangJi');
        $body = $res->getBody();
        $code = json_decode((string)$body)->data;

        //查询会员接口
        $res = $client->request('GET', 'api/customer/customer/getcustomer?openid=' . $openid, [
            'headers' => [
                'authorization' => 'bearer ' . $code,
            ]
        ]);
        $body = $res->getBody();
        $data = json_decode((string)$body)->data;
        if (is_null($data)) {
            return redirect('http://frisowechat.rfc-china.com/frontPage/Reg.aspx?regsourceid=180&retUrl=https%3a%2f%2fapi.shanghaichujie.com%2ffriso%2fh5%2findex%3Fopenid=' . $openid);
        }
        $locs = FrisoLoc::where('start', '<=', Carbon::now())
            ->where('end', '>=', Carbon::now())
            ->get();

        return view('friso.h5', compact('openid', 'locs', 'item'));
    }
}
