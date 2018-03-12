<?php

namespace App\Http\Controllers\Friso;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    /**
     * @param Request $request
     * @return string
     *
     * 派样机确定是否可以领取奖品
     */
    public function gift(Request $request)
    {
        $openid = $request->openid;
        if ($openid === 'test00' || $openid==='test11'||$openid==='test22'||$openid==='test33'||$openid==='test44'||$openid==='test55') {
            return 'true';
        } else {
            return 'false';
        }
    }
}
