<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Name;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class NameController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Name(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
        
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Name(), function (Show $show) {
            $show->field('id');
            $show->field('name');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Name(), function (Form $form) {
            $form->display('id');
            $form->text('name');
        });
    }
}
