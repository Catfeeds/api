<?php

namespace App\Http\Controllers\Tmall;

use App\Models\TmallGenie;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenieController extends Controller
{
    public function index()
    {
        return view('tmall.sign');
    }

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

    public function genieTime()
    {
        $genie = TmallGenie::where('end', null)
            ->orderBy('created_at')
            ->first();
        $now = Carbon::now()->addMinutes($genie ? $genie->punish : 0);
        return response()->json([
            'code' => $genie ? 1 : 0,
            'genie' => $genie ? [
                'id' => $genie->id,
                'name' => $genie->name . $genie->id,
                'time' => intval($now->copy()->diffInSeconds($genie->created_at) / 60) . ':' . $now->copy()->diffInSeconds($genie->created_at) % 60
            ] : null,
        ]);
    }

    public function confirm($id)
    {
        $genie = TmallGenie::find($id);
        $genie->end = Carbon::now();
        $genie->save();

        $now = Carbon::now()->addMinutes($genie ? $genie->punish : 0);
        return response()->json([
            'code' => $genie ? 1 : 0,
            'genie' => $genie ? [
                'name' => $genie->name,
                'time' => intval($now->copy()->diffInSeconds($genie->created_at) / 60) . ':' . $now->copy()->diffInSeconds($genie->created_at) % 60
            ] : null,
        ]);
    }
}
