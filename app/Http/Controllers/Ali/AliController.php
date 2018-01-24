<?php

namespace App\Http\Controllers\Ali;

use App\Models\Ali;
use App\Models\Alih5;
use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $js = $this->js;
        $ali = Ali::where('uid', $uid)->first();
        return view('ali.mobile', compact('ali', 'js'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * h5入口
     */
    public function h5()
    {
        $js = $this->js;
        return view('ali.h5', compact('js'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * h5分享页面
     */
    public function h5Share($id)
    {
        $js = $this->js;
        $user = Alih5::find($id);
        return view('ali.h5share', compact('user', 'js'));
    }

    public function yun(Request $request)
    {
        $path = $request->path;
        $photoPath = env('APP_URL').'/upload/'.$path;
        $js = $this->js;
//        $img =Image::make(public_path('upload/ali/yun/'.$pid.'/p0.png'));
//        $qrcode= QrCode::format('png')->size(100)->generate(env('APP_URL').'/ali/yunVideo?pid='.$pid);
//        $img->insert($qrcode,'bottom-right');
//        $img->save();
        return view('ali.yun', compact('photoPath', 'path', 'js'));
    }

    public function yunVideo(Request $request)
    {
        $pid =$request->pid;
        $js = $this->js;
        return view('ali.yunVideo',compact('pid', 'js'));
    }
}
