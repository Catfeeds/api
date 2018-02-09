<?php

namespace App\Http\Controllers\Cowin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ApiController extends Controller
{
    public function image(Request $request)
    {
        $url = $request->avatar;
        $img = Image::make($url)->resize(45,45)
            ->encode('data-url');
        return $img;
    }
}
