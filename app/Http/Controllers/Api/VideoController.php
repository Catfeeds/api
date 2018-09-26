<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * @param Request $request
     * @return string
     *
     * 用于oss sdk无法使用转存视频
     */
    public function oss(Request $request)
    {
        $filePath = $request->input('path');//存储路径
        $filename = $request->input('filename');

        $path = Storage::disk('unitytouch')
            ->putFileAs($filePath, $request->file('video'), $filename ?: uniqid() . '.mp4');
        return 'https://oss-unity.touchworld-sh.com/'.$path;
    }
}
