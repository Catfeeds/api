<?php

namespace App\Http\Controllers\Qf;

use App\Models\Qifu_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QfController extends Controller
{
    public function sign()
    {
        $user_info = session('wechat.oauth_user');

        $qf_user = Qifu_user::where('openid', $user_info->id)
            ->where('sign', '1')
            ->first();
        if (is_null($qf_user)) {
            return view('qf.illumall01', compact('user_info'));
        }
        return '您已经签到过了，请收集其他元素哦～';
    }

    public function pasture()
    {
        $user_info = session('wechat.oauth_user');

        $qf_user = Qifu_user::where('openid', $user_info->id)
            ->where('sign', '1')
            ->first();
        if (is_null($qf_user)) {
            return '请先去扫码签到哦～';
        }elseif ($qf_user->pasture == 0 && $qf_user->vr == 0) {
            $qf_user->pasture = 1;
            $qf_user->save();
            return view('qf.illumall02');
        }elseif ($qf_user->pasture == 1 && $qf_user->vr == 0) {
            return view('qf.illumall02');
        }elseif ($qf_user->pasture == 0 && $qf_user->vr == 1){
            $qf_user->pasture = 1;
            $qf_user->save();
            return view('qf.illumall03');
        }
        return view('qf.illumall03');
    }

    public function vr()
    {
        $user_info = session('wechat.oauth_user');
        $qf_user = Qifu_user::where('openid', $user_info->id)
            ->where('sign', '1')
            ->first();
        if (is_null($qf_user)) {
            return '请先去扫码签到哦～';
        }elseif ($qf_user->pasture == 0 && $qf_user->vr == 0) {
            $qf_user->vr = 1;
            $qf_user->save();
            return view('qf.illumall02');
        }elseif ($qf_user->pasture == 0 && $qf_user->vr == 1) {
            return view('qf.illumall02');
        }elseif ($qf_user->pasture == 1 && $qf_user->vr == 0){
            $qf_user->vr = 1;
            $qf_user->save();
            return view('qf.illumall03');
        }
        return view('qf.illumall03');
    }

    public function user(Request $request)
    {
        $openid = $request->input('openid');
        $nickname = $request->input('nickname');
        $name = $request->input('name');

        $qf_user = Qifu_user::where('nickname', $nickname)->first();

        if (is_null($qf_user)){
            //未在名单上的新用户
            $qf_user = new Qifu_user;
            $qf_user->openid = $openid;
            $qf_user->nickname = $nickname;
            $qf_user->name = $name;
            $qf_user->sign = '1';
            $qf_user->save();
            return 'true';
        }
        if ($qf_user->name != $name){
            //签到有错
            return 'false';
        }
        //成功签到
        $qf_user->sign = '1';
        $qf_user->openid = $openid;
        $qf_user->save();
        return 'true';
    }
}
