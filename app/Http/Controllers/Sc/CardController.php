<?php

namespace App\Http\Controllers\Sc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CardController extends Controller
{
    public function card(Request $request)
    {
        $path = $request->input('path');
        $type = $request->input('type') + 1;
        $country = '';
        if ($type == 1) {
            $country = '英国';
        } elseif ($type == 2) {
            $country = '土耳其';
        } elseif ($type == 3) {
            $country = '法国';
        } elseif ($type == 4) {
            $country = '马尔代夫';
        } elseif ($type == 5) {
            $country = '美国';
        } elseif ($type == 6) {
            $country = '希腊';
        }
        $js = \EasyWeChat::officialAccount();
        return view('sc.card', compact('path', 'type', 'country', 'js'));
    }
}
