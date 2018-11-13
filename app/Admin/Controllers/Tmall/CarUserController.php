<?php

namespace App\Admin\Controllers\Tmall;

use App\Models\TmallCar;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use function foo\func;

class CarUserController extends Controller
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
            ->header('赛车游戏')
            ->description('用户信息')
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
        $grid = new Grid(new TmallCar);
        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->like('phone', '根据手机号查询');
            $filter->in('path', '场地')->multipleSelect([
                'suzhou' => 'suzhou',
                'hangzhou' => 'hangzhou',
                'wuhan' => 'wuhan',
                'chengdu' => 'chengdu'
            ]);
            $filter->notIn('car', '过滤掉')->multipleSelect([
                '00:00:000' => '00:00:000',
            ]);


        });
        $grid->model()->orderBy('created_at', 'desc');
        $grid->disableCreateButton();
        $grid->id('Id')->sortable();
        $grid->name('Name');
        $grid->phone('Phone');
        $grid->taobao('Taobao');
        $grid->sex('Sex');
        $grid->path('Path');
        $grid->car('赛车游戏时间')->sortable();
        $grid->created_at('Created at')->sortable();

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
        $show = new Show(TmallCar::findOrFail($id));

        $show->id('Id');
        $show->name('Name');
        $show->phone('Phone');
        $show->taobao('Taobao');
        $show->sex('Sex');
        $show->car('Car');
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
        $form = new Form(new TmallCar);

        $form->display('name', 'Name');
        $form->display('phone', 'Phone');
        $form->display('taobao', 'Taobao');
        $form->display('sex', 'Sex');
        $form->display('path');
        $form->time('car', 'Car')->format('mm:ss:SSS');

        return $form;
    }
}
