<?php

namespace App\Http\Controllers\Clari;

use App\Models\Clari;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClariController extends Controller
{
    /*
     * 科莱丽 20180907
     */
    public function index($id)
    {
        $user = Clari::find($id);
        return view('clari',compact('user'));
    }
}
