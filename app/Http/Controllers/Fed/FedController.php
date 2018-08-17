<?php

namespace App\Http\Controllers\Fed;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FedController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * 联邦快棋-拍照分享页面
     */
    public function index(Request $request)
    {
        $path = $request->path;
        $js= \EasyWeChat::js();
        return view('fed',compact('path','js'));
    }

    /**
     * @param Request $request
     * @return string
     *
     * 上传照片
     */
    public function api(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
        ]);
        $path = Storage::disk('public_path')->putFile('fed', $request->file('image'));

        return env('APP_URL') . '/fed/index?path=' . $path;
    }
}
