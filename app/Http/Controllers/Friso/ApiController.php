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
        if ($openid === 'test000' || $openid==='test111'||$openid==='test222'||$openid==='test333'||$openid==='test444'||$openid==='test555') {
            return 'true';
        } else {
            return 'false';
        }
    }
}
