<?php

namespace App\Http\Controllers\PingAn;

use App\Models\PingAn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    public function user(Request $request)
    {
        $user = PingAn::orWhere('phone', $request->phone)->first();
        if (is_null($user)) {
            $user = new PingAn();
        }
        $image = $request->input('image');
        $image = str_replace('data:image/jpeg;base64,', '' , $image);
        $image = str_replace('data:image/png;base64,', '' , $image);
        $image = str_replace('data:image/jpg;base64,', '' , $image);
        $image = base64_decode($image);
        $user->company = $request->company;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();
        $res = Storage::disk('h5-touch')->put('pingAn/'. $user->id .'.png', $image);

        return (string)$res;
    }
}
