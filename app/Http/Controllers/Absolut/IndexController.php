<?php

namespace App\Http\Controllers\Absolut;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class IndexController extends Controller
{
    public function pad($id)
    {
        return view('absolut.pad', compact('id'));
    }

    public function phone()
    {
        $js = \EasyWeChat::js();
        return view('absolut.phone', compact('js'));
    }

    public function share(Request $request)
    {
        $js = \EasyWeChat::js();
        $path = $request->path;
        return view('absolut.share', compact('path','js'));
    }
}
