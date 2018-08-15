<?php

namespace App\Http\Controllers\Absolut;

use App\Models\Absolut;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ApiController extends Controller
{
    /**
     * @param Request $request
     * @return string
     *
     */
    public function uploadImg(Request $request)
    {
        $lid = $request->location_id;
        $img = $request->input('img');
        $platform = $request->platform; //区分平台
        $uniqid = uniqid();

        if ($platform == 'pad') {
            //上传源文件
            Image::make($img)->save(public_path('upload/absolut/' . $uniqid . '.png'));
            $path = Storage::disk('oss')->putFileAs('absolut', new File(public_path('upload/absolut/' . $uniqid . '.png')), uniqid() . '.png');
            //保存pad端源文件用于打印
            $item = new Absolut();
            $item->locationId = $lid;
            $item->imgUrl = config('filesystems.disks.oss.oss_url') . $path;
            $item->save();

        }
        $base = Image::make(public_path('res/absolut/base_bg.png'));
        $img = Image::make($img)->resize(1767, 2473);

        $base->insert($img, 'top-left', 154, 114)->save(public_path('upload/absolut/' . $uniqid . '.png'));

        $path = Storage::disk('oss')->putFileAs('absolut', new File(public_path('upload/absolut/' . $uniqid . '.png')), uniqid() . '.png');


        return config('filesystems.disks.oss.oss_url') . $path;
    }

    public function printImg(Request $request)
    {
        $absout = Absolut::where('locationId', $request->location_id)
            ->where('status', 0)
            ->where('created_at', '>', Carbon::today())
            ->first();
        if ($absout) {
            $absout->status = 1;
            $absout->save();

            return response()->json([
                'code' => 1,
                'image' => $absout->imgUrl
            ]);
        }
        return response()->json([
            'code' => 0,
            'image' => null
        ]);
    }

    public function printConfirm(Request $request)
    {
        $absolut = Absolut::where('imgUrl', $request->imgUrl)->first();
        $absolut->status = 0;
        $absolut->save();

        return 'true';
    }
}
