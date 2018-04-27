<?php

namespace App\Admin\Controllers;

use App\Models\FrisoLoc;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class FrisolocController extends Controller
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
        return Admin::grid(FrisoLoc::class, function (Grid $grid) {
            $grid->actions(function ($actions) {
                $actions->disableDelete();
//                $actions->disableEdit();
            });
            $grid->disableRowSelector();
//            $grid->disableActions();
            $grid->disableCreation();

            $grid->filter(function($filter){

                // 去掉默认的id过滤器
                $filter->disableIdFilter();

            });

            $grid->id('ID')->sortable();
            $grid->column('location', '场次');
            $grid->column('start', '开始时间');
            $grid->column('end', '结束时间');
            $grid->column('type1', '储蓄罐');
            $grid->column('type2','行李箱');
            $grid->column('type3', '折叠推车');
            $grid->column('type4','滑板车');
            $grid->column('type5', '餐具套装');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(FrisoLoc::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->display('location', '场次');
            $form->date('start', '开始时间');
            $form->date('end', '结束时间');
            $form->number('type1','储蓄罐');
            $form->number('type2','行李箱');
            $form->number('type3','折叠推车');
            $form->number('type4','滑板车');
            $form->number('type5','餐具套装');
        });
    }
}
