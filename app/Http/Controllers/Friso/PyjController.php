<?php

namespace App\Http\Controllers\Friso;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PyjController extends Controller
{
    public function index(Request $request)
    {
        $path =$request->path;
        return view('friso.pyj', compact('path'));
    }

    public function reward(Request $request)
    {
        $openid = $request->openid;
        return view('friso.reward', compact('openid'));
    }
}
