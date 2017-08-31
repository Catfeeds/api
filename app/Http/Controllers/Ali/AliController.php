<?php

namespace App\Http\Controllers\Ali;

use App\Models\Ali;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AliController extends Controller
{
    public function index($uid)
    {
        $ali = Ali::where('uid', $uid)->first();
        return view('ali.mobile', compact('ali'));
    }

}
