<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aia;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\InfoBox;
use Illuminate\Support\Facades\Redis;

class AiaindexController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Dashboard');
            $content->description('Description...');



            $content->row(function (Row $row) {
                $infoBox1 = new InfoBox('分享次数', 'share', 'aqua', '', Redis::get('aiaShare'));
                $row->column(2, $infoBox1);

                $users = Aia::count();
                $infoBox2 = new InfoBox('总人数', 'users', 'red', '', $users);
                $row->column(2, $infoBox2);


            });
        });
    }}
