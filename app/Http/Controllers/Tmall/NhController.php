<?php

namespace App\Http\Controllers\Tmall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class NhController extends Controller
{
    public function index()
    {
        $num = Redis::get('tmall_nh_share');
        return view('tmall.nh', compact('num'));
    }
}
