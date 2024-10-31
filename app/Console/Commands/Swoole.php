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
            if ($data) {
                switch ($data['code']) {
                    case $this->model::PING:
                        //  PING
                        $data = $this->model->ping($data);
                        break;
                    case $this->model::JOIN:
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
                        $data = $this->model->parameterError();
                }
                var_dump($data);
                foreach ($this->ws->connections as $fd) {
                    if ($this->ws->isEstablished($fd)) {
                        $this->ws->push($fd, json_encode($data, JSON_UNESCAPED_UNICODE));
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
