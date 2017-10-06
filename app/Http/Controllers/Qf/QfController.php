<?php

namespace App\Http\Controllers\Qf;

use App\Models\Qifu_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;

class QfController extends Controller
{
    public $js;

    /**
     * QfController constructor.
     * @param $app
     */
    public function __construct(Application $app)
    {
        $this->js = $app->js;
    }

    public function sign()
    {
        //获取微信用户信息
        $user_info = session('wechat.oauth_user');

        $qf_user = Qifu_user::where('openid', $user_info->id)
            ->orWhere('nickname', $user_info->nickname)
            ->first();
        if (is_null($qf_user)) {
            //0-0-0
            $qf_user = new Qifu_user;
            $qf_user->openid = $user_info->id;
            $qf_user->nickname = $user_info->nickname;
            $qf_user->sign = '1';
            $qf_user->save();
            return redirect('http://api.touchworld-sh.com/qifu/sign/1/index.html');
        } elseif ($qf_user->sign == '1') {
            if ($qf_user->pasture == '1' && $qf_user->vr == '1') {
                return redirect('http://api.touchworld-sh.com/qifu/sign/23_1/index.html');
            }
            return redirect('http://api.touchworld-sh.com/qifu/illustrate/index.html');
        } else {
            //名单上的用户openid为null，添加openid
            if ($qf_user->openid == null){
                $qf_user->openid = $user_info->id;
            }
            if ($qf_user->pasture == '0' && $qf_user->vr == '0' && $qf_user->sign == '0') {
                $qf_user->sign = '1';
                $qf_user->save();
                return redirect('http://api.touchworld-sh.com/qifu/sign/1/index.html');
            }
            $qf_user->sign = '1';
            $qf_user->save();
            //判断不同次序
            if ($qf_user->pasture == '1' && $qf_user->vr == '0') {
                return redirect('http://api.touchworld-sh.com/qifu/sign/2_1/index.html');
            } elseif ($qf_user->pasture == '1' && $qf_user->vr == '1') {
                return redirect('http://api.touchworld-sh.com/qifu/sign/23_1/index.html');
            } elseif ($qf_user->pasture == '0' && $qf_user->vr == '1') {
                return redirect('http://api.touchworld-sh.com/qifu/sign/3_1/index.html');
            }
            return '网络出现了问题';
        }
    }

    public function pasture()
    {
        //获取微信用户信息
        $user_info = session('wechat.oauth_user');

        $qf_user = Qifu_user::where('openid', $user_info->id)
            ->orWhere('nickname', $user_info->nickname)
            ->first();
        if (is_null($qf_user)) {
            //0-0-0
            $qf_user = new Qifu_user;
            $qf_user->openid = $user_info->id;
            $qf_user->nickname = $user_info->nickname;
            $qf_user->pasture = '1';
            $qf_user->save();
            return redirect('http://api.touchworld-sh.com/qifu/pasture/2/index.html');
        } elseif ($qf_user->pasture == '1') {
            if ($qf_user->sign == '1' && $qf_user->vr == '1') {
                return redirect('http://api.touchworld-sh.com/qifu/pasture/13_2/index.html');
            }
            return redirect('http://api.touchworld-sh.com/qifu/illustrate/index.html');
        } else {
            //名单上的用户openid为null，添加openid
            if ($qf_user->openid == null){
                $qf_user->openid = $user_info->id;
            }

            if ($qf_user->pasture == '0' && $qf_user->vr == '0' && $qf_user->sign == '0') {
                $qf_user->pasture = '1';
                $qf_user->save();
                return redirect('http://api.touchworld-sh.com/qifu/pasture/2/index.html');
            }
            $qf_user->pasture = '1';
            $qf_user->save();
            //判断不同次序
            if ($qf_user->sign == '1' && $qf_user->vr == '0') {
                return redirect('http://api.touchworld-sh.com/qifu/pasture/1_2/index.html');
            } elseif ($qf_user->sign == '1' && $qf_user->vr == '1') {
                return redirect('http://api.touchworld-sh.com/qifu/pasture/13_2/index.html');
            } elseif ($qf_user->sign == '0' && $qf_user->vr == '1') {
                return redirect('http://api.touchworld-sh.com/qifu/pasture/3_2/index.html');
            }
            return '网络出现了问题～';
        }


//         弃用
//        $qf_user = Qifu_user::where('openid', $user_info->id)
//            ->where('sign', '1')
//            ->first();
//        if (is_null($qf_user)) {
//            return '请先去扫码签到哦～';
//        } elseif ($qf_user->pasture == 0 && $qf_user->vr == 0) {
//            $qf_user->pasture = 1;
//            $qf_user->save();
//            return view('qf.illumall02');
//        } elseif ($qf_user->pasture == 1 && $qf_user->vr == 0) {
//            return view('qf.illumall02');
//        } elseif ($qf_user->pasture == 0 && $qf_user->vr == 1) {
//            $qf_user->pasture = 1;
//            $qf_user->save();
//            return view('qf.illumall03');
//        }
//        return view('qf.illumall03');
    }

