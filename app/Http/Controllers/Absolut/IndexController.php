<?php

namespace App\Http\Controllers\Absolut;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class IndexController extends Controller
{
    public function test()
    {
        //合成基础图片
//        $base = Image::make(public_path('res/absolut/base_bg.png'));
//        $img = Image::make(public_path('res/absolut/test.png'))->resize(1767,2473);
//        $base->insert($img, 'top-left', 154, 114);
//        return $base->response('png');

    }
}
