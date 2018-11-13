<?php

namespace App\Http\Controllers\Newzealand;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $path = $request->input('path');
        $js= \EasyWeChat::officialAccount();
        $type = $request->input('type');
        return view('ciie.newzealand', compact('path', 'js', 'type'));
    }

    public function panoramic()
    {
        $js= \EasyWeChat::officialAccount();

        return view('ciie.panoramic', compact('js'));
    }
}
