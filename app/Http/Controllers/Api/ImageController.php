<?php

namespace App\Http\Controllers\Api;

use App\Events\AliPhoto;
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

    /**
     * @param Request $request
     * @return string
     *
     * 阿里公益三小时活动上传拍照图片
     */
    public function ali(Request $request)
    {
        //拍照上传10张照片，保存到标识文件夹
        for ($i = 0; $i < 10; $i++) {
            Storage::disk('public_path')
                ->putFileAs('ali/' . $request->id, $request->file('p' . $i), 'p' . $i . '.png');
        }
        //保存信息到数据库
        $ali = new Ali;
        $ali->uid = $request->id;
        $ali->name = $request->name;
        $ali->hours = $request->hours;
        $ali->save();


        return env('APP_URL') . '/ali/user/' . $request->id;
    }

    /**
     * @param Request $request
     * @return string
     * 阿里云栖大会上传6秒序列帧
     */
    public function yun(Request $request)
    {
        //拍照上传10张照片，保存到标识文件夹
        $pid = $request->pid;
        for ($i = 0; $i < 110; $i++) {
            Storage::disk('public_path')
                ->putFileAs('ali/yun/'.$pid, $request->file('p'.$i), 'p'.$i.'.png');
        }
        return env('APP_URL') . '/ali/yunVideo?pid=' . $pid;
    }

    public function yunPhoto(Request $request)
    {
        $path = Storage::disk('public_path')->putFile('ali/yun', $request->file('photo'));
        return env('APP_URL') . '/ali/yunShow?path=' . $path;
    }

    /**
     * @param Request $request
     * @return string
     * 哥伦比亚羽绒服项目上传热成像图片
     */
    public function columbia(Request $request)
    {
        $path = Storage::disk('public_path')
            ->putFile('columbia', $request->file('photo'));
        return 'https://api.shanghaichujie.com/columbia?path='.$path;
    }
}
