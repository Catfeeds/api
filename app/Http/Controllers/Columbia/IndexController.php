<?php

namespace App\Http\Controllers\Columbia;

use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public $js;

    /**
     * IndexController constructor.
     * @param $app
     */
    public function __construct(Application $app)
    {
        $this->js = $app;
    }

    public function index(Request $request)
    {
        $path = $request->path;
        $js = $this->js;
        return view('columbia.index', compact('path', 'js'));
    }
}
