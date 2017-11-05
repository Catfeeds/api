<?php

namespace App\Http\Controllers\MyLike;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    public function upload(Request $request)
    {
        $uid = $request->uid;
        Storage::disk('public_path')->putFileAS('myLike', $request->file('photo'), $uid);
        return env('APP_URL') . '/myLike/?uid=' . $uid;
    }
}
