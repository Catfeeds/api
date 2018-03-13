<?php

namespace App\Admin\Controllers;

use App\Models\Topic;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class TopicController extends Controller
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

            $content->header('栏目主题');
            $content->description('前端会显示最后一个添加的栏目主题和对应栏目的评论');

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

            $content->header('栏目主题');
            $content->description('编辑');

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

            $content->header('栏目主题');
            $content->description('创建');

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
        return Admin::grid(Topic::class, function (Grid $grid) {
            $grid->model()->orderBy('created_at', 'desc');

            $grid->actions(function ($actions) {
                $actions->disableDelete();
//                $actions->disableEdit();
            });
//            $grid->disableRowSelector();
//            $grid->disableActions();
//            $grid->disableCreation();

            $grid->filter(function($filter){

                // 去掉默认的id过滤器
                $filter->disableIdFilter();

            });

//            $grid->id('ID')->sortable();
            $grid->column('topic', '栏目主题');
            $grid->column('enabled', '是否显示')->switch();
            $grid->created_at('创建时间')->sortable();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Topic::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('topic', '栏目主题');
            $form->switch('enabled','是否显示');
            $form->display('created_at', '创建时间');
        });
    }
}
