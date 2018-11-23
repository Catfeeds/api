<?php

namespace App\Http\Controllers\PingAn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImgShareController extends Controller
{
    public function index(Request $request)
    {
        $path = $request->input('path');
        $js = \EasyWeChat::officialAccount();
        return view('pingAn.pingan_share_img', compact('path','js'));
    }
}
