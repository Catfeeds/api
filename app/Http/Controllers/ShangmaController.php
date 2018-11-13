<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShangmaController extends Controller
{
    public function index(Request $request)
    {
        $path = $request->input('path');
        $js = \EasyWeChat::officialAccount();
        return view('shangma', compact('path'));
    }
}
