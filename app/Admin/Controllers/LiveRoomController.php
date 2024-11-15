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
    private $live_show = [
        'on' => ['value' => 1, 'text' => '展示', 'color' => 'success'],
        'off' => ['value' => 2, 'text' => '关闭', 'color' => 'danger'],
    ];
    private $type = [
        1 => 'hls',
        2 => 'flv',
    ];

    protected function grid(): Grid
    {
        $grid = new Grid(new LiveRoomModel());
        $grid->column('uuid', 'UUID');
        $grid->column('title', '直播间标题');
        $grid->column('cover', '封面')
            ->image();
        $typeArray = $this->type;
        $grid->column('type', '直播类型')->display(function ($type) use ($typeArray) {
            return $typeArray[$type];
        });

        $live_area = config('live_area');
        $grid->column('live_area_uuid', '直播地区')->display(function ($live_area_uuid) use ($live_area) {
            if ($live_area_uuid) {
                return $live_area[$live_area_uuid];
            }
        });
        $grid->column('live_url', '直播源');
        $grid->column('sort', '排序')
            ->editable()
            ->sortable();
        $grid->column('status', '直播状态')
            ->switch($this->live_status);
        $grid->actions(function ($actions) {
            // 去掉查看
            $actions->disableView();
        });
        $grid->column('live_show', '展示直播')
            ->switch($this->live_show);
        $grid->column('remarks', '备注');
        $grid->model()->orderBy('sort', 'desc');
        $grid->model()->orderBy('id', 'desc');
        // 查询
        $grid->filter(function ($filter) {

            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            // 在这里添加字段过滤器
            $filter->like('title', '直播间标题');
            $filter->like('UUID', 'UUID');
            $filter->equal('status', '直播状态')->select([
                '' => '所有',
                $this->live_status['on']['value'] => $this->live_status['on']['text'],
                $this->live_status['off']['value'] => $this->live_status['off']['text'],
            ]);

        });
        // 禁用导出
        $grid->disableExport();
        return $grid;
    }

    protected function form(): Form
    {
        $liveRoomModel = new LiveRoomModel();
        $form = new Form($liveRoomModel);
        $form->display('id', 'ID');
        $form->text('title', '直播间标题')
            ->creationRules("required|min:3|max:100|unique:" . $liveRoomModel->table, [
                'required' => '直播间标题不能为空!',
                'min' => '直播间标题不能小于3个字符!',
                'max' => '直播间标题不能大于100个字符!',
                'unique' => '直播间标题已存在!',
            ])
            ->updateRules("required|min:3|max:100|unique:live_room,title,{{id}}", [
                'required' => '直播间标题不能为空!',
                'min' => '直播间标题不能小于3个字符!',
                'max' => '直播间标题不能大于100个字符!',
                'unique' => '直播间标题已存在!',
            ]);
        $form->image('cover', '封面')
            ->move('cover/' . date('Y-m'), uniqid() . '.jpg')
            ->rules('required');
        $form->text('live_url', '直播源')
            ->creationRules("required|url|unique:" . $liveRoomModel->table, [
                'required' => '直播源不能为空!',
                'url' => '直播源地址有误!',
                'unique' => '直播源已存在!',
            ])
            ->creationRules("required|url|unique:" . $liveRoomModel->table . ",live_url,{{id}}", [
                'required' => '直播源不能为空!',
                'url' => '直播源地址有误!',
                'unique' => '直播源已存在!',
            ]);
        $form->select('live_area_uuid', '直播地区')->options(config('live_area'))
            ->default(1)
            ->required();
        $form->select('type', '直播类型')->options($this->type)
            ->default(1)
            ->required();
        $form->number('sort', '排序')
            ->default(1000)
            ->rules('required');
        $form->switch('status', '直播状态')
            ->states($this->live_status)->default(1)
            ->rules('required');
        $form->switch('live_show', '展示直播')->states($this->live_show)
            ->default(1)
            ->required();
        $form->textarea('remarks', '备注');
        $form->confirm('确定更新吗？', 'edit');
        return $form;
    }
}
