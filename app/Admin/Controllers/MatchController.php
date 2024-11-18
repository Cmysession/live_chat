<?php

namespace App\Admin\Controllers;

use App\Models\LiveRoomModel;
use App\Models\MatchModel;
use Encore\Admin\Form;
use Encore\Admin\Grid;


use Encore\Admin\Controllers\AdminController;

/**
 * 赛事管理
 */
class MatchController extends AdminController
{

    public $title = '赛事管理';

    private $is_show = [
        'on' => ['value' => 1, 'text' => '展示', 'color' => 'success'],
        'off' => ['value' => 2, 'text' => '关闭', 'color' => 'danger'],
    ];
    protected function grid(): Grid
    {
        $grid = new Grid(new MatchModel());
        $grid->column('uuid', 'UUID');
        $grid->column('title', '直播间标题');
        return $grid;
    }

    protected function form(): Form
    {
        $MatchModel = new MatchModel();
        $form = new Form($MatchModel);
        $form->column(1 / 3, function ($form) {
            $form->divider('信息');
            $form->text('title', '赛事')->required();
            $form->text('subtitle', '副标题');
            $form->datetime("start_time","开始时间")
                ->format('MM-DD HH:mm')
                ->required();;
            // 地区
            $form->select('area', '地区')->options(config('live_area'))
                ->default(1)
                ->required();
            // 直播间
            $liveRoomModel = LiveRoomModel::pluck('title', 'uuid');
            $form->multipleSelect('live', '直播间')->options($liveRoomModel)
                ->default(1)
                ->required();
            $form->number('sort', '排序')
                ->default(1000)
                ->rules('required');
            $form->switch('live_show', '展示')
                ->states($this->is_show)
                ->default(1)
                ->required();
            $form->textarea('remarks', '备注');
        });
        $form->column(1 / 3, function ($form) {
            $form->divider('队名一');
            $form->file('one_file', 'LOGO');
            $form->text('one_title', '队名');
            $form->number('one_score', '得分')->default(0);
        });
        $form->column(1 / 3, function ($form) {
            $form->divider('队名二');
            $form->file('tow_file', 'LOGO');
            $form->text('tow_title', '队名');
            $form->number('tow_score', '得分')->default(0);
        });
        $form->footer(function ($footer) {
            // 去掉`查看`checkbox
            $footer->disableViewCheck();
            // 去掉`继续编辑`checkbox
            $footer->disableEditingCheck();
        });
        return $form;
    }
}
