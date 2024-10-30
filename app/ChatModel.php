<?php

namespace App;

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


    public function userBand($chatId, $userInfo)
    {

    }

    public function sendMessage()
    {
    }
}
