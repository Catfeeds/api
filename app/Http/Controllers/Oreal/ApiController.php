<?php

namespace App\Http\Controllers\Oreal;


use App\Http\Controllers\Controller;
use App\Models\OrealUser;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function register(Request $request)
    {
        $user = new OrealUser();
        $user->username = $request->username;
        $user->department = $request->department;
        $user->email = $request->email;
        $user->date = $request->date;
        $user->save();
        return response()->json([
            'status' => true,
            'user' => $user
        ]);
    }
}
