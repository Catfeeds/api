<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AudioController extends Controller
{
    public function upload(Request $request)
    {
        $this->validate($request, [
            'audio' => 'required',
        ]);
        $path = Storage::disk('public_path')->putFile('audios', $request->file('audio'));

        return env('APP_URL').'/'.$path;
    }

}
