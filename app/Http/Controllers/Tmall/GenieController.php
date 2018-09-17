<?php

namespace App\Http\Controllers\Tmall;

use App\Models\TmallGenie;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenieController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * 战队登记
     */
    public function index()
    {
        return view('tmall.sign');
    }

    /**
     * @param Request $request
     * @return mixed
     *
     * 提交登记信息
     */
    public function sign(Request $request)
    {
        $phones = $request->input('phones');
        $name = $request->input('name');

        $genie = new TmallGenie();
        $genie->name = $name;
        $genie->phones = $phones;
        $genie->save();

        return $genie->id;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * 返回当前战队信息
     */
    public function genieTime()
    {
        $genie = TmallGenie::where('end', null)
            ->orderBy('created_at')
            ->first();
        if ($genie) {
            $now = Carbon::now()->addMinutes($genie->punish);
            $minutes = intval($now->copy()->diffInSeconds($genie->created_at) / 60);
            $seconds = $now->copy()->diffInSeconds($genie->created_at) % 60;
            if ($minutes < 10) {
                $minutes = '0' . $minutes;
            }
            if ($seconds < 10) {
                $seconds = '0' . $seconds;
            }
            return response()->json([
                'code' => 1,
                'genie' => [
                    'name' => $genie->name,
                    'time' => $minutes . ':' . $seconds
                ],
            ]);
        }
        return response()->json([
            'code' => 0,
            'genie' => null,
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     *
     * 点击任务完成
     */
    public function confirm($id)
    {
        $genie = TmallGenie::find($id);
        $genie->end = Carbon::now();
        $genie->save();

        if ($genie) {
            $now = Carbon::now()->addMinutes($genie->punish);
            $minutes = intval($now->copy()->diffInSeconds($genie->created_at) / 60);
            $seconds = $now->copy()->diffInSeconds($genie->created_at) % 60;
            if ($minutes < 10) {
                $minutes = '0' . $minutes;
            }
            if ($seconds < 10) {
                $seconds = '0' . $seconds;
            }
            return response()->json([
                'code' => 1,
                'genie' => [
                    'name' => $genie->name,
                    'time' => $minutes . ':' . $seconds
                ],
            ]);
        }
        return response()->json([
            'code' => 0,
            'genie' => null,
        ]);
    }

    public function control()
    {
        return view('tmall.control');
    }
}
