<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LiveRoomModel;
use Illuminate\Support\Facades\Cache;


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
                ->select('uuid', 'title','live_show', 'status', 'live_url as video', 'cover as video_img', 'type')
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
            return $data;
        });
    }
}
