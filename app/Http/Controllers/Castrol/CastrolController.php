<?php

namespace App\Http\Controllers\Castrol;

use App\Models\Castrol;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CastrolController extends Controller
{
    public function upload(Request $request)
    {

        $path = Storage::disk('public_path')
            ->putFile('castrol', $request->photo);

        $castrol = new Castrol();
        $castrol->path = $path;
        $castrol->save();

        return 'true';
    }

    public function index()
    {
        $paths = Castrol::select('path')->get();
//        dd($paths);
        return view('castrol', compact('paths'));
    }
}
