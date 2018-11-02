<?php

namespace App\Http\Controllers\Tmall;

use App\Events\GameTmall;
use App\Models\TmallCar;
use App\Models\TmallCarGame;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    public function register(Request $request)
    {
        $path = $request->input('path');
        return view('tmall.car', compact('path'));
    }

    public function store(Request $request)
    {
        $user = TmallCar::firstOrCreate(['phone' => $request->input('phone')],[
            'name' => $request->input('name'),
            'sex' => $request->input('sex'),
            'taobao' => $request->input('taobao')
        ]);
        event(new GameTmall($user->id, $request->input('name'), $request->input('path')));

        return 'true';
    }

    public function upload(Request $request)
    {
        $r = new TmallCarGame();
        $r->path = $request->input('path');
        $r->score = $request->input('score');
        $r->tmall_car_id = $request->input('id');
        $r->save();

        return $r;
    }

    public function carRank()
    {
        
    }

    public function packetRank()
    {
        
    }
}
