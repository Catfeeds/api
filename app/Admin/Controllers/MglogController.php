<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Mclog;
use Carbon\Carbon;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\InfoBox;

class MglogController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Dashboard');
            $content->description('Description...');

            $content->row(function (Row $row) {
                $goods = Goods::where('created_at', '>=', Carbon::now());
                foreach ($goods as $good) {
                    $infoBox = new InfoBox($good->name . '库存剩余', 'good', 'aqua', '', $good->amount);
                    $row->column(2, $infoBox);
                    $count = Mclog::where('type', $good->name)->get()->count();
                    $infoBox = new InfoBox($good->name . '兑换数量', 'users', 'green', '', $count);
                    $row->column(2, $infoBox);
                }
            });
        });
    }
}
