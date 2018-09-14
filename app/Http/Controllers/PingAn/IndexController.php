<?php

namespace App\Http\Controllers\PingAn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function zh()
    {
        $js = \EasyWeChat::js();
        return view('pingAn.zh', compact('js'));
    }

    public function en()
    {
        $js = \EasyWeChat::js();
        return view('pingAn.en', compact('js'));
    }
}
