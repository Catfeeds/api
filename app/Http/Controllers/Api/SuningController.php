<?php

namespace App\Http\Controllers\Api;

use App\Models\Suning;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Validator;

class SuningController extends Controller
{
    public function user(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'username' => 'required|max:10',
            'image' => 'required',
            'job' => 'required|max:20',
            'company' => 'required|max:20'
        ]);
        if ($validator->fails()){
            return response()->json([
                'result' => false
            ]);
        }
        $path = Storage::disk('public_path')->putFile('suning', $request->image);
        $suning = new Suning;
        $suning->username = $request->username;
        $suning->job = $request->job;
        $suning->company = $request->company;
        $suning->avatar = env('APP_URL') . '/' . $path;
        $suning->save();

        return response()->json([
            'result' => true
        ]);
    }
}
