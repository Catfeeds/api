<?php

namespace App\Http\Controllers\Longines;

use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Longines;
use Illuminate\Support\Facades\Redis;

class HelperController extends Controller
{
    public $js;

    /**
     * HelperController constructor.
     * @param $js
     */
    public function __construct(Application $js)
    {
        $this->js = $js->js;
    }

    public function socket($location)
    {
        event(new Longines($location));
        return 'true';
    }

    public function share(Request $request)
    {
        $js = $this->js;
        $text = $request->text;
        $username = $request->username;
        $scene = $request->scene;
        Redis::incr('longines_share');
        return view('longines.share', compact('text', 'username', 'scene', 'js'));
    }
}
