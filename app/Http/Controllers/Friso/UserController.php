<?php

namespace App\Http\Controllers\Friso;

use App\Models\FrisoUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     *
     * 录入答题信息
     */
    public function store(Request $request)
    {
        $user = FrisoUser::create($request->all());

        return $user;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *
     * 重定向
     */
    public function index()
    {
        $user = FrisoUser::where('openid', session('wechat.oauth_user.default.id'))->first();
        return redirect(env('APP_URL') . '/front/friso')
            ->cookie('openid', session('wechat.oauth_user.default.id'), 0, '', '', false, false);
    }

    public function status($openid)
    {
        $user = FrisoUser::where('openid', $openid)->first();

        return is_null($user) ? 'false' : 'true';
    }
}
