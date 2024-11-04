<?php

namespace App\Console\Commands;

use App\Models\ChatModel;
use App\Models\TemporaryUserModel;
use Illuminate\Console\Command;
use swoole_websocket_server;

class Swoole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'swoole {action}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * 这个方法中的逻辑需要自己写
     * @return mixed
     */
    public function handle()
    {
        $action = $this->argument('action');
        switch ($action) {
            case 'close':
                break;
            default:
                $this->start();
                break;
        }
    }

    /**
     * 这个方法是自己新增的
     * 具体可参考 https://wiki.swoole.com/#/start/start_tcp_server
     */
    public function start()
    {
        // 这里是监听的服务端口号
        $this->ws = new swoole_websocket_server(env('SWOOLE_HOST', "0.0.0.0"), env('SWOOLE_PORT', 9502));
        $this->model = new ChatModel();
        //监听WebSocket连接打开事件
        $this->ws->on('open', function ($ws, $request) {
        });
        //监听WebSocket消息事件
        $this->ws->on('message', function ($ws, $frame) {
            $data = $this->model->toArray($frame->fd, $frame->data);
            $this->info('收到的消息');
            var_dump($data);
            if (empty($data['code']) || empty($data['message']) || empty($data['live_room_id']) || empty($data['user_id'])) {
                $data['code'] = $this->model::INTERNAL_ERROR;
                $data['message'] = 'on error';
                $this->ws->push($frame->fd, json_encode($data, JSON_UNESCAPED_UNICODE));
            }
            if ($data) {
                switch ($data['code']) {
                    case $this->model::PING:
                        // PING
                        $data = $this->model->ping($data);
                        break;
                    case $this->model::KEY_USERNAME:
                        // 匹配key和用户名
                        $data = $this->model->keyAndUsername($data);
                        break;
                    case $this->model::JOIN:
                        // 加入聊天室
                        $data = $this->model->joinRoom($data);
                        break;
                    case $this->model::SEND_MESSAGE:
                        //  发送消息
                        $data = $this->model->sendMessage($data);
                        break;
                    case $this->model::EDIT_USERNAME:
                        //  修改昵称
                        $data = $this->model->editUsername($data);
                        break;
                    case $this->model::SEND_BARRAGE:
                        //  发送弹幕
                        $data = $this->model->seedBarrage($data);
                        break;
                    default:
                        //  参数出错
                        $data = $this->model->parameterError($data);
                }
                $this->info('判断DATA');
                var_dump($data);
                $user_fd = $data['fd'];
                unset($data['fd']);
                // 发送消息
                if ($data['code'] === $this->model::KEY_USERNAME) {
                    // 首次分配名字
                    $this->info('首次发给自己:'.$user_fd);
                    $this->ws->push($user_fd, json_encode($data, JSON_UNESCAPED_UNICODE));
                    $data = $this->model->joinRoom($data);
                } else if ($data['code'] === $this->model::EDIT_USERNAME) {
                    $this->info('修改发给自己:'.$user_fd);
                    $ToMeData = $data;
                    $ToMeData['code'] = $this->model::KEY_USERNAME;
                    $this->ws->push($user_fd, json_encode($ToMeData, JSON_UNESCAPED_UNICODE));
                }

                $this->info('发送给发所有人');
                var_dump($data);
                $fds = TemporaryUserModel::where([
                    'live_room_id' => $data['live_room_id']
                ])->pluck('uuid', 'fd')
                    ->toArray();
                $fdsKeys = array_keys($fds);
                foreach ($this->ws->connections as $fd) {
                    if (in_array($fd, $fdsKeys)) {
                        if ($this->ws->isEstablished($fd)) {
                            $this->info('发送消息给:' . $fd);
                            $this->ws->push($fd, json_encode($data, JSON_UNESCAPED_UNICODE));
                        }
                    }
                }
            }
        });
        //监听WebSocket主动推送消息事件
        $this->ws->on('request', function ($request, $response) {
            $this->info("----监听WebSocket主动推送消息事件----");
            dump($request->post);
            $scene = $request->post['scene'];
            foreach ($this->ws->connections as $fd) {
                if ($this->ws->isEstablished($fd)) {
                    $this->ws->push($fd, $scene);
                }
            }
        });
        //监听WebSocket连接关闭事件
        $this->ws->on('close', function ($ws, $fd) {
//            $data = $this->model->toArray($fd, $frame->data);
            $this->info("client is close\n");
        });
        $this->ws->start();
    }
}
