<?php

namespace App\Http\Controllers\Tmail;

use App\Models\Tmail;
use App\Models\Tmaillog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = Tmail::all();
        $name = \Auth::user()->name;
        $reward = Tmaillog::where('reward', $name)->orderBy('created_at', 'desc')->get();
        return view('tmail.admin', compact('users', 'reward'));
    }
}
