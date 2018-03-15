<?php

namespace App\Http\Controllers\Zyhx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function getComments(Request $request)
    {
        $finalId = $request->finalId;
        $openid = $request->opneid;

    }
}
