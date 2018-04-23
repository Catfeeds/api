<?php

namespace App\Http\Controllers\Friso;

use Carbon\Carbon;
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
            return redirect('http://frisowechat.rfc-china.com/frontPage/Reg.aspx?regsourceid=180&retUrl=https%3a%2f%2fapi.shanghaichujie.com%2ffriso%2freward%3Fopenid=oSG6Njto383u5YW9KCm0DyT0uCzs
');
        }
        $baby = $data->CustomerBaby;
        $birthday = new Carbon($baby[0]->BabyBirthday);

        $now = Carbon::now();
        $d1 = $now->copy()->subDay(1095);
        $d2 = $now->copy()->subDay(365);

        //查询是否可以申领
        $res = $client->request('POST', 'api/common/GiftApply/VerifyGiftApplication', [
            'headers' => [
                'authorization' => 'bearer ' . $code,
            ],
            'json' => [
                'Campaigncode' => 'LY_Trial',
                'CampaignBrand' => 'CampaignBrand',
                'Giftcode' => 'LY-trialF3',
                'GiftQty' => 1,
                'OpenId' => $openid
            ],
        ]);
        switch (json_decode((string)$res->getBody())->data) {
            case 0:
                //可以申领
                if ($birthday->between($d1, $d2)) {
                    return view('friso.reward', compact('openid'));
                }
                $warning = '请到现场工作人员处领取';
                return view('friso.warning', compact('warning'));                break;
            case 1:
                //已经申领
                $warning = '您已经领取过该礼品';
                return view('friso.warning', compact('warning'));
                break;
            case 2:
                //库存不足
                $warning = '礼品库存不足，请联系工作人员';
                return view('friso.warning', compact('warning'));
                break;
            case 3:
                //不符合条件
                $warning = '请到现场工作人员处领取';
                return view('friso.warning', compact('warning'));
                break;
            case 5:
                //非会员
                $warning = '请先注册会员';
//                return redirect('http://frisowechat.rfc-china.com/frontPage/Reg.aspx?regsourceid=180&retUrl=https%3a%2f%2fapi.shanghaichujie.com%2ffriso%2freward%3Fopenid=oSG6Njto383u5YW9KCm0DyT0uCzs');
                return view('friso.warning', compact('warning'));
                break;
            default:
                $warning = '出现错误，请联系工作人员解决';
                return view('friso.warning', compact('warning'));
        }
    }
}
