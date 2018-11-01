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
        TmallCarGame::create($request->all());

        return 'true';
    }

    public function carRank()
    {
        
    }

    public function packetRank()
    {
        
    }
}
