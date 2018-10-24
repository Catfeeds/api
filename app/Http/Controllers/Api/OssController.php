<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class OssController extends Controller
{
    public function allFiles(Request $request)
    {
        $files = Storage::disk($request->input('disk'))
            ->allFiles($request->input('path'));
        arsort($files);

        return response()->json([
            'list' => $files
        ]);
    }
}
