<?php

namespace App\Http\Controllers\Mini;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;

class IndexController extends Controller
{
    public $mini;

    public function __construct(Application $app)
    {
        $this->mini = $app->mini_program;
    }

    public function index(Request $request)
    {
        $val = $this->mini->sns->getSessionKey($request->code);

        return $val->toJson();
    }
}
