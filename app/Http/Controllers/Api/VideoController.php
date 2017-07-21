<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class VideoController extends Controller
{
    public function upload(Request $request)
    {
        $this->validate($request, [
            'video' => 'required',
        ]);
        $path = Storage::disk('public_path')->putFile('videos', $request->file('video'));

        return env('APP_URL').'/'.$path;
    }
}
