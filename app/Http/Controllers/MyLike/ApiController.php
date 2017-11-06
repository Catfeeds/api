<?php

namespace App\Http\Controllers\MyLike;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    public function upload(Request $request)
    {
        $uid = $request->uid;
        if (is_null($uid)){
            return 'false';
        }
        if(is_null($request->file('photo'))){
            return 'false';
        }
        return $uid.'uid';
//        Storage::disk('public_path')->putFileAS('myLike', $request->file('photo'), $uid.'.gif');
        return env('APP_URL') . '/myLike/?uid=' . $uid;
    }
}
