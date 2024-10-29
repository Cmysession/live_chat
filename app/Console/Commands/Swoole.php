<?php

namespace App\Console\Commands;

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
        //监听WebSocket连接打开事件
        $this->ws->on('open', function ($ws, $request) {
            var_dump($request);
        });
        //监听WebSocket消息事件
        $this->ws->on('message', function ($ws, $frame) {
            $this->info("client is SendMessage4545\n" . $frame);
        });
        //监听WebSocket主动推送消息事件
        $this->ws->on('request', function ($request, $response) {
            $scene = $request->post['scene'];
            foreach ($this->ws->connections as $fd) {
                if ($this->ws->isEstablished($fd)) {
                    $this->ws->push($fd, $scene);
                }
            }
        });
        //监听WebSocket连接关闭事件
        $this->ws->on('close', function ($ws, $fd) {
            $this->info("client is close\n");
        });
        $this->ws->start();
    }
}
