@extends('home.app')
@section('title','正在直播')
@section('keywords','正在直播')
@section('description','正在直播')
<?php $__VERSION = env('HOME_VERSION'); ?>
<link rel="stylesheet" href="/home/css/room.css?v={{$__VERSION}}">
<link rel="stylesheet" href="/home/muiplayer/mui-player.min.css?v={{$__VERSION}}">
<script type="text/javascript" src="/home/js/reconnecting-websocket.js?v={{$__VERSION}}"></script>
<script type="text/javascript" src="/home/muiplayer/mui-player.min.js?v={{$__VERSION}}"></script>
<script type="text/javascript" src="/home/muiplayer/hls.min.js?v={{$__VERSION}}"></script>
<script type="text/javascript" src="/home/muiplayer/flv.min.js?v={{$__VERSION}}"></script>
@section('content')
    <div id="live-box">
        <div id="live">
            <div id="video-box">
                <div id="video-title-box">
                    <div id="picture">
                        <img src="https://cube.elemecdn.com/6/94/4d3ea53c084bad6931a56d5158a48jpeg.jpeg" alt="">
                    </div>
                    <div id="room-name">
                        <h1>【澳超】墨尔本胜利 ღ 西悉尼流浪者</h1>
                        <h4>八💥佰 房间号:308116 119727 </h4>
                    </div>
                </div>
                <div id="video-show">
                    <div id="mui-player">

                    </div>
                </div>
                <div id="video-foot">

                </div>
            </div>
            <div id="chat-box">
                <div id="notice">
                    <i class="el-icon-sunrise-1"></i> 公告 :
                    <span>无人扶我青云志，八佰带你至山巅~无人扶我青云志，八佰带你至山巅~</span>
                </div>
                {{--聊天框--}}
                <template>
                    <el-tabs v-model="activeName" type="border-card" @tab-click="handleClick">
                        <el-tab-pane id="chat" label="聊天室" name="first">
                            <div class="msg other">
                                <img class="gift" src="/home/images/chat/gift.png" alt="">
                                <img class="hi" src="/home/images/chat/hi.png" alt="">
                                <img class="lv" src="/home/images/chat/lv1.png" alt="">
                                <span class="chat-name">xiaomi: </span>你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好
                            </div>
                            <div class="msg other">
                                <img class="gift" src="/home/images/chat/gift.png" alt="">
                                <img class="hi" src="/home/images/chat/hi.png" alt="">
                                <img class="lv" src="/home/images/chat/lv1.png" alt="">
                                <span class="chat-name">xiaomi: </span>你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好
                            </div>
                            <div class="msg come">
                                <img class="gift" src="/home/images/chat/gift.png" alt="">
                                <img class="hi" src="/home/images/chat/hi.png" alt="">
                                <img class="lv" src="/home/images/chat/lv1.png" alt="">
                                <span class="chat-name"> xiaomi </span><span>进入直播间</span>
                            </div>
                            <div class="msg other">
                                <img class="gift" src="/home/images/chat/gift.png" alt="">
                                <img class="hi" src="/home/images/chat/hi.png" alt="">
                                <img class="lv" src="/home/images/chat/lv1.png" alt="">
                                <span class="chat-name">xiaomi: </span>你好
                            </div>
                            <div class="msg come">
                                <img class="gift" src="/home/images/chat/gift.png" alt="">
                                <img class="hi" src="/home/images/chat/hi.png" alt="">
                                <img class="lv" src="/home/images/chat/lv1.png" alt="">
                                <span class="chat-name"> xiaomi </span><span>进入直播间</span>
                            </div>
                            <div class="msg other">
                                <img class="gift" src="/home/images/chat/gift.png" alt="">
                                <img class="hi" src="/home/images/chat/hi.png" alt="">
                                <img class="lv" src="/home/images/chat/lv6.png" alt="">
                                <span class="chat-name">xiaomi: </span>你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好
                            </div>
                            <div class="msg other">
                                <img class="gift" src="/home/images/chat/gift.png" alt="">
                                <img class="hi" src="/home/images/chat/hi.png" alt="">
                                <img class="lv" src="/home/images/chat/lv10.png" alt="">
                                <span class="chat-name">xiaomi: </span>你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好
                            </div>
                            <div class="msg other">
                                <img class="gift" src="/home/images/chat/gift.png" alt="">
                                <img class="hi" src="/home/images/chat/hi.png" alt="">
                                <img class="lv" src="/home/images/chat/lv4.png" alt="">
                                <span class="chat-name">xiaomi: </span>你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好
                            </div>
                            <div class="msg come">
                                <img class="gift" src="/home/images/chat/gift.png" alt="">
                                <img class="hi" src="/home/images/chat/hi.png" alt="">
                                <img class="lv" src="/home/images/chat/lv2.png" alt="">
                                <span class="chat-name"> xiaomi </span><span>进入直播间</span>
                            </div>
                        </el-tab-pane>
                        <el-tab-pane label="排行榜" name="second">排行榜</el-tab-pane>
                    </el-tabs>
                </template>
                {{--表情包--}}
                <div>
                    <span>😀</span>
                </div>
                {{--输入框--}}
                <div>
                    <el-input
                        type="textarea"
                        :rows="2"
                        placeholder="请输入内容"
                        v-model="textarea">
                    </el-input>
                </div>
            </div>
        </div>
    </div>
    <div id="room-content">
        <template>
        </template>
    </div>
@endsection
@section('script')
    <script>
        new Vue({
            el: '#app',
            data() {
                return {
                    MuiPlayer: {
                        container: '#mui-player',
                        title: '标题',
                        src: 'http://www.w3school.com.cn/i/movie.mp4',
                        live: true,
                        // autoFit: false,
                        lang: "en",
                        autoplay: true,
                        initFullFixed: false,
                        videoAttribute: [
                            {attrKey: 'webkit-playsinline', attrValue: 'true'},
                            {attrKey: 'playsinline', attrValue: 'true'},
                        ],
                    },
                    mp: {},
                    activeName: 'first',
                };
            },
            // 首次执行
            created() {

            },
            // 加载时执行
            mounted() {
                this._data.mp = new MuiPlayer(this._data.MuiPlayer);
            },
            // 监听变化
            watch: {},

            // 方法
            methods: {
                handleClick(tab, event) {
                    console.log(tab, event);
                }
            },
        })
    </script>
@endsection

