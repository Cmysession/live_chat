@extends('home.app')
@section('title','赛事')
@section('keywords','赛事')
@section('description','赛事')
<?php $__VERSION = env('HOME_VERSION'); ?>
<link rel="stylesheet" href="/home/css/contest.css?v={{$__VERSION}}">
<link rel="stylesheet" href="/home/muiplayer/mui-player.min.css?v={{$__VERSION}}">
<script type="text/javascript" src="/home/js/reconnecting-websocket.js?v={{$__VERSION}}"></script>
<script type="text/javascript" src="/home/muiplayer/mui-player.min.js?v={{$__VERSION}}"></script>
<script type="text/javascript" src="/home/muiplayer/hls.min.js?v={{$__VERSION}}"></script>
<script type="text/javascript" src="/home/muiplayer/flv.min.js?v={{$__VERSION}}"></script>
@section('content')
    <div id="contest-content"
         v-loading="loading">
        <template>
            <el-tabs class="contest-all-info" v-model="activeName" @tab-click="handleClick">
                <el-tab-pane row-label raw-content name="first">
                    <div slot="label" class="title-label">
                        <p class="date-sub">今天</p>
                        <p class="date">01.04</p>
                    </div>
                    <div class="contest-list">
                        <div class="contest-row">
                            <div class="title">
                                <div>韩篮甲</div>
                                <div>13:00</div>
                            </div>
                            <div class="vs">
                                <div><img src="https://sta02.sxzhjt.cn/file/imgs/team/basketball/20181115125547.png">蔚山现代太阳神
                                </div>
                                <div><img src="https://sta02.sxzhjt.cn/web/assets/yy/img/match-cover.png">昌原LG猎隼
                                </div>
                            </div>
                            <div class="up-room">
                                <div>
                                    <img src="https://sta02.sxzhjt.cn/file/head/20230903/9f623fbf8f4af603b71a786d80f72dad_ss300.jpg"
                                         alt="">
                                    <p>xiaomi</p>
                                </div>
                                <div>
                                    <img src="https://sta02.sxzhjt.cn/file/head/20240619/6242496b6474f44d0716f95d364777c1_ss300.png"
                                         alt="">
                                    <p>xiaomi</p>
                                </div>
                            </div>
                        </div>
                        <div class="contest-row">
                            <div class="title">
                                <div>韩篮甲</div>
                                <div>13:00</div>
                            </div>
                            <div class="vs">
                                <div><img src="https://sta02.sxzhjt.cn/file/imgs/team/basketball/20181115125547.png">蔚山现代太阳神
                                </div>
                                <div><img src="https://sta02.sxzhjt.cn/web/assets/yy/img/match-cover.png">昌原LG猎隼
                                </div>
                            </div>

                            <div class="up-room">
                                <div>
                                    <img src="https://sta02.sxzhjt.cn/file/head/20230903/9f623fbf8f4af603b71a786d80f72dad_ss300.jpg"
                                         alt="">
                                    <p>xiaomi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </el-tab-pane>
                <el-tab-pane label="足球" name="second">
                    <div slot="label" class="title-label">
                        <p class="date-sub">周日</p>
                        <p class="date">01.04</p>
                    </div>
                    <div class="contest-list">
                        <div class="contest-row">
                            <div class="title">
                                <div>韩篮甲</div>
                                <div>13:00</div>
                            </div>
                            <div class="vs">
                                <div><img src="https://sta02.sxzhjt.cn/file/imgs/team/basketball/20181115125547.png">蔚山现代太阳神
                                </div>
                                <div><img src="https://sta02.sxzhjt.cn/web/assets/yy/img/match-cover.png">昌原LG猎隼
                                </div>
                            </div>
                            <div class="up-room">
                                <div>
                                    <img src="https://sta02.sxzhjt.cn/file/head/20230903/9f623fbf8f4af603b71a786d80f72dad_ss300.jpg"
                                         alt="">
                                    <p>xiaomi</p>
                                </div>
                                <div>
                                    <img src="https://sta02.sxzhjt.cn/file/head/20240619/6242496b6474f44d0716f95d364777c1_ss300.png"
                                         alt="">
                                    <p>xiaomi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </el-tab-pane>
                <el-tab-pane label="篮球" name="third">篮球</el-tab-pane>
                <el-tab-pane label="其他" name="fourth">其他</el-tab-pane>
            </el-tabs>
        </template>
    </div>
@endsection
@section('script')
    <script>
        new Vue({
            el: '#app',
            data() {
                return {
                    activeName: 'first',
                    loading: false,
                };
            },
            // 首次执行
            created() {
                this.lodingFun();
            },
            // 加载时执行
            mounted() {

            },
            // 监听变化
            watch: {},

            // 方法
            methods: {
                handleClick(tab, event) {
                    console.log(tab, event);
                },
                lodingFun() {
                    selfThis = this;
                    setTimeout(function () {
                        selfThis.loading = false;
                        console.log(123);
                    }, 1000);
                }
            },
        })
    </script>
@endsection

