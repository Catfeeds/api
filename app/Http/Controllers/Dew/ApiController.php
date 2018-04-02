<?php

namespace App\Http\Controllers\Dew;

use App\Models\Dew;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    /**
     * @param Request $request
     * @return string
     *
     * 纯悦上传用户信息
     */
    public function user(Request $request)
    {
        $this->validate($request, [
            'openid' => 'required',
            'username' => 'required',
            'connect' => 'required',
        ]);
        $dew = new Dew();
        $dew->openid = $request->openid;
        $dew->username = $request->username;
        $dew->connect = $request->connect;
        $dew->save();

        return 'true';
    }

    /**
     * @param Request $request
     * @return string
     *
     * 纯悦上传分数信息
     */
    public function score(Request $request)
    {
        $this->validate($request, [
            'openid' => 'required',
            'score' => 'required',
        ]);

        $dew = Dew::where('openid', $request->openid)->first();
        if ($dew->score < $request->score) {
            $dew->score = $request->score;
            $dew->save();
        }
        return 'true';
    }

    public function rank()
    {
        $dew = Dew::select(['username', 'score'])
            ->orderByDesc('score')
            ->limit(100)->get();
        return response()->json($dew->all());
    }
}
