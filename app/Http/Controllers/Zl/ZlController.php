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

        return back()->with('success', '签到成功');
    }

    public function barrageInput()
    {
        return view('zl.barrageSubmit');
    }

    public function barrageSubmit(Request $request)
    {
        $barrage = $request->input('barrage');
        $wechatInfo = session('wechat.oauth_user');
        event(new ZlBarrage($wechatInfo['nickname'], $wechatInfo['avatar'], $barrage));
        return back()->with('success', '弹幕提交成功');
    }

    public function draw()
    {
        $draw = Zl::where('prize', '1')->count();
        if ($draw == 60){
            //抽40人，12个内定，28个已经签到
            $unofficially = Zl::where('unofficially', '1')
                ->where('prize', '0')
                ->get()
                ->random(12);

            $users = Zl::where('unofficially', '0')
                ->where('prize', '0')
                ->get()
                ->random(28);
        }else{
            //抽取30人，9个内定，21个已经签到
            $unofficially = Zl::where('unofficially', '1')
                ->where('prize', '0')
                ->get()
                ->random(9);

            $users = Zl::where('unofficially', '0')
                ->where('prize', '0')
                ->get()
                ->random(21);
        }


        //保存中奖记录
//        foreach ($unofficially as $item){
//            $item->prize =1;
//            $item->save();
//        }
//        foreach ($users as $user){
//            $user->prize =1;
//            $user->save();
//        }

        return view('zl.prize', compact('unofficially', 'users'));
    }

    public function control(Request $request)
    {
        $change = $request->input('change');
        event(new ZlChange($change));
        return back()->with('success', '更改成功');
    }
}
