<?php

namespace App\Http\Controllers\Friso;

use App\Models\FrisoUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = FrisoUser::create($request->all());

        return $user;
    }

    public function index()
    {
        $user = FrisoUser::where('openid', session('wechat.oauth_user.default.id'))->first();
        return redirect(env('APP_URL') . '/front/friso')
            ->cookie('openid', session('wechat.oauth_user.default.id'), 0, '', '', false, false)
            ->cookie('status', is_null($user) ? 'false' : 'true', 0, '', '', false, false);
    }
}
