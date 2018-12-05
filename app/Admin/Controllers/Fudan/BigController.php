<?php

namespace App\Admin\Controllers\Fudan;

use App\Models\FudanBig;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class BigController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('大名单')
            ->description('查询往届学生')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed   $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new FudanBig);
        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableView();
        });
        $grid->disableExport();
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            // 在这里添加字段过滤器
            $filter->like('project', '项目名');
            $filter->like('username', '姓名');
            $filter->like('grade', '班级');
            $filter->like('en_name', '英文名');
            $filter->like('sign_h5', '报名方式');
            $filter->like('sign_class', '报名班级');
            $filter->like('color', '吊牌颜色');

        });
        $grid->id('Id');
        $grid->project('项目名');
        $grid->username('姓名');
        $grid->grade('班级');
        $grid->en_name('英文名');
        $grid->sign_h5('报名方式');
        $grid->sign_class('报名班级');
        $grid->color('吊牌颜色');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(FudanBig::findOrFail($id));

        $show->id('Id');
        $show->project('Project');
        $show->username('Username');
        $show->class('Class');
        $show->en_name('En name');
        $show->sign_h5('Sign h5');
        $show->sign_class('Sign class');
        $show->color('Color');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new FudanBig);

        $form->text('project', '项目名');
        $form->text('username', '姓名');
        $form->text('grade', '班级');
        $form->text('en_name', '英文名');
        $form->text('sign_h5', '报名方式');
        $form->text('sign_class', '报名班级');
        $form->color('color', '颜色');

        return $form;
    }
}
