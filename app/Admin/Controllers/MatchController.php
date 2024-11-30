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
        $grid->column('uuid', 'UUID')->hide();
        $grid->column('title', '赛事');
        $grid->column('subtitle', '副标题')
            ->editable();
        $grid->column('subtitle_color', '副标题颜色')
        ->display(function ($subtitle_color) {
            return "<div style='height: 20px;width: 20px;background-color: ".$subtitle_color."'></div>";
        });
        $grid->column('start_time', '开始时间');
        $live_area = config('live_area');
        $grid->column('area', '地区')->display(function ($live_area_uuid) use ($live_area) {
            if ($live_area_uuid) {
                return $live_area[$live_area_uuid];
            }
        })->hide();
        $live_room = new LiveRoomModel();
        $grid->column('live', '直播间')->display(function ($live_uuid) use ($live_room) {
            if ($live_uuid) {
                return $live_room->whereIn('uuid', $live_uuid)->pluck('title', 'uuid');
            }
        })->label('danger');
        $live_type_cn = config('live_type.cn');
        $grid->column('live_type', '直播类型')->display(function ($live_type) use ($live_type_cn) {
            if ($live_type) {
                return $live_type_cn[$live_type];
            }
        })->hide();
        $grid->column('sort', '排序')->editable();
        $grid->column('is_show', '展示')->switch($this->is_show);
        $grid->column('remarks', '备注')->hide();
        $grid->column('one_file', 'LOGO')
            ->image('', 80, 80)->hide();
        $grid->column('one_title', '队名一')->editable();
        $grid->column('one_score', '得分')->editable();
        $grid->column('', 'VS')->display(function () {
            return "<span style='color: #bd1515;font-weight: bold'>VS</span>";
        });
        $grid->column('tow_score', '得分')->editable();
        $grid->column('tow_title', '队名二')->editable();
        $grid->column('tow_file', 'LOGO')
            ->image('', 80, 80)->hide();
        $grid->model()->orderBy('created_at', 'asc');
        $grid->model()->orderBy('sort', 'desc');
        $grid->model()->orderBy('id', 'desc');
        $grid->actions(function ($actions) {
            // 去掉查看
            $actions->disableView();
            // 去掉删除
            $actions->disableDelete();
        });
        $grid->disableExport();
        // 查询
        $grid->filter(function ($filter) use ($live_area, $live_type_cn) {

            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->like('title', '直播间标题');
            $filter->like('UUID', 'UUID');
            $filter->equal('area', '地区')->select($live_area);
            $filter->equal('live_type', '直播类型')->select($live_type_cn);
            $filter->equal('is_show', '直播状态')->select([
                '' => '所有',
                $this->is_show['on']['value'] => $this->is_show['on']['text'],
                $this->is_show['off']['value'] => $this->is_show['off']['text'],
            ]);

        });
        // 禁用导出
        $grid->disableExport();
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
            $form->color('subtitle_color', '副标题颜色')->default('#a6a6a6');

            $form->datetime("start_time", "开始时间")
                ->format('MM-DD HH:mm')
                ->required();
            // 地区
            $form->select('area', '地区')->options(config('live_area'))
                ->default(1)
                ->required();
            // 直播间
            $liveRoomModel = LiveRoomModel::pluck('title', 'uuid');
            $form->multipleSelect('live', '直播间')->options($liveRoomModel);
            // 直播类型
            $form->select('live_type', '直播类型')->options(config('live_type.cn'))
                ->required();
            $form->number('sort', '排序')
                ->default(1000)
                ->rules('required');
            $form->switch('is_show', '展示')
                ->states($this->is_show)
                ->default(1)
                ->required();
            $form->textarea('remarks', '备注');
        });
        $form->column(1 / 3, function ($form) {
            $form->divider('队名一');
            $form->file('one_file', 'LOGO')
                ->move('cover/' . date('Y-m'), uniqid() . '.jpg');
            $form->text('one_title', '队名');
            $form->number('one_score', '得分')->default(0);
        });
        $form->column(1 / 3, function ($form) {
            $form->divider('队名二');
            $form->file('tow_file', 'LOGO')
                ->move('cover/' . date('Y-m'), uniqid() . '.jpg');
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
