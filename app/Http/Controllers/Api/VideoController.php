<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use EasyWeChat\Foundation\Application;


class VideoController extends Controller
{
    public $js;

    /**
     * ConverseController constructor.
     * @param $app
     */
    public function __construct(Application $app)
    {
        $this->js = $app->js;
    }

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
        $js = $this->js;
        $path = $request->path;
        $path = env('APP_URL') . '/upload/' . $path;
        return view('armani.index', compact('path', 'js'));
    }
}
