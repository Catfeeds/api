<?php

namespace App\Admin\Controllers;

use App\Models\Mc;
use App\Models\Mclog;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class MgController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('兑奖信息');
            $content->description('兑奖日志');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('兑奖信息');
            $content->description('兑奖日志');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header('兑奖信息');
            $content->description('兑奖日志');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Mclog::class, function (Grid $grid) {
            $grid->model()->orderBy('created_at', 'desc');

            $grid->actions(function ($actions) {
                $actions->disableDelete();
                $actions->disableEdit();
            });
            $grid->disableRowSelector();
            $grid->disableActions();
            $grid->disableCreation();

            $grid->filter(function($filter){

                // 去掉默认的id过滤器
                $filter->disableIdFilter();

            });

            $grid->id('ID')->sortable();
            $grid->column('姓名')->display(function () {
                $user = Mc::where('openid', $this->openid)->first();
                return $user->username;
            });
            $grid->column('手机号')->display(function () {
                $user = Mc::where('openid', $this->openid)->first();
                return $user->phone;
            });
            $grid->column('积分变动')->display(function () {
                return $this->type . $this->handle . $this->coin;
            });
            $grid->created_at('时间')->sortable();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Mclog::class, function (Form $form) {
        });
    }
}
