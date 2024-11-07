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
        return Cache::remember('room', 86400, function () use ($area) {
            $liveRoomModel = LiveRoomModel::where([
                'status' => 1,
                'live_area_uuid' => $area,
            ])->orderBy('sort', 'desc')
                ->select('uuid', 'title', 'live_url as video', 'cover as video_img','type')
                ->get();
            $data = [];
            foreach ($liveRoomModel as $liveRoom) {
                $liveRoom->video_img = config('filesystems.disks.admin.url') . '/' . $liveRoom->video_img;
                $data[$liveRoom->uuid] = $liveRoom;
            }
            return $data;
        });
    }
}
