<?php

namespace App\Admin\Controllers;

use App\Models\Comment;

use App\Models\Topic;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class CommentController extends Controller
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

            $content->header('评论互动审核');
            $content->description('可以修改评论审核状态和点赞数量，增加评论');

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

            $content->header('评论互动审核');
            $content->description('修改');

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

            $content->header('评论互动审核');
            $content->description('增加');

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
        return Admin::grid(Comment::class, function (Grid $grid) {
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
            $grid->id('ID')->sortable();
            $grid->column('topic_id', '栏目主题')->display(function ($topic_id) {
               $topic = Topic::find($topic_id);
               return $topic->topic;
            });
            $grid->column('nickname', '昵称');
            $grid->column('comment', '评论内容');
            $grid->column('zan', '点赞数量')->editable()->sortable();
            $grid->column('check', '是否审核')->switch();

            $grid->created_at('发布时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Comment::class, function (Form $form) {
            $form->hidden('openid')->default('admin');
            $form->hidden('nickname')->default('admin');
            $form->select('topic_id', '主题栏目')->options(function () {
               $topics = Topic::all();
               $a = array();
               foreach ($topics as $topic) {
                   $a[$topic->id] = $topic->topic;
               }
               return $a;
            })->rules('required');
            $form->text('comment', '评论内容');
            $form->number('zan', '点赞数量');
            $form->switch('check', '是否审核');
            $form->display('created_at', '创建时间');
        });
    }
}
