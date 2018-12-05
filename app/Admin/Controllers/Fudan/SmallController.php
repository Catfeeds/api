<?php

namespace App\Admin\Controllers\Fudan;

use App\Models\FudanSmall;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class SmallController extends Controller
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
            ->header('小名单')
            ->description('description')
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
        $grid = new Grid(new FudanSmall);
        $grid->disableExport();
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            // 在这里添加字段过滤器
            $filter->like('username', '姓名');
            $filter->like('grade', '班级');
            $filter->like('phone', '手机号');
            $filter->like('seat', '座位号');

        });
        $grid->id('Id')->sortable();
        $grid->username('姓名');
        $grid->phone('手机号');
        $grid->grade('班级');
        $grid->seat('座位号');
        $grid->sign('是否签到')->sortable()->display(function ($sign) {
            return $sign ? 'true' : 'false';
        });
        $grid->created_at('录入时间')->sortable();

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
        $show = new Show(FudanSmall::findOrFail($id));

        $show->id('Id');
        $show->username('Username');
        $show->phone('Phone');
        $show->grade('Grade');
        $show->seat('Seat');
        $show->user('User');
        $show->sign('Sign');
        $show->print('Print');
        $show->message('Message');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new FudanSmall);

        $form->text('username', '姓名');
        $form->mobile('phone', '手机号');
        $form->text('grade', '班级');
        $form->text('seat', '座位号');
        $form->switch('print', '是否手动打印');
        $form->display('user', '录入人');
        $form->submitted(function (Form $form) {
            $form->user = \Admin::user()->name;
        });
        return $form;
    }
}
