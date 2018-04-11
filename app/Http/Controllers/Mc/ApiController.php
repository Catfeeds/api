<?php

namespace App\Http\Controllers\Mc;

use App\Models\Mc;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Overtrue\EasySms;
use Validator;

class ApiController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 发送短信
     */
    public function sms(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required|numeric',
            'openid' => 'required'
        ]);
        $config = [
            // HTTP 请求的超时时间（秒）
            'timeout' => 5.0,

            // 默认发送配置
            'default' => [
                // 网关调用策略，默认：顺序调用
//                'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,

                // 默认可用的发送网关
                'gateways' => [
                    'yunpian',
                ],
            ],
            // 可用的网关配置
            'gateways' => [
                'yunpian' => [
                    'api_key' => env('yunpian_key')
                ]
            ],
        ];
        $easySms = new EasySms\EasySms($config);

        if (Redis::get(Carbon::today()->format('ydm') . $request->openid) >= 5) {
            //判断是否重发超过5次
            return response()->json([
                'code' => 0,
                'result' => '今日发送数量超过5条！'
            ]);
        } else {
            $user = Mc::where('phone', $request->phone)->first();
            if (!is_null($user)) {
                return response()->json([
                    'code' => 0,
                    'result' => '重复手机号！'
                ]);
            }
            $code = random_int(000000, 999999);
            $easySms->send($request->phone, [
                'content' => '【上汽名爵】您的验证码是' . $code,
            ]);
            Redis::setex($request->phone . '_' . $request->openid, 180, $code);//录入验证码
            Redis::incr(Carbon::today()->format('ydm') . $request->openid);
            return response()->json([
                'code' => 1,
                'result' => '发送成功!'
            ]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 存储用户信息
     */
    public function userStore(Request $request)
    {
        $this->validate($request, [
            'openid' => 'required',
            'username' => 'required',
            'sms' => 'required|numeric',
            'intention' => 'required',
            'phone' => 'required|numeric',
        ]);
        if (Redis::exists($request->phone . '_' . $request->openid)) {
            $sms = Redis::get($request->phone . '_' . $request->openid);
            if ($sms == $request->sms) {
                try {
                    //保存用户信息
                    $mc = new Mc();
                    $mc->username = $request->username;
                    $mc->openid = $request->openid;
                    $mc->intention = $request->intention;
                    $mc->phone = $request->phone;
                    $mc->save();

                    //提交信息给客户系统
                    $client = new Client();
                    $client->request('GET', 'http://cep.saicmg.com/cep/saic-sis-api?act=5&track_id=2&username='.
                        $request->username .'&mobile=' . $request->phone .
                        '&brand=3362&terminal_type=1&url=api.shanghaichujie.com&cartype='. $request->intention);

                    return response()->json([
                        'code' => 1,
                        'result' => '提交成功!'
                    ]);
                } catch (\Exception $e) {
                    return response()->json([
                        'code' => 0,
                        'result' => '录入失败，已经注册过了！'
                    ]);
                }

            } else {
                return response()->json([
                    'code' => 0,
                    'result' => '验证码输入错误！'
                ]);
            }
        } else {
            return response()->json([
                'code' => 0,
                'result' => '验证码不匹配！
            ']);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 判断是否注册
     */
    public function userCheck(Request $request)
    {
        $this->validate($request, [
            'openid' => 'required'
        ]);

        $user = Mc::where('openid', $request->openid)->first();

        if (is_null($user) || is_null($user->phone)) {
            return response()->json([
                'code' => 0,
                'userInfo' => is_null($user) ? null : $user
            ]);
        }
        return response()->json([
            'code' => 1,
            'userInfo' => $user->all(),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 检验二维码有没有被扫过
     */
    public function qrcodeCheck(Request $request)
    {
        $type = $request->type;
        $openid = $request->openid;

        $user = Mc::select($type, 'coin')
            ->where('openid', $openid)
            ->first();
        return response()->json([
            'code' => is_null($user)? 0 : $user->{$type},
            'coin' => is_null($user)? 0 : $user->coin,
        ]);

    }

    public function qrcodeScan(Request $request)
    {
        $type = $request->type;
        $openid = $request->openid;

        $user = Mc::where('openid', $openid)->first();
        if (is_null($user)) {
            $user = new Mc();
            $user->openid = $openid;
        }
        if ($user->{$type} === 1) {
            return response()->json([
                'code' => 0,
                'result' => '二维码已经扫过!',
            ]);
        } else {
            switch ($type) {
                case 'sign' :
                    $user->{$type} = 1;
                    $user->coin += config('gift_mc.sign');
                    $user->save();
                    break;
                case 'car':
                    $user->{$type} = 1;
                    $user->coin += config('gift_mc.car');
                    $user->save();
                    break;
                case 'show':
                    $user->{$type} = 1;
                    $user->coin += config('gift_mc.show');
                    $user->save();
                    break;
                case 'ar':
                    $user->{$type} = 1;
                    $user->coin += config('gift_mc.ar');
                    $user->save();
                    break;
                case 'discover':
                    $user->{$type} = 1;
                    $user->coin += config('gift_mc.discover');
                    $user->save();
                    break;
                default:
                    for ($i = 1; $i <= 12; $i++) {
                        if ($type == 'gift' . $i) {
                            $user->coin -= config('gift_mc.gift' . $i);
                            $user->save();
                        }
                    }
            }
            return response()->json([
                'code' => 1,
                'result' => '扫码成功',
            ]);
        }
    }
}
