<?php

namespace App\Admin\Controllers\Tmall;

use App\Models\TmallCarGame;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class GameController extends Controller
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
            ->header('切红包游戏')
            ->description('分数排行榜')
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
        $grid = new Grid(new TmallCarGame);
        $grid->model()->orderBy('created_at', 'desc');
        $grid->disableCreateButton();
        $grid->disableExport();
        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->between('created_at', '游戏时间')->datetime();
            $filter->in('path', '场地')->multipleSelect([
                'suzhou' => 'suzhou',
                'hangzhou' => 'hangzhou',
                'wuhan' => 'wuhan',
                'chengdu' => 'chengdu'
            ]);
            $filter->where(function ($query) {
                $query->whereHas('user', function ($query){
                    $query->where('phone', 'like', "%{$this->input}%");
                });

            }, '输入手机号');
        });
        $grid->id('Id')->sortable();
        $grid->user()->name('姓名');
        $grid->user()->phone('手机号');
        $grid->user()->taobao('淘宝账号');
        $grid->user()->sex('性别');
        $grid->path('场地');
        $grid->score('Score')->sortable();
        $grid->created_at('游戏时间')->sortable();

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
        $show = new Show(TmallCarGame::findOrFail($id));

        $show->id('Id');
        $show->path('Path');
        $show->score('Score');
        $show->tmall_car_id('Tmall car id');
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
        $form = new Form(new TmallCarGame);

        $form->display('path', 'Path');
        $form->display('score', 'Score');
        $form->display('tmall_car_id', 'Tmall car id');

        return $form;
    }
}
