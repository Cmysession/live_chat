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
            $dataArr = json_decode($dataStr, true);
            $dataArr['fd'] = $fd;
            return $dataArr;
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
     * 进入聊天室
     * @param $data
     * @return mixed
     */
    public function joinRoom($data)
    {
        //  进入聊天室
        $data['code'] = self::JOIN;
        $data['message'] = '进入直播间!';
        if (!empty($data['user_id'])) {
            $exists = TemporaryUserModel::where('uuid', $data['user_id'])->exists();
            if (!$exists) {
                $data['user_id'] = $this->cacheKey();
                $data['username'] = "游客(" . $this->cacheKey() . ")";
            }
        } else {
            $data['user_id'] = $this->cacheKey();
            $data['username'] = "游客(" . $this->cacheKey() . ")";
        }
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
