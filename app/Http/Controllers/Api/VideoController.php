<?php

namespace App\Http\Controllers\Api;

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

        return env('APP_URL') . '/jc/video?path=' . $path;
    }

    public function show(Request $request)
    {
        $path = $request->path;
        $path = env('APP_URL') . '/upload/' . $path;
        return view('jc.index', compact('path'));
    }
}
