<?php

namespace App\Http\Controllers\Tmall;

use App\Models\TmallGenie;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
                    'id' => $genie->id,
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

    public function teams()
    {
        $teams = TmallGenie::where('end', null)->get();

        foreach ($teams as $genie) {
            $now = Carbon::now()->addMinutes($genie->punish);
            $minutes = intval($now->copy()->diffInSeconds($genie->created_at) / 60);
            $seconds = $now->copy()->diffInSeconds($genie->created_at) % 60;
            if ($minutes < 10) {
                $minutes = '0' . $minutes;
            }
            if ($seconds < 10) {
                $seconds = '0' . $seconds;
            }
            $genie->time = $minutes . ':' . $seconds;
        }
        return response()->json($teams);
    }

    public function punish($id)
    {
        $genie = TmallGenie::find($id);
        $genie->punish += 10;
        $genie->save();

        return 'true';
    }

    public function rank()
    {
        $users = TmallGenie::where('end', '!=', null)
            ->where('created_at', '>=', Carbon::today())
            ->get();
        foreach ($users as $key =>$value) {
            $created_at = Carbon::createFromFormat('Y-m-d H:i:s', $users[$key]->created_at);
            $end = Carbon::createFromFormat('Y-m-d H:i:s', $users[$key]->end)->addMinutes($users[$key]->punish);
            $minutes = intval($created_at->copy()->diffInSeconds($end) / 60);
            if ($minutes <10) {
                unset($users[$key]);
            }else {
                $seconds = $created_at->copy()->diffInSeconds($end) % 60;
                $users[$key]->realtime = $created_at->copy()->diffInSeconds($end);
                $users[$key]->time = $minutes . ':' . $seconds;
            }

        }
        $col = $users->sortBy('realtime');
        return response()->json([
            'data' => $col->values()
//            'data' => [
//                [
//                    'name' => '',
//                    'id' => '',
//                    'time' => ''
//                ],                [
//                    'name' => '',
//                    'id' => '',
//                    'time' => ''
//                ],                [
//                    'name' => '',
//                    'id' => '',
//                    'time' => ''
//                ],                [
//                    'name' => '',
//                    'id' => '',
//                    'time' => ''
//                ],                [
//                    'name' => '',
//                    'id' => '',
//                    'time' => ''
//                ],
//            ]
        ]);
    }

    public function album()
    {
        $ds = Storage::disk('unitytouch')->allFiles('Zzc/Projects/TianMaoCenterControl');
        arsort($ds);
        return view('tmall.album', compact('ds'));
    }
}
