<?php

namespace App\Http\Controllers\Qf;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QfController extends Controller
{
    public function sign()
    {
        $userinfo = session('wechat.oauth_user');


        return view('qf.illumall01');
    }

    public function pasture()
    {
        return view('qf.illumall02');
    }

    public function vr()
    {
        return view('qf.illumall03');
    }
}
