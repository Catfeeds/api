<?php

namespace App\Http\Controllers\Tmall;

use App\Events\GameTmall;
use App\Models\TmallCarGame;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    public function register()
    {
        event(new GameTmall(1, 'test', 'suzhou'));

        return 'true';
    }

    public function store(Request $request)
    {

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
