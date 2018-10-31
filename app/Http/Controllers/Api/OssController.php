<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class OssController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * 列出所有目录下所有文件
     */
    public function allFiles(Request $request)
    {
        $files = Storage::disk($request->input('disk'))
            ->allFiles($request->input('path'));
        arsort($files);

        return response()->json([
            'list' => $files
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * oss上传图片分享
     */
    public function imgShare(Request $request)
    {
        $path = $request->input('path');
        $title = $request->input('title');
        $desc = $request->input('desc');
        $logo = $request->input('input');
        $js = EasyWeChat::officialAccount();

        return view('oss.imgShare', compact('path', 'title', 'desc', 'logo', 'js'));
    }
}
