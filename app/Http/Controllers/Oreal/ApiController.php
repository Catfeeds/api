<?php

namespace App\Http\Controllers\Oreal;


use App\Http\Controllers\Controller;
use App\Models\OrealUser;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function register(Request $request)
    {
        $user = new OrealUser();
        $user->username = $request->username;
        $user->department = $request->department;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        return response()->json([
            'status' => true,
            'user' => $user
        ]);
    }
}