    public function vr()
    {
        //获取微信用户信息
        $user_info = session('wechat.oauth_user');

        $qf_user = Qifu_user::where('openid', $user_info->id)
            ->orWhere('nickname', $user_info->nickname)
            ->first();
        if (is_null($qf_user)) {
            //0-0-0
            $qf_user = new Qifu_user;
            $qf_user->openid = $user_info->id;
            $qf_user->nickname = $user_info->nickname;
            $qf_user->vr = '1';
            $qf_user->save();
            return redirect('http://api.touchworld-sh.com/qifu/vr/3/index.html');
        } elseif ($qf_user->vr == '1') {
            if ($qf_user->pasture == '1' && $qf_user->sign == '1') {
                return redirect('http://api.touchworld-sh.com/qifu/vr/12_3/index.html');
            }
            return redirect('http://api.touchworld-sh.com/qifu/illustrate/index.html');
        } else {
            //名单上的用户openid为null，添加openid
            if ($qf_user->openid == null){
                $qf_user->openid = $user_info->id;
            }

            if ($qf_user->pasture == '0' && $qf_user->vr == '0' && $qf_user->sign == '0') {
                $qf_user->vr = '1';
                $qf_user->save();
                return redirect('http://api.touchworld-sh.com/qifu/vr/3/index.html');
            }
            $qf_user->vr = '1';
            $qf_user->save();
            //判断不同次序
            if ($qf_user->pasture == '1' && $qf_user->sign == '0') {
                return redirect('http://api.touchworld-sh.com/qifu/vr/1_3/index.html');
            } elseif ($qf_user->pasture == '1' && $qf_user->sign == '1') {
                return redirect('http://api.touchworld-sh.com/qifu/vr/12_3/index.html');
            } elseif ($qf_user->pasture == '0' && $qf_user->sign == '1') {
                return redirect('http://api.touchworld-sh.com/qifu/vr/1_3/index.html');
            }
            return '网络出现了问题～';
        }

//        弃用
//        $qf_user = Qifu_user::where('openid', $user_info->id)
//            ->where('sign', '1')
//            ->first();
//        if (is_null($qf_user)) {
//            return '请先去扫码签到哦～';
//        } elseif ($qf_user->pasture == 0 && $qf_user->vr == 0) {
//            $qf_user->vr = 1;
//            $qf_user->save();
//            return view('qf.illumall02');
//        } elseif ($qf_user->pasture == 0 && $qf_user->vr == 1) {
//            return view('qf.illumall02');
//        } elseif ($qf_user->pasture == 1 && $qf_user->vr == 0) {
//            $qf_user->vr = 1;
//            $qf_user->save();
//            return view('qf.illumall03');
//        }
//        return view('qf.illumall03');
    }

    public function share()
    {
        $user_info = session('wechat.oauth_user');
        $js = $this->js;
        $qf_user = Qifu_user::where('openid', $user_info->id)
            ->orWhere('nickname', $user_info->nickname)
            ->first();
        $logo = $qf_user->logo;
        $shop_url = $qf_user->shop_url;
        $openid = $user_info->id;
        $nickname = $user_info->nickname;
        $company = $qf_user->company;
        return view('qf.share', compact('logo', 'shop_url', 'js', 'openid', 'nickname', 'company'));
    }

    public function shareTo(Request $request)
    {
        $openid = $request->oid;
        $nickname = '';
        $js = $this->js;
        $qf_user = Qifu_user::where('openid', $openid)
            ->orWhere('nickname', $nickname)
            ->first();
        $logo = $qf_user->logo;
        $shop_url = $qf_user->shop_url;
        $company = $qf_user->company;
        return view('qf.share', compact('logo', 'shop_url', 'js', 'openid', 'nickname', 'company'));
    }

    public function online($openid,$nickname='')
    {
        $js = $this->js;
        return view('qf.online', compact('openid', 'nickname', 'js'));
    }

    public function time()
    {
        return redirect('http://api.touchworld-sh.com/qifu/encouragement/index.html');
    }

    public function user(Request $request)
    {
//        项目修改，原签到接口废弃，
//        $openid = $request->input('openid');
//        $nickname = $request->input('nickname');
//        $name = $request->input('name');
//
//        $qf_user = Qifu_user::where('nickname', $nickname)->first();
//
//        if (is_null($qf_user)){
//            //未在名单上的新用户
//            $qf_user = new Qifu_user;
//            $qf_user->openid = $openid;
//            $qf_user->nickname = $nickname;
//            $qf_user->name = $name;
//            $qf_user->sign = '1';
//            $qf_user->save();
//            return 'true';
//        }
//        if ($qf_user->name != $name){
//            //签到有错
//            return 'false';
//        }
//        //成功签到
//        $qf_user->sign = '1';
//        $qf_user->openid = $openid;
//        $qf_user->save();
//        return 'true';
    }
}
