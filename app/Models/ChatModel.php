<?php

namespace App\Models;

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
            return $dataStr;
        } catch (\Exception $e) {
            return false;
        }
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
                var_dump('不存在');
                $data['user_id'] = $this->cacheKey();
                $data['username'] = "游客(" . $data['user_id'] . ")";
                TemporaryUserModel::create([
                    'uuid' => $data['user_id'],
                    'username' => $data['username'],
                    'fd' => $data['fd'],
                    'live_room_id' => $data['live_room_id'],
                    'status' => 1,
                    'sort' => 1000,
                ]);
            }else{
                // 存在
                var_dump('存在');
                TemporaryUserModel::where('uuid', $data['user_id'])
                    ->update([
                        'live_room_id' => $data['live_room_id'],
                        'fd' => $data['fd']
                    ]);
                $data['username'] = $first->username;
            }
        }
        $data['message'] = '欢迎【 '.$data['username'].'】进入直播间!';
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
        $data['message'] = "~🎉 欢 迎 🎊~".$data['username'];
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
            'uuid'=>$data['user_id'],
            'fd'=>$data['fd'],
            'live_room_id'=>$data['live_room_id'],
        ])->update([
            'username' => $data['username'],
        ]);
        if (!$temporaryUserModel){
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
