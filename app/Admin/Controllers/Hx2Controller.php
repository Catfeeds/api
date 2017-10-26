<?php

namespace App\Admin\Controllers;

use App\Models\Hx2;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class Hx2Controller extends Controller
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
        return Admin::grid(Hx2::class, function (Grid $grid) {
            $grid->actions(function ($actions) {
                $actions->disableDelete();
                $actions->disableEdit();
            });
//            $grid->disableRowSelector();
            $grid->disableActions();
//            $grid->disableCreation();

            $grid->filter(function ($filter) {
                // 去掉默认的id过滤器
                $filter->disableIdFilter();

                // 在这里添加字段过滤器
                $filter->equal('phone', '手机号');

            });
            $grid->id('ID')->sortable();
            $grid->column('name','姓名');
            $grid->column('phone','手机号码');
            $grid->column('company','公司名称');
            $grid->column('check','是否审核')->switch();
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
        return Admin::form(Hx2::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name','姓名');
            $form->text('phone','手机号码');
            $form->text('company','公司名称');
            $form->switch('check','是否审核');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
