<?php

namespace App\Http\Controllers\Api;

use App\Models\Ali;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
        ]);
        $path = Storage::disk('public_path')->putFile('face', $request->file('image'));

        return env('upload_url') . '/' . $path;
    }

    public function ali(Request $request)
    {
        dd($request);
        //拍照上传10张照片，保存到标识文件夹
        for ($i = 0; $i < 2; $i++) {
            Storage::disk('public_path')
                ->put('ali/' . $request->id . '/p' . $i . '.png', $request->file('p' . $i));
        }
        //保存信息到数据库
//        $ali = new Ali;
//        $ali->uid = $request->id;
//        $ali->name = $request->name;
//        $ali->hours = $request->hours;
//        $ali->save();

        return env('APP_URL') . '/ali/user/' . $request->id;
    }
}
