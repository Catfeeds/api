<?php

namespace App\Http\Controllers\Tmail;

use App\Models\Tmail;
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
        return view('tmail.admin', compact('users'));
    }
}
