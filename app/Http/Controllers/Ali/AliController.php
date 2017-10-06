<?php

namespace App\Http\Controllers\Ali;

use App\Models\Ali;
use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Intervention\Image\Facades\Image;

class AliController extends Controller
{
    public $js;

    /**
     * AliController constructor.
     * @param Application $app
     */

    public function __construct(Application $app)
    {
        $this->js = $app->js;
    }

    /**
     * @param $uid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 阿里公益分享页面
     */
    public function index($uid)
    {
        $ali = Ali::where('uid', $uid)->first();
        return view('ali.mobile', compact('ali'));
    }

    public function yun(Request $request)
    {
        $pid = $request->pid;
        $js = $this->js;
        $img =Image::make(public_path('alibaba/yun/img/'.$pid.'/p0.png'));
        $qrcode= QrCode::format('png')->size(100)->generate(env('APP_URL').'/ali/yunVideo?pid='.$pid);
        $img->insert($qrcode,'bottom-right');
        $img->save();
        return view('ali.yun', compact('pid', 'js'));
    }

    public function yunVideo(Request $request)
    {
        $pid =$request->pid;
        return view('ali.yunVideo',compact('pid'));
    }
}
