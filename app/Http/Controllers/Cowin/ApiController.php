<?php

namespace App\Http\Controllers\Cowin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Models\Cowin;

class ApiController extends Controller
{
    /**
     * @param Request $request
     * @return \Intervention\Image\Image
     * 将微信头像转成base64
     */
    public function image(Request $request)
    {
        $url = $request->avatar;
        $img = Image::make($url)->resize(45,45)
            ->encode('data-url');
        return $img;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * 获取抽奖头像
     */
    public function api()
    {
        $cowin = Cowin::where('status', '0')
            ->where('confirm', '1')
            ->first();
        if (empty($cowin->greeting)) {
            $url = $cowin->avatar;
        } else {
            $url = $cowin->greeting;
        }
        $cowin->status = '1';
        $cowin->save();
        return response()->json([
            'phone' => $cowin->phone,
            'url' => $url,
            'nickname' => $cowin->nickname
        ]);
    }

    public function phone(Request $request)
    {
        $cowin = Cowin::updateOrCreate([
            'phone' => $request->phone,
            'openid' => $request->openid,
            'nickname' => $request->nickname], [
                'avatar' => $request->avatar,
                'confirm' => '1',
        ]);
        return 'true';

    }
}
