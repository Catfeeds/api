<?php

namespace App\Http\Controllers\Tmall;

use App\Events\GameTmall;
use App\Models\TmallCar;
use App\Models\TmallCarGame;
use App\Models\TmallCarTime;
use Carbon\Carbon;
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
        $user = TmallCar::firstOrCreate(['phone' => $request->input('phone')], [
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

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * 获取赛车游戏排行榜
     */
    public function carRank()
    {
        $rank = TmallCar::select(['name', 'car'])
            ->where('car', '!=', '00:00:000')
            ->orderBy('car')
            ->limit(5)
            ->get();
        return response()->json([
            'data' => $rank
        ]);
    }

    public function packetRank(Request $request)
    {
        $path = $request->input('path');
        $now = Carbon::now();
        if ($now->gt(Carbon::today()->addHours(20))) {
            //不在时间段
            return response()->json([
                'status' => 0,
                'time' => [],
                'data' => []
            ]);
        } elseif ($now->gt(Carbon::today()->addHours(18))) {
            //18-19
            $data = $this->rank(18, 19, $path);
            return response()->json([
                'status' => 1,
                'time' => [18, 19],
                'data' => $data
            ]);
        } elseif ($now->gt(Carbon::today()->addHours(16))) {
            //16-17
            $data = $this->rank(16, 17, $path);
            return response()->json([
                'status' => 1,
                'time' => [16, 17],
                'data' => $data
            ]);
        } elseif ($now->gt(Carbon::today()->addHours(14))) {
            //14-15
            $data = $this->rank(14, 15, $path);
            return response()->json([
                'status' => 1,
                'time' => [14, 15],
                'data' => $data
            ]);
        } elseif ($now->gt(Carbon::today()->addHours(12))) {
            //12-13
            $data = $this->rank(12, 13, $path);

            return response()->json([
                'status' => 1,
                'time' => [12, 13],
                'data' => $data
            ]);
        }

        return response()->json([
            'status' => 0,
            'time' => [],
            'data' => []
        ]);
    }

    public function rank($start, $end, $path)
    {
        $data = TmallCarGame::with('user')
            ->select(['tmall_car_id', 'score'])
            ->whereBetween('created_at', [
                Carbon::today()->addHours($start), Carbon::today()->addHours($end)
            ])
            ->where('path', $path)
            ->orderByDesc('score')
            ->get()
            ->unique('tmall_car_id')
            ->values()
            ->take(5);
        return $data;
    }
}
