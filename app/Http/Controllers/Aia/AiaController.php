<?php

namespace App\Http\Controllers\Aia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AiaController extends Controller
{
    public function test(Request $request)
    {
        return $request->openid.'&'.$request->score;
    }
}
