<?php

namespace App\Http\Controllers\Zl;

use App\Events\ZlBarrage;
use App\Events\ZlChange;
use App\Events\ZlSign;
use App\Http\Requests\ZlSignRequest;
use App\Models\Zl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZlController extends Controller
{
    public function sign(ZlSignRequest $request)
    {
        $wechatInfo = session('wechat.oauth_user');
        Zl::firstOrCreate(['openid' => $wechatInfo['id']], [
            'nickname' => $wechatInfo['nickname'],
            'avatar' => $wechatInfo['avatar'],
            'name' => $request->input('name'),
            'phone' => $request->input('phone')
        ]);

        //广播签到事件
        event(new ZlSign($wechatInfo['nickname'], $wechatInfo['avatar']));

        $request->session()->flash('status', '签到成功!现在可以参与弹幕抽奖');

        return redirect('zl/barrageSubmit');
    }

    public function barrageInput()
    {
//        $wechatInfo = session('wechat.oauth_user');
//        $user = Zl::where('openid', $wechatInfo['id'])
//            ->first();
//        if (is_null($user)) {
//            return view('zl.sign')->with('success', '请先签到再参与抽奖');
//        }
        return view('barrage.barrageSubmit');
    }

    public function barrageSubmit(Request $request)
    {
        $barrage = $request->input('barrage');
        event(new ZlBarrage($barrage));
        return back()->with('success', '弹幕提交成功');
    }

    public function draw()
    {
        $draw = Zl::where('prize', '0')
            ->where('unofficially', '1')
            ->count();
        if ($draw < 2) {
            $unofficially = Zl::where('unofficially', '1')
                ->get()
                ->random(2);
        }else {
            //抽10人，3个内定，7个已经签到
            $unofficially = Zl::where('unofficially', '1')
                ->where('prize', '0')
                ->get()
                ->random(2);
            foreach ($unofficially as $item){
                $item->prize =1;
                $item->save();
            }
        }

        $users = Zl::where('unofficially', '0')
            ->where('prize', '0')
            ->get()
            ->random(8);

        //保存中奖记录

        foreach ($users as $user) {
            $user->prize = 1;
            $user->save();
        }
        return view('zl.prize', compact('unofficially', 'users'));
    }

    public function control(Request $request)
    {
        $change = $request->input('change');
        event(new ZlChange($change));
        return back()->with('success', '更改成功');
    }

    public function users()
    {
        $users = Zl::select(['id', 'avatar'])->get();
        return $users;
    }
}
