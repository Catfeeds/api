<?php

namespace App\Http\Controllers\Coach;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class CoachController extends Controller
{
    public function UploadImage(Request $request)
    {
        $id = Redis::incr('coach');
        Storage::disk('unitytouch')->putFileAs('Fred/coach', $request->file('image'), $id . '.png');
        return $id;
    }

    public function GetImage()
    {
        return view('coach');
    }
}
