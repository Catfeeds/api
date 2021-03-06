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
        Storage::disk('public_path')->putFileAS('myLike', $request->file('photo'), $uid . '.gif');
        return env('APP_URL') . '/myLike/?uid=' . $uid;
    }

    public function upload2(Request $request)
    {
        //拍照上传10张照片，保存到标识文件夹
        for ($i = 1; $i <= 11; $i++) {
            Storage::disk('public_path')
                ->putFileAs('myLike/' . $request->uid, $request->file('p' . $i), 'p' . $i . '.jpg');
        }
        return env('APP_URL') . '/myLike2/?uid=' . $request->uid;
    }
}
