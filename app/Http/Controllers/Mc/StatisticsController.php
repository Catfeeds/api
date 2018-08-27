<?php

namespace App\Http\Controllers\Mc;

use App\Models\Goods;
use App\Models\Mclog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    public function everyday()
    {
        $carbon = Carbon::create(2018, 8, 31, 0, 0, 0, 'Asia/Shanghai');
        $goods = Goods::all();
        $lists = [];
        for ($i = 0; $i < 10; $i++) {
            $list['日期'] = $carbon->copy()->format('Y-m-d');
            foreach ($goods as $item) {
                $count = Mclog::where('type', $item->name)
                    ->where('created_at', '>=', $carbon)
                    ->where('created_at', '<', $carbon->copy()->addDay())
                    ->sum('num');
                $list[$item->name] = $count;
            }
            $carbon->addDay();
            $lists[$i] = $list;
        }
        $keys = [];
        foreach ($lists[0] as $key => $value) {
            $keys[] = $key;
        }
        return view('Mg.statistics', compact('lists', 'keys'));
    }

    public function setting()
    {
        $goods = Goods::all();
        $total['category'] = '总库存数量';
        $surplus['category'] = '剩余库存数量';
        $yet['category'] = '已发礼品数量';
        $wait['category'] = '可发礼品数量';

        foreach ($goods as $item) {
            $wait[$item->name] = $item->amount;
            $total[$item->name] = config('gift_mc.' . $item->name);
            $yet[$item->name] = Mclog::where('type', $item->name)->sum('num');
            $surplus[$item->name] = config('gift_mc.' . $item->name) - $yet[$item->name];
        }
        return view('Mg.setting',compact('total', 'wait', 'yet', 'surplus'));
    }

    public function searchIndex()
    {
        return view('Mg.search');
    }
}
