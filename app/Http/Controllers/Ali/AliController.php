<?php

namespace App\Http\Controllers\Ali;

use App\Models\Ali;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AliController extends Controller
{
    /**
     * @param $uid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 阿里公益分享页面
     */
    public function index($uid)
    {
        $ali = Ali::where('uid', $uid)->first();
        return view('ali.mobile', compact('ali'));
    }

}
