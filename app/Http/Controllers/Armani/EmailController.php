<?php

namespace App\Http\Controllers\Armani;

use App\Mail\Armani;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function mail(Request $request)
    {
        Mail::to($request->email)->send(new Armani(public_path('upload').'/'.$request->path));
        return 'true';
    }
}
