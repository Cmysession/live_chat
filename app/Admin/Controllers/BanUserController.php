<?php

namespace App\Admin\Controllers;

use App\Models\TemporaryUserModel;
use Encore\Admin\Form;
use Encore\Admin\Grid;


use Encore\Admin\Controllers\AdminController;

/**
 * 禁言管理
 */
class BanUserController extends AdminController
{

    public $title = '禁言管理';
    private $ban_status = [
        'on' => ['value' => 1, 'text' => '发言', 'color' => 'success'],
        'off' => ['value' => 2, 'text' => '禁言', 'color' => 'danger'],
    ];

    protected function grid(): Grid
    {
        $grid = new  Grid(new TemporaryUserModel());
        $grid->column('uuid', 'UUID');
        $grid->column('username', '用户名');
        $grid->column('live_room_id', '所在聊天室');
        $grid->column('fd', '对话ID');
        $grid->column('status', '对话状态')
            ->switch($this->ban_status);
        $grid->column('sort', '排序');
        $grid->column('remarks', '备注');
        $grid->column('updated_at', '上线时间');
        $grid->column('created_at', '注册时间');
        $grid->model()->orderBy('updated_at', 'desc');
        // 查询
        $grid->filter(function ($filter) {

            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            // 在这里添加字段过滤器
            $filter->like('UUID', 'UUID');
            $filter->like('fd', '对话ID');
            $filter->like('username', '用户名');
            $filter->like('live_room_id', '所在聊天室');
            $filter->equal('status', '对话状态')->radio([
                '' => '所有',
                $this->ban_status['on']['value'] => $this->ban_status['on']['text'],
                $this->ban_status['off']['value'] => $this->ban_status['off']['text'],
            ]);

        });

        // 关闭行内编辑
        $grid->disableActions();
        // 禁用导出
        $grid->disableExport();
        return $grid;
    }

    protected function form(): Form
    {
        $form = new Form(new TemporaryUserModel());
        $form->switch('status', '对话状态')
            ->states($this->ban_status)->default(1)
            ->rules('required');
        return $form;
    }
}
