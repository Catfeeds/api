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

        return env('upload_url') . '/' . $path;
    }

    public function ali(Request $request)
    {
        for ($i = 0; $i < 10; $i++) {
            Storage::disk('public_path')->putFile('ali/' . $request->id, $request->file('p' . $i));
        }

        return env('APP_URL').'/ali/'.$request->id;
    }
}
