<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Intervention\Image\Facades\Image;

class QrcodeController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     *
     * 生成二维码接口
     */
    public function qrcode(Request $request)
    {
        $qrcode=QrCode::format('png')
            ->encoding('UTF-8')
            ->size('400')
            ->margin(2)
            ->generate($request->text);
        $img =Image::make($qrcode);
        return $img->response();

    }
}
