<?php

namespace App\Http\Controllers\Castrol;

use App\Models\Castrol;
use App\Models\Coord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CastrolController extends Controller
{
    /**
     * @param Request $request
     * @return string
     *
     * CASTROL现场签到合成图片
     */
    public function upload(Request $request)
    {
        $path = Storage::disk('public_path')
            ->putFile('castrol', $request->file('file'));
        $bg = Image::make(public_path('res/castrol/img/castrol-bg.png'));
        $img = Image::make($request->file('photo'))->resize(16, 16);

        //获取位置坐标
        $index = Redis::get('castrol-index');
        $coord = Coord::find($index);
        $bg->insert($img, 'top-left', $coord->x, $coord->y)
            ->save();
        Redis::incr('castrol-index');

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
