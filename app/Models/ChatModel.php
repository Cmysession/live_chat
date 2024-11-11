<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ChatModel
{
    /**
     * 进入聊天室
     */
    const JOIN = 100;

    /**
     * 分配KEY和名称
     */
    const KEY_USERNAME = 111;
    /**
     * 发送消息
     */
    const SEND_MESSAGE = 101;
    /**
     * 发送弹幕
     */
    const SEND_BARRAGE = 102;
    /**
     * 离开直播间
     */
    const BE_OFF = 599;
    /**
     * 内部出错
     */
    const INTERNAL_ERROR = 500;
    /**
     * 参数出错
     */
    const PARAMETER_ERROR = 400;
    /**
     * PING
     */
    const PING = 200;

    /**
     * 修改昵称
     */
    const EDIT_USERNAME = 300;


    /**
     * 禁言
     */
    const BAN_USER = 401;

    /**
     * @param int $fd
     * @param string $dataStr
     * @return false|mixed
     */
    public function toArray(int $fd, string $dataStr)
    {
        if (!$dataStr || !$fd) {
            return false;
        }
        try {
            $dataStr = json_decode($dataStr, true);
            $dataStr['fd'] = $fd;
            // 是否有这个直播间
            $roomArray = Cache::remember('room', 600, function () {
                return TemporaryUserModel::pluck('fd', 'uuid')->toArray();
            });
            if (!empty($dataStr['live_room_id'])){
                return false;
            }
            if (!in_array($dataStr['live_room_id'], array_keys($roomArray))) {
                echo $dataStr['live_room_id'] . '-操作聊天室不存在:' . $dataStr['live_room_id'] . "\n";
                return false;
            }
            return $dataStr;
        } catch (\Exception $e) {
            return false;
        }
    }


    /**
     * 是否被禁言
     * @param $data
     * @return bool
     */
    public function banUsers($data)
    {
        // 是否被屏蔽了
        $banUsers = Cache::remember('ban_users', 600, function () {
            return TemporaryUserModel::where('status', 2)->pluck('fd', 'uuid')->toArray();
        });

        if (in_array($data['user_id'], array_keys($banUsers))) {
            return true;
        }
        return false;
    }

    /**
     * @return string
     */
    public function cacheKey(): string
    {
        return Str::random(9);
    }

    public function userBand($chatId, $userInfo)
    {

    }


    public function ping($data)
    {
        $data['code'] = self::PING;
        $data['message'] = 'PING';
        return $data;
    }

    /**
     * 分配key和用户名
     * @param $data
     * @return mixed
     */
    public function keyAndUsername($data)
    {
        $data['code'] = self::KEY_USERNAME;
        if (!empty($data['user_id'])) {
            $first = TemporaryUserModel::where('uuid', $data['user_id'])
                ->first(['uuid', 'live_room_id', 'fd', 'username', 'status', 'updated_at']);
            if (!$first) {
                // 不存在
                $data['user_id'] = $this->cacheKey();
                $data['username'] = "user(" . $data['user_id'] . ")";
                TemporaryUserModel::create([
                    'uuid' => $data['user_id'],
                    'username' => $data['username'],
                    'fd' => $data['fd'],
                    'live_room_id' => $data['live_room_id'],
                    'status' => 1,
                    'sort' => 1000,
                    'on_line' => 1,
                ]);
            } else {
                // 存在
                TemporaryUserModel::where('uuid', $data['user_id'])
                    ->update([
                        'live_room_id' => $data['live_room_id'],
                        'on_line' => 1,
                        'fd' => $data['fd'],
                    ]);
                $data['username'] = $first->username;
            }
        }
        $data['message'] = '欢迎【 ' . $data['username'] . '】进入直播间!';
        return $data;
    }

    /**
     * 进入聊天室
     * @param $data
     * @return mixed
     */
    public function joinRoom($data)
    {
        //  进入聊天室
        $data['code'] = self::JOIN;
        $data['message'] = "~🎉 欢 迎 🎊~" . $data['username'];
        return $data;
    }

    /**
     * 发送信息
     * @param $data
     * @return mixed
     */
    public function sendMessage($data)
    {
        $data['code'] = self::SEND_MESSAGE;
        return $data;
    }

    /**
     * 修改用户名
     * @param $data
     * @return mixed
     */
    public function editUsername($data)
    {
        $data['code'] = self::EDIT_USERNAME;
        $temporaryUserModel = TemporaryUserModel::where([
            'uuid' => $data['user_id'],
            'fd' => $data['fd'],
            'live_room_id' => $data['live_room_id'],
        ])->update([
            'username' => $data['username'],
        ]);
        if (!$temporaryUserModel) {
            $data['code'] = self::INTERNAL_ERROR;
        }
        return $data;
    }

    /**
     * 发送弹幕
     * @param $data
     * @return mixed
     */
    public function seedBarrage($data)
    {
        $data['code'] = self::SEND_BARRAGE;
        return $data;
    }

    /**
     * 参数出错
     * @param $data
     * @return mixed
     */
    public function parameterError($data)
    {
        $data['code'] = self::PARAMETER_ERROR;
        $data['message'] = 'error';
        $data['fd'] = 'error';
        $data['user_id'] = 'error';
        $data['username'] = 'error';
        return $data;
    }
}
