<?php

namespace App\Http\Controllers\Newzealand;

use App\Mail\VideoDown;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function seadEmail(Request $request)
    {
        Mail::to($request->input('email'))->send(new VideoDown($request->input('path')));

        return 'true';
    }
}
