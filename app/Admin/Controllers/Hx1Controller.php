<?php

namespace App\Admin\Controllers;

use App\Models\Hx1;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class Hx1Controller extends Controller
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

            $content->header('header');
            $content->description('description');

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

            $content->header('header');
            $content->description('description');

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

            $content->header('header');
            $content->description('description');

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
        return Admin::grid(Hx1::class, function (Grid $grid) {
            $grid->actions(function ($actions) {
                $actions->disableDelete();
                $actions->disableEdit();
            });
//            $grid->disableRowSelector();
            $grid->disableActions();
            $grid->disableCreation();

            $grid->filter(function ($filter) {
                // 去掉默认的id过滤器
                $filter->disableIdFilter();

                // 在这里添加字段过滤器
                $filter->equal('phone', '手机号');

            });

            $grid->id('ID')->sortable();
            $grid->column('name', '姓名');
            $grid->column('phone', '手机号');
            $grid->column('company', '公司名');
            $grid->column('sms', '是否发送短信')->display(function () {
                return $this->sms ? '是' : '否';
            });
            $grid->column('sign', '是否签到')->switch();
            $grid->created_at('录入时间');
//            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Hx1::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->switch('sign','是否签到');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
