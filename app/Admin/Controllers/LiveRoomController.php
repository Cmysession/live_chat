<?php

namespace App\Admin\Controllers;

use App\Models\LiveRoomModel;
use Encore\Admin\Form;
use Encore\Admin\Grid;


use Encore\Admin\Controllers\AdminController;

/**
 * 直播间管理
 */
class LiveRoomController extends AdminController
{

    public $title = '直播间管理';
    private $live_status = [
        'on' => ['value' => 1, 'text' => '开启直播', 'color' => 'success'],
        'off' => ['value' => 2, 'text' => '关闭直播', 'color' => 'danger'],
    ];

    protected function grid(): Grid
    {
        $grid = new Grid(new LiveRoomModel());
        $grid->column('id', 'ID');
        $grid->column('title', '直播间标题');
        $grid->column('live_url', '直播源');
        $grid->column('status', '直播状态')
            ->switch($this->live_status);
        $grid->actions(function ($actions) {
            // 去掉查看
            $actions->disableView();
        });
        $grid->column('remarks', '备注');
        $grid->model()->orderBy('id', 'desc');
        // 查询
        $grid->filter(function ($filter) {

            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            // 在这里添加字段过滤器
            $filter->like('title', '直播间标题');
            $filter->equal('status', '直播状态')->radio([
                '' => '所有',
                $this->live_status['on']['value'] => $this->live_status['on']['text'],
                $this->live_status['off']['value'] => $this->live_status['off']['text'],
            ]);

        });

        return $grid;
    }

    protected function form(): Form
    {
        $form = new Form(new LiveRoomModel());
        $form->display('id', 'ID');
        $form->text('title', '直播间标题')
            ->rules('required');
        $form->text('live_url', '直播源')
            ->rules('required');
        $form->switch('status', '直播状态')
            ->states($this->live_status)->default(1)
            ->rules('required');
        $form->textarea('remarks', '备注');
        return $form;
    }
}
