<?php

namespace App\Http\Controllers\Tmall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenieController extends Controller
{
    public function index()
    {
        return view('tmall.sign');
    }
}
