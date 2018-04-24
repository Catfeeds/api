<?php

namespace App\Http\Controllers\Tmail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TmailController extends Controller
{
    public function index()
    {
        return view('tmail.admin');
    }
}
