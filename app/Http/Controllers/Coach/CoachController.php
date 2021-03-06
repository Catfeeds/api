<?php

namespace App\Http\Controllers\Coach;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class CoachController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     *
     * coach 拍照互动（吕）20180907-1007
     */
    public function UploadImage(Request $request)
    {
        Redis::setnx('coach', 100000);
        $id = Redis::get('coach');
        Redis::set('coach', $id + rand(10, 100));
        Storage::disk('unitytouch')->putFileAs('Fred/coach', $request->file('image'), $id . '.png');
        return $id;
    }

    /*
     * 根据id获取照片
     *
     */
    public function GetImage()
    {
        return view('coach');
    }
}
