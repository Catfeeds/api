<?php

namespace App\Http\Controllers\Sc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CardController extends Controller
{
    public function card(Request $request)
    {
        $path = $request->input('path');
        $type = $request->input('type');

        return view('sc.card', compact('path', 'type'));
    }
}
