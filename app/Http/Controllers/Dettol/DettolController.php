<?php

namespace App\Http\Controllers\Dettol;

use App\Models\Dettol;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DettolController extends Controller
{
    public function index()
    {

    }

    public function api(Request $request)
    {
        $dettol = new Dettol();
        $dettol->openid = $request->openid;
        $dettol->score = $request->score;
        $dettol->save();

        $rank = Dettol::where('score', '<', $request->score)->count();
        $rank += 666;

        return $rank;
    }
}
