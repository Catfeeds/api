<?php

namespace App\Http\Controllers\Friso;

use App\Models\FrisoUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = FrisoUser::create($request->all());

        return $user;
    }
}
