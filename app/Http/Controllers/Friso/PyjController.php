<?php

namespace App\Http\Controllers\Friso;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PyjController extends Controller
{
    public function index($path)
    {
        return view('friso.pyj', compact($path));
    }
}
