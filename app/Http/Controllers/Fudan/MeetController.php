<?php

namespace App\Http\Controllers\Fudan;

use App\Models\FudanLog;
use App\Models\FudanSmall;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeetController extends Controller
{
    public function meeting()
    {
        return 'https://api.shanghaichujie.com/api/qrcode/generate?text';
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * 手动队列打印，根据录入电脑区分
     */
    public function queue(Request $request)
    {
        $user = $request->input('user');

        $a = FudanSmall::where('user', $user)
            ->where('print', 1)
            ->first();

        $status = 0;

        if (!is_null($a)) {
            $status = 1;
            $a->print = 0;
            $a->save();
        }
        return response()->json([
            'status' => $status,
            'data' => $a
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * 扫码签到
     */
    public function sign(Request $request)
    {
        $phone = $request->input('phone');
        $type = $request->input('type');
        $a = FudanSmall::where('phone', $phone)->first();

        $status = 0; //0为查不到数据，1为签到成功，2为重复签到

        if (!is_null($a)) {
            $status = 2;
            if ($a->sign === 0) {
                $a->sign = 1;
                $a->save();
                $status = 1;
                //记录日志
                $log = new FudanLog();
                $log->username = $a->username;
                $log->type = $type;
                $log->grade = $a->grade;
                $log->save();
            }

        }
        return response()->json([
            'status' => $status,
            'data' => $a
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * 返回所有已经签到的人用于抽奖
     */
    public function all()
    {
        $a = FudanSmall::where('sign', 1)->get();

        return response()->json([
            'data' => $a
        ]);
    }
}
