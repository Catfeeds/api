<?php

namespace App\Http\Controllers\Cowin;

use App\Models\Cowin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat;
use Intervention\Image\Facades\Image;

class IndexController extends Controller
{
    public function index()
    {
        $js = EasyWeChat::js();
        $wechatInfo = session('wechat.oauth_user');
        $user = Cowin::where('openid', $wechatInfo['id'])
            ->where('greeting', '!=', '')
            ->first();
        return view('cowin.index', compact('user', 'js', 'wechatInfo'));
    }

    public function greeting(Request $request)
    {
        $this->validate($request, [
            'text' => 'required|max:60',
            'phone' => 'required|size:11',
        ]);
        $wechatInfo = session('wechat.oauth_user');
        $js = EasyWeChat::js();


        $img = Image::make(public_path('res/cowin/images/greeting.jpeg'));

        //插入微信头像
        if (empty($request->avatar)) {
            $avatar = Image::make($wechatInfo['avatar'])
                ->resize(45, 45);
        } else {
            $avatar = Image::make($request->avatar);
        }

        $img->insert($avatar, 'top-left', 218, 493);

        //插入昵称,截取过长昵称
        preg_match('/.{10}|.+/u', $wechatInfo['nickname'], $nickname);
        $img->text($nickname[0] . ' 祝您：', 267, 534, function ($font) {
            $font->file(public_path('res/cowin/MSYHBD.TTC'));
            $font->size(24);
            $font->color('FFE198');
        });

        //截取祝福语
        $text = $request->text;
        preg_match_all('/./u', $text, $arr);
        $len = 0;
        $col[0] = '';
        $index = 0;
        foreach ($arr[0] as $item) {
            if ($len >= 23) {
                $len = 0;
                $index += 1;
                $col[$index] = '';
            }
            if (strlen($item) > 1) {
                $len += 2;
            } else {
                $len += 1;
            }
            $col[$index] .= $item;
        }

        $y = 609;
        foreach ($col as $item) {
            $img->text($item, 216, $y, function ($font) {
                $font->file(public_path('res/cowin/MSYHBD.TTC'));
                $font->size(28);
                $font->color('FFE198');
            });
            $y += 37;
        }
        $img->save(public_path('upload/cowin/' . $wechatInfo['id'] . '.jpeg'));

        //保存贺卡用户信息
        $user = Cowin::firstOrCreate(
            [
                'openid' => $wechatInfo['id']
            ],
            [
                'avatar' => $wechatInfo['avatar'],
                'nickname' => $wechatInfo['nickname'],
                'phone' => $request->phone,
                'greeting' => env('APP_URL') . '/upload/cowin/' . $wechatInfo['id'] . '.jpeg'
            ]
        );

        $user->save();
        $share = 0;
        return view('cowin.share', compact('user', 'js', 'share'));
    }

    public function share($id)
    {
        $user = Cowin::find($id);
        $js = EasyWeChat::js();
        $share = 1;
        return view('cowin.share', compact('user', 'js', 'share'));
    }

    public function guide()
    {
        $js = EasyWeChat::js();
        $wechatInfo = session('wechat.oauth_user');
        $user = Cowin::where('openid', $wechatInfo['id'])
            ->where('confirm', 0)->first();
        return view('cowin.guide', compact('user', 'js', 'wechatInfo'));

    }
    public function api()
    {
        $cowin = Cowin::where('status', '0')
            ->where('confirm', '1')
            ->first();
        if (empty($cowin->greeting)) {
            $url = $cowin->avatar;
        } else {
            $url = $cowin->greeting;
        }
        return response()->json([
            'phone' => $cowin->phone,
            'url' => $url,
            'nickname' => $cowin->nickname
        ]);
    }

}
