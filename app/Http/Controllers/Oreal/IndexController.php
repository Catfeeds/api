<?php

namespace App\Http\Controllers\Oreal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function register()
    {
        return view('oreal.register');
    }
}
