<?php

namespace App\Http\Controllers\Armani;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class VideoController extends Controller
{

    public function upload(Request $request)
    {
//        $this->validate($request, [
//            'video' => 'required',
//        ]);
        if (is_null($request->file('video'))) {
            return 'false';
        }
        $path = Storage::disk('public_path')->putFile('videos', $request->file('video'));

        return env('APP_URL') . '/armani/video?path=' . $path;
    }

    public function show(Request $request)
    {
        $js= \EasyWeChat::officialAccount();
        $path = $request->path;
        $url = env('APP_URL') . '/armani/video?path=' . $path;
        $videoPath = env('APP_URL') . '/upload/' . $path;
        return view('armani.index', compact('path', 'js', 'url', 'videoPath'));
    }
}
