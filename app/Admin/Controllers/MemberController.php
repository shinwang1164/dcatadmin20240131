<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Member;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class MemberController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Member(), function (Grid $grid) {
            // $grid->model()->where('sex', '=', 1);
            $grid->column('id')->sortable();
            $grid->column('name');

            $grid->column('status');
            
            
            
            $grid->column('thumb')->display(function ($src) {
                return "<img src=".$src."  style=width:100px;height:120px; />";
            });


            $directors = [
                0 => '下架',
                1 => '上架',
                2 => '待審核',
                3 => '審核通過',
                4 => '審核不通過'
            ];

            $grid->column('status')->display(function ($type) use($directors) {
                return array_key_exists ($type, $directors) ? $directors[$type] : '';
            });


            $grid->column('price')->sortable();


            $grid->column('age')->sortable();




            $directors = [
                0 => '女',
                1 => '男'
            ];

            $grid->column('sex')->display(function ($type) use($directors) {
                return array_key_exists ($type, $directors) ? $directors[$type] : '';
            });


            $grid->column('logo');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
            $grid->column('permission','權限')->switch();

            // $grid->disableCreateButton(); #禁止增加功能
            // $grid->disableViewButton(); #禁止詳情按鈕
            // $grid->disableEditButton(); 
            // $grid->disableDeleteButton(); 
            // $grid->disableActions();


            //搜尋
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('name');
                
                $filter->equal('sex')->select([
                    0 => '女',
                    1 => '男'
                ]);

                $filter->equal('status')->select([
                    0 => '下架',
                    1 => '上架',
                    2 => '待審核',
                    3 => '審核通過',
                    4 => '審核不通過'
                ])->default(1);

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
        return Show::make($id, new Member(), function (Show $show) {
            $show->field('id');
            $show->field('id');
            $show->field('name');
            $show->field('logo');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Member(), function (Form $form) {
            $form->display('id');
           
            $form->text('name');


            $form->display('thumb', '圖片')->with(function ($value) {
                return "<img src=".$value." />";
            });

            // $form->editor('self_introduction');

            $form->select('status')->options([
                0 => '下架',
                1 => '上架',
                2 => '待審核',
                3 => '審核通過',
                4 => '審核不通過'
            ])->default(1);;

            $form->hidden('permission');


            $form->text('age');
            $form->text('logo');

            
            $form->currency('price');

            $form->select('sex')->options([
                0 => '女',
                1 => '男'
            ])->default(1);;



            //隱藏工具欄
            // $form->disableHeader();

            $form->footer(function ($footer) {
                //去掉 重置
                // $footer->disableReset();

                // $footer->disableEditingCheck();

                // $footer->disableViewCheck();

                // $footer->disableSubmit();

                // $footer->disableCreatingCheck();
            });

            $form->tools(function (Form\TooLs $tools) {

                // $tools->disableList();


                // $tools->disableView();

                // $tools->disableDelete();


            });


            /* 常用函數 */
            if ($form->isCreating()) {
                
            }

            if ($form->isEditing()) {
            
            }

            $form->saving(function (Form $form) {
      
            });

            $form->saved(function (Form $form, $result) {
            
            });

            $form->deleted(function (Form $form, $result) {
            
            });
       

        
            $form->display('created_at');
            $form->display('updated_at');









        });
    }
}
