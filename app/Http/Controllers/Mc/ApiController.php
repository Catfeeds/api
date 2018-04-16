<?php

namespace App\Http\Controllers\Mc;

use App\Models\Goods;
use App\Models\Mc;
use App\Models\Mclog;
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
                'content' => '【上汽名爵】您的验证码是' . $code . '，有效期三分钟',
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
                    $mc = Mc::where('openid', $request->openid)->first();
                    $mc->username = $request->username;
                    $mc->openid = $request->openid;
                    $mc->intention = $request->intention;
                    $mc->phone = $request->phone;
                    $mc->save();

                    //提交信息给客户系统
//                    $client = new Client();
//                    $client->request('GET', 'http://cep.saicmg.com/cep/saic-sis-api?act=5&track_id=2&username=' .
//                        $request->username . '&mobile=' . $request->phone .
//                        '&brand=3362&terminal_type=1&url=api.shanghaichujie.com&cartype=' . $request->intention);

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
            'userInfo' => $user,
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
            'code' => is_null($user) ? 0 : $user->{$type},
            'coin' => is_null($user) ? 0 : $user->coin,
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 扫码接口
     */
    public function qrcodeScan(Request $request)
    {
        $type = $request->type;
        $openid = $request->openid;

        $user = Mc::where('openid', $openid)->first();
        if (is_null($user)) {
            $user = new Mc();
            $user->openid = $openid;
        }

        switch ($type) {
            case 'sign' :
                if ($user->{$type} === 1) {
                    return response()->json([
                        'code' => 0,
                        'result' => '二维码已经扫过!',
                    ]);
                }
                $user->{$type} = 1;
                $user->coin += config('gift_mc.sign');
                $user->save();

                //记录积分变更
                $this->log($openid, '签到', '增加', config('gift_mc.sign'));
                break;
            case 'car':
                if ($user->{$type} === 1) {
                    return response()->json([
                        'code' => 0,
                        'result' => '二维码已经扫过!',
                    ]);
                }
                $user->{$type} = 1;
                $user->coin += $request->coin;
                $user->save();

                //记录积分变更
                $this->log($openid, '赛车对爵', '增加', config('gift_mc.car'));
                break;
            case 'show':
                if ($user->{$type} === 1) {
                    return response()->json([
                        'code' => 0,
                        'result' => '二维码已经扫过!',
                    ]);
                }
                $user->{$type} = 1;
                $user->coin += config('gift_mc.show');
                $user->save();

                //记录积分变更
                $this->log($openid, '爵对自我秀', '增加', config('gift_mc.show'));
                break;
            case 'ar':
                if ($user->{$type} === 1) {
                    return response()->json([
                        'code' => 0,
                        'result' => '二维码已经扫过!',
                    ]);
                }
                $user->{$type} = 1;
                $user->coin += config('gift_mc.ar');
                $user->save();

                //记录积分变更
                $this->log($openid, '奇妙AR', '增加', config('gift_mc.ar'));
                break;
            case 'discover':
                if ($user->{$type} === 1) {
                    return response()->json([
                        'code' => 0,
                        'result' => '二维码已经扫过!',
                    ]);
                }
                $user->{$type} = 1;
                $user->coin += config('gift_mc.discover');
                $user->save();

                //记录积分变更
                $this->log($openid, '透镜寻觅', '增加', config('gift_mc.discover'));
                break;
            default:
                $goods = Goods::where('name', $type)->first();
                //判断异常情况
                if (is_null($goods)) {
                    return response()->json([
                        'code' => 0,
                        'result' => '未找到商品!',
                    ]);
                } elseif ($goods->amount == 0) {
                    return response()->json([
                        'code' => 0,
                        'result' => '该商品库存不足!',
                    ]);

                } else {
                    if ($user->coin < $goods->coin) {
                        return response()->json([
                            'code' => 0,
                            'result' => '当前积分'. $user->coin .'不足以兑换该商品!',
                        ]);
                    }

                    $user->coin -= $goods->coin;
                    $user->save();
                    $goods->amount -= 1;
                    $goods->save();

                    //记录积分变更
                    $this->log($openid, $type, '减少', $goods->coin);
                }

        }
        return response()->json([
            'code' => 1,
            'result' => '扫码成功',
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * 返回商品信息
     */
    public function goods()
    {
        $goods = Goods::where('amount', '>', 0)->get()->all();
        return response()->json($goods);
    }

    /**
     * @param Request $request
     * @return int
     *
     * 该用户已经兑换的礼品数量
     */
    public function exchange(Request $request)
    {
        $openid = $request->openid;
        $num = Mclog::where('openid', $openid)
            ->where('handle', '减少')
            ->get()->count();
        return $num;
    }

    public function openid(Request $request)
    {
        $code = $request->jscode;
        $client = new Client();
        $appid= env('mc_appid');
        $secret= env('mc_secret');
        dd('https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$secret}&js_code={$code}&grant_type=authorization_code');
        $res = $client->request('GET', 'https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$secret}&js_code={$code}&grant_type=authorization_code');
        return $res->getBody();
    }
    /**
     * @param $openid
     * @param $type
     * @param $handle
     * @param $coin
     *
     * 存储积分变更数据
     */
    public function log($openid, $type, $handle, $coin)
    {
        $log = new Mclog();
        $log->openid = $openid;
        $log->type = $type;
        $log->handle = $handle;
        $log->coin = $coin;
        $log->save();
    }
}
