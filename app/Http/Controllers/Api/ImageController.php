<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
        ]);
        $path = Storage::disk('public_path')->putFile('face', $request->file('image'));

        return env('APP_URL').'/'.$path;
    }
}
