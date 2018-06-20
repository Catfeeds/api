<?php

namespace App\Http\Controllers\Fed;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FedController extends Controller
{
    public function index(Request $request)
    {
        $path = $request->path;
        $js= \EasyWeChat::js();
        return view('fed',compact('path','js'));
    }

    public function api(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
        ]);
        $path = Storage::disk('public_path')->putFile('fed', $request->file('image'));

        return env('APP_URL') . '/fed/index?path=' . $path;
    }
}
