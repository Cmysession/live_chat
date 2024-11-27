<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LiveRoomModel;
use App\Models\MatchModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


class LiveController extends Controller
{
    /**
     * 获取聊天室
     * @return mixed
     */
    public function liveRoom($area)
    {
        $areaArray = config('live_area');
        if (!in_array($area, array_keys($areaArray))) {
            return [];
        }
        return Cache::remember($area . '_room', 86400, function () use ($area) {
            $liveRoomModel = LiveRoomModel::where([
                'live_area_uuid' => $area,
            ])->orderBy('sort', 'desc')
                ->orderBy('id', 'desc')
                ->select('uuid', 'title', 'live_show', 'status', 'live_url as video', 'cover as video_img', 'type')
                ->get();
            $data = [
                'first' => [],
                'lists' => [],
            ];
            foreach ($liveRoomModel as $liveRoom) {
                $video_img = config('filesystems.disks.admin.url') . '/' . $liveRoom->video_img;
                if (!$data['first']) {
                    $liveRoom->video_img = $video_img;
                    $data['first'][$liveRoom->uuid] = $liveRoom;
                }
                $liveRoom->video_img = $video_img;
                $data['lists'][$liveRoom->uuid] = $liveRoom;
            }
            // 列表
            $matchModel = MatchModel::where([
                "area" => $area,
                "is_show" => 1,
            ])
                ->where(function ($q) {
                    $q->where([]);
                })->select(
                    'title',
                    'subtitle',
                    'subtitle_color',
                    'live_type',
                    'start_time',
                    'start_time',
                    'one_file',
                    'one_title',
                    'one_score',
                    'tow_title',
                    'tow_file',
                    'tow_score',
                    'live')
                ->orderBy('sort', 'desc')
                ->orderBy('id', 'desc')
                ->get()
                ->toArray();
            $data["live_type"] = [];
            $data["live_room_list"] = [];
            if (count($matchModel)) {
                $live_type = config('live_type.' . $area);
                $data["live_type"] = $live_type;
                if ($live_type && $matchModel) {
                    foreach ($matchModel as $match) {
                        if ($match['one_file']){
                            $match['one_file'] = config('filesystems.disks.admin.url') . '/' . $match['one_file'];
                        }
                        if ($match['tow_file']){
                            $match['tow_file'] = config('filesystems.disks.admin.url') . '/' . $match['tow_file'];
                        }
                        // type 对应
                        $match['live_room'] = [];
                        if (!empty($live_type[$match['live_type']])) {
                            if (count($match['live'])) {
                                for ($i = 0; $i < count($match['live']); $i++) {
                                    if (!empty($data['lists'][$match['live'][$i]])) {
                                        $match['live_room'][] = $data['lists'][$match['live'][$i]];
                                    }
                                }
                            }
                            $data["live_room_list"][$match['live_type']][] = $match;
                        }

                    }
                }
            }
            return $data;
        });
    }
}
