<?php

namespace App\Http\Controllers\Yh;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class ZdController
 * @package App\Http\Controllers\Yh
 *
 * 大连亚航 子弹时间 百人摇一摇
 */
class ZdController extends Controller
{
    public function index(Request $request)
    {
        $path = $request->input('path');
        $js = \EasyWeChat::officialAccount();
        return view('yh.zdsj', compact('path', 'js'));
    }
}
