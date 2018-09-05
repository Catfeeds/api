<?php

namespace App\Http\Controllers;

use App\Models\Fudan;
use Illuminate\Http\Request;

class FudanController extends Controller
{
    public function info(Request $request)
    {
        $item = new Fudan();
        $item->username = $request->username;
        $item->teacher = $request->teacher;
        $item->bless = $request->bless;
        $item->university = $request->university;
        $item->department = $request->department;
        $item->save();

        return 'true';
    }

    public function index()
    {
        $js = \EasyWeChat::js();
        return view('fudan', compact('js'));
    }
}
