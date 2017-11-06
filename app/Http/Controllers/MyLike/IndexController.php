<?php

namespace App\Http\Controllers\MyLike;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;

class IndexController extends Controller
{
    public $js;

    /**
     * AliController constructor.
     * @param Application $app
     */

    public function __construct(Application $app)
    {
        $this->js = $app->js;
    }

    public function index(Request $request)
    {
        $js = $this->js;
        $uid = $request->uid;
        return view('myLike.index', compact('uid', 'js'));
    }
}
