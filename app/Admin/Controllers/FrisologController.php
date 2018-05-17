<?php

namespace App\Admin\Controllers;

use App\Models\Friso;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class FrisologController extends Controller
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
        return Admin::grid(Friso::class, function (Grid $grid) {
            $grid->model()->orderBy('created_at','desc');
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
                $filter->equal('phone', '手机号');
            });

            $grid->id('ID')->sortable();
            $grid->column('nickname','称呼');
            $grid->column('phone','手机号');
            $grid->column('location', '场次');
            $grid->column('reward', '兑换礼品')->display(function () {
                switch ($this->reward) {
                    case ('type1') :
                        $reward = '储蓄罐';
                        break;
                    case ('type2'):
                        $reward = '行李箱';
                        break;
                    case ('type3'):
                        $reward = '折叠推车';
                        break;
                    case ('type4'):
                        $reward = '滑板车';
                        break;
                    case ('type5'):
                        $reward = '餐具套装';
                        break;
                    default:
                        $reward = null;
                }
                return $reward;
            });
            $grid->column('status','是否核销');
            $grid->created_at('兑换时间')->sortable();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Friso::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
