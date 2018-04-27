<?php

namespace App\Http\Controllers\Friso;

use App\Models\FrisoLoc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class H5Controller extends Controller
{
    public function index(Request $request)
    {
        $openid = $request->openid;

        $locs = FrisoLoc::where('start', '<=', Carbon::now())
            ->where('end', '>=', Carbon::now())
            ->get();

//        $type1 = $locs->type1;
//        $type2 = $locs->type2;
//        $type3 = $locs->type3;
//        $type4 = $locs->type4;
//        $type5 = $locs->type5;
//        $count = $type1 + $type2 + $type3 + $type4 + $type5;
//        $rand = mt_rand(0, $count);
//        if ($rand < $type1) {
//            $item = 1;
//        } elseif ($rand < $type1 + $type2) {
//            $item = 2;
//        } elseif ($rand < $type1 + $type2 + $type3) {
//            $item = 3;
//        } elseif ($rand < $type1 + $type2 + $type3 + $type4) {
//            $item = 4;
//        } elseif ($rand <= $count) {
//            $item = 5;
//        }
        $item =5;
        return view('friso.h5', compact('openid', 'locs', 'item'));
    }
}
