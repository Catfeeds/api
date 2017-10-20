<?php

namespace App\Http\Controllers\Hx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HxController extends Controller
{
    public function sign(Request $request)
    {
        $id= $request->id;
        return response()->json([
            'name' => '张国荣',
            'company' => '上海触界数码科技'.$id
        ]);
    }
}
