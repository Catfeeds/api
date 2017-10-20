<?php

namespace App\Admin\Controllers;

use App\Models\Aia;

use App\Models\AiaScore;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class AiaController extends Controller
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

            $content->header('用户信息');
            $content->description('信息列表');

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
        return Admin::grid(Aia::class, function (Grid $grid) {

            $grid->actions(function ($actions) {
                $actions->disableDelete();
                $actions->disableEdit();
            });
//            $grid->disableRowSelector();
            $grid->disableActions();
            $grid->disableCreation();

            $grid->filter(function($filter){

                // 去掉默认的id过滤器
                $filter->disableIdFilter();

                // 在这里添加字段过滤器
                $filter->between('created_at', '首次进入')->datetime();

            });

            $grid->id('ID')->sortable();

            $grid->column('openid', '微信id');
            $grid->column('phone', '手机号')->sortable();
            $grid->column('totalScore', '总分')->sortable();
            $grid->column('topScore', '最高分')->sortable();
            $grid->column('totalTime', '时长（分）')->sortable()->display(function ($totalTime) {
                return floor($totalTime / 60);
            });
            $grid->column('游戏次数')->display(function (){
                return AiaScore::where('openid', $this->openid)->count();
            });
            $grid->column('通关次数')->display(function (){
                return AiaScore::where('openid',$this->openid)
                    ->where('score','>=','')->count();
            });
            $grid->created_at('首次进入')->sortable();
            $grid->updated_at('上次游戏')->sortable();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Aia::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
