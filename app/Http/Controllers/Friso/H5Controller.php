<?php

namespace App\Http\Controllers\Friso;

use App\Models\Friso;
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
            'timeout' => 8.0,
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

        return view('friso.h5', compact('openid', 'locs'));
    }

    public function draw(Request $request)
    {
        $openid = $request->openid;
        $location = $request->location;

        $client = new Client([
            'base_uri' => 'https://gw.rfc-china.com/',
            'timeout' => 8.0,
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

        //判断是否已经发放过，已发放过显示发放信息
        $user = Friso::firstOrNew([
            'openid' => $openid
        ]);
        if (is_null($user->reward)) {
            $loc = FrisoLoc::where('location', $location)->first();
            $sum = $loc->type1 + $loc->type2 + $loc->type3 + $loc->type4 + $loc->type5;
            $type = 'type0';
            //根据库存数量抽奖
            if ($sum > 0) {
                $r = mt_rand(1, $sum);
                if ($r <= $loc->type1) {
                    $type = 'type1';
                } elseif ($r <= $loc->type1 + $loc->type2) {
                    $type = 'type2';
                } elseif ($r <= $loc->type1 + $loc->type2 + $loc->type3) {
                    $type = 'type3';
                } elseif ($r <= $loc->type1 + $loc->type2 + $loc->type3 + $loc->type4) {
                    $type = 'type4';
                } else {
                    $type = 'type5';
                }
                //录入信息
                $user->location = $location;
                $user->reward = $type;
                $user->nickname =$data->Name;
                $user->phone = $data->Mobile;
                $user->save();
                //减少库存
                $loc->{$type} -=1;
                $loc->save();
            }
        }else {
            $type = $user->reward;
        }

        return view('friso.draw', compact('openid', 'location', 'type', 'user'));

    }

}
