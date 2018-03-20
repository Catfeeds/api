<?php

namespace App\Http\Controllers\Api;

use App\Models\Zt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZtController extends Controller
{
    /**
     * @param Request $request
     * @return string
     *
     * 中泰证券收集信息
     */
    public function user(Request $request)
    {
        $zt = new Zt();
        $zt->username = $request->username;
        $zt->phone = $request->phone;
        $zt->company = $request->company;
        $zt->job = $request->job;
        $zt->save();
        return 'true';
    }
}
