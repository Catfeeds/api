<?php

namespace App\Http\Controllers\Newzealand;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $path = $request->input('path');
        $js= \EasyWeChat::js();
        $type = $request->input('type');
        return view('newzealand', compact('path', 'js', 'type'));
    }
}
