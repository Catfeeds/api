<?php

namespace App\Http\Controllers\Ksc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AudioController extends Controller
{
    public function index($audio)
    {
        $path = 'upload/audios/'.$audio;
        return view('ksc/audio',compact('path'));
    }
}
