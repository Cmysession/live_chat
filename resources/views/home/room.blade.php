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
                        <el-tab-pane id="chat" label="聊天室" name="chat">
                            <div id="chat-msg">
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
                            </div>
                            {{--表情包--}}
                            <div id="bqb">
                                <el-popover
                                    {{--trigger="hover"--}}
                                    trigger="click"
                                    placement="top"
                                    width="310"
                                    popper-class="custom-popover bqb-box"
                                >
                                    <p>
                                    <ul class="horizontal-list">
                                        <li data-id="grinning">😀</li>
                                        <li data-id="grin">😁</li>
                                        <li data-id="smiley">😃</li>
                                        <li data-id="smile">😄</li>
                                        <li data-id="sweat_smile">😅</li>
                                        <li data-id="laughing">😆</li>
                                        <li data-id="innocent">😇</li>
                                        <li data-id="wink">😉</li>
                                        <li data-id="blush">😊</li>
                                        <li data-id="slightly_smiling_face">🙂</li>
                                        <li data-id="yum">😋</li>
                                        <li data-id="heart_eyes">😍</li>
                                        <li data-id="kissing_heart">😘</li>
                                        <li data-id="kissing">😗</li>
                                        <li data-id="kissing_smiling_eyes">😙</li>
                                        <li data-id="kissing_closed_eyes">😚</li>
                                        <li data-id="stuck_out_tongue_winking_eye">😜</li>
                                        <li data-id="stuck_out_tongue_closed_eyes">😝</li>
                                        <li data-id="stuck_out_tongue">😛</li>
                                        <li data-id="sunglasses">😎</li>
                                        <li data-id="roll_eyes">🙄</li>
                                        <li data-id="flushed">😳</li>
                                        <li data-id="rage">😡</li>
                                        <li data-id="confused">😕</li>
                                        <li data-id="tired_face">😫</li>
                                        <li data-id="triumph">😤</li>
                                        <li data-id="fearful">😨</li>
                                        <li data-id="disappointed_relieved">😥</li>
                                        <li data-id="sleepy">😪</li>
                                        <li data-id="sweat">😓</li>
                                        <li data-id="dizzy_face">😵</li>
                                        <li data-id="astonished">😲</li>
                                        <li data-id="sneezing_face">🤧</li>
                                        <li data-id="mask">😷</li>
                                        <li data-id="face_with_thermometer">🤒</li>
                                        <li data-id="face_with_head_bandage">🤕</li>
                                        <li data-id="sleeping">😴</li>
                                        <li data-id="zzz">💤</li>
                                        <li data-id="clap">👏</li>
                                        <li data-id="call_me_hand">🤙</li>
                                        <li data-id="+1">👍</li>
                                        <li data-id="-1">👎</li>
                                        <li data-id="facepunch">👊</li>
                                        <li data-id="fist">✊</li>
                                        <li data-id="v">✌</li>
                                        <li data-id="ok_hand">👌</li>
                                        <li data-id="raised_hand">✋</li>
                                        <li data-id="raised_back_of_hand">🤚</li>
                                        <li data-id="muscle">💪</li>
                                        <li data-id="handshake">🤝</li>
                                        <li data-id="point_left">👈</li>
                                        <li data-id="point_right">👉</li>
                                        <li data-id="fu">🖕</li>
                                        <li data-id="raised_hand_with_fingers_splayed">🖐</li>
                                        <li data-id="lips">👄</li>
                                        <li data-id="ear">👂</li>
                                        <li data-id="eyes">👀</li>
                                        <li data-id="santa">🎅</li>
                                        <li data-id="sun_with_face">🌞</li>
                                        <li data-id="crescent_moon">🌙</li>
                                        <li data-id="star">⭐</li>
                                        <li data-id="zap">⚡</li>
                                        <li data-id="fire">🔥</li>
                                        <li data-id="snowflake">❄️</li>
                                        <li data-id="soccer">⚽</li>
                                        <li data-id="basketball">🏀</li>
                                        <li data-id="football">🏈</li>
                                        <li data-id="baseball">⚾</li>
                                        <li data-id="gift">🎁</li>
                                        <li data-id="tada">🎉</li>
                                        <li data-id="black_nib">✒️</li>
                                        <li data-id="memo">📝</li>
                                        <li data-id="heart">❤️</li>
                                        <li data-id="yellow_heart">💛</li>
                                        <li data-id="green_heart">💚</li>
                                        <li data-id="vs">🆚</li>
                                        <li data-id="speech_balloon">💬</li>
                                        <li data-id="clock1">🕐</li>
                                    </ul>
                                    <div slot="reference" class="popover-reference item-row">😀</div>
                                </el-popover>
                            </div>
                            {{--输入框--}}
                            <div id="send-box">
                                <el-input
                                    type="textarea"
                                    :rows="2"
                                    placeholder="请输入内容"
                                    v-model="textarea"
                                    maxlength="50"
                                    resize="none"
                                    show-word-limit
                                >
                                </el-input>
                                <el-button type="info">发送</el-button>
                            </div>
                        </el-tab-pane>
                        <el-tab-pane id="phb" label="排行榜" name="phb">
                            <div class="sort-row">
                                <div class="num">
                                    <img src="/home/images/lv/no1.png"
                                         alt="">
                                </div>
                                <div class="picture">
                                    <img
                                        src="https://sta02.sxzhjt.cn/file/head/20240104/84b431006ce9b17a9ab2b2c6fa20f2e2_ss300.jpg"
                                        alt="">
                                </div>
                                <div class="username">xiaomi</div>
                                <div class="lv-img">
                                    <img src="/home/images/chat/lv2.png"
                                         alt="">
                                </div>
                            </div>
                            <div class="sort-row">
                                <div class="num">
                                    <img src="/home/images/lv/no1.png"
                                         alt="">
                                </div>
                                <div class="picture">
                                    <img
                                        src="https://sta02.sxzhjt.cn/file/head/20240104/84b431006ce9b17a9ab2b2c6fa20f2e2_ss300.jpg"
                                        alt="">
                                </div>
                                <div class="username">xiaomi</div>
                                <div class="lv-img">
                                    <img src="/home/images/chat/lv2.png"
                                         alt="">
                                </div>
                            </div>
                            <div class="sort-row">
                                <div class="num">
                                    <img src="/home/images/lv/no1.png"
                                         alt="">
                                </div>
                                <div class="picture">
                                    <img
                                        src="https://sta02.sxzhjt.cn/file/head/20240104/84b431006ce9b17a9ab2b2c6fa20f2e2_ss300.jpg"
                                        alt="">
                                </div>
                                <div class="username">xiaomi</div>
                                <div class="lv-img">
                                    <img src="/home/images/chat/lv2.png"
                                         alt="">
                                </div>
                            </div>
                            <div class="sort-row">
                                <div class="num">5</div>
                                <div class="picture">
                                    <img
                                        src="https://sta02.sxzhjt.cn/file/head/20240104/84b431006ce9b17a9ab2b2c6fa20f2e2_ss300.jpg"
                                        alt="">
                                </div>
                                <div class="username">xiaomi</div>
                                <div class="lv-img">
                                    <img src="/home/images/chat/lv2.png"
                                         alt="">
                                </div>
                            </div>
                            <div class="sort-row">
                                <div class="num">5</div>
                                <div class="picture">
                                    <img
                                        src="https://sta02.sxzhjt.cn/file/head/20240104/84b431006ce9b17a9ab2b2c6fa20f2e2_ss300.jpg"
                                        alt="">
                                </div>
                                <div class="username">xiaomi</div>
                                <div class="lv-img">
                                    <img src="/home/images/chat/lv2.png"
                                         alt="">
                                </div>
                            </div>
                            <div class="sort-row">
                                <div class="num">5</div>
                                <div class="picture">
                                    <img
                                        src="https://sta02.sxzhjt.cn/file/head/20240104/84b431006ce9b17a9ab2b2c6fa20f2e2_ss300.jpg"
                                        alt="">
                                </div>
                                <div class="username">xiaomi</div>
                                <div class="lv-img">
                                    <img src="/home/images/chat/lv2.png"
                                         alt="">
                                </div>
                            </div>
                            <div class="sort-row">
                                <div class="num">5</div>
                                <div class="picture">
                                    <img
                                        src="https://sta02.sxzhjt.cn/file/head/20240104/84b431006ce9b17a9ab2b2c6fa20f2e2_ss300.jpg"
                                        alt="">
                                </div>
                                <div class="username">xiaomi</div>
                                <div class="lv-img">
                                    <img src="/home/images/chat/lv2.png"
                                         alt="">
                                </div>
                            </div>
                            <div class="sort-row">
                                <div class="num">5</div>
                                <div class="picture">
                                    <img
                                        src="https://sta02.sxzhjt.cn/file/head/20240104/84b431006ce9b17a9ab2b2c6fa20f2e2_ss300.jpg"
                                        alt="">
                                </div>
                                <div class="username">xiaomi</div>
                                <div class="lv-img">
                                    <img src="/home/images/chat/lv2.png"
                                         alt="">
                                </div>
                            </div>
                        </el-tab-pane>
                    </el-tabs>
                </template>

            </div>
        </div>
    </div>
    <div id="room-content">
        {{--  赛事  --}}
        <template>
            <el-carousel :interval="4000" type="card" height="200px" witch="1200px">
                <el-carousel-item>
                    <div>
                        <p class="time">
                            2022 -12 -123-34
                        </p>
                        <div class="vs">
                            <div>
                                <img class="logo match-cover"
                                     src="https://sta01.sxzhjt.cn/file/imgs/team/football/1gq92j83kv7.png"
                                     data-src="https://sta01.sxzhjt.cn/file/imgs/team/football/1gq92j83kv7.png">
                                <p>伊拉克</p>
                            </div>
                            <div>vs</div>
                            <div>
                                <img class="logo match-cover"
                                     src="https://sta01.sxzhjt.cn/file/imgs/team/football/1gq92j83kv7.png"
                                     data-src="https://sta01.sxzhjt.cn/file/imgs/team/football/1gq92j83kv7.png">
                                <p>奥魅力</p>
                            </div>
                        </div>
                    </div>
                </el-carousel-item>
                <el-carousel-item>
                    <div>
                        <p class="time">
                            05-12 8:20
                        </p>
                        <div class="vs">
                            <div>
                                <img class="logo match-cover"
                                     src="https://sta01.sxzhjt.cn/file/imgs/team/football/1gq92j83kv7.png"
                                     data-src="https://sta01.sxzhjt.cn/file/imgs/team/football/1gq92j83kv7.png">
                                <p>美国</p>
                            </div>
                            <div>vs</div>
                            <div>
                                <img class="logo match-cover"
                                     src="https://sta01.sxzhjt.cn/file/imgs/team/football/1gq92j83kv7.png"
                                     data-src="https://sta01.sxzhjt.cn/file/imgs/team/football/1gq92j83kv7.png">
                                <p>伊拉克</p>
                            </div>
                        </div>
                    </div>
                </el-carousel-item>
                <el-carousel-item>
                    <div>
                        <p class="time">
                            2022 -12 -123-34
                        </p>
                        <div class="vs">
                            <div>
                                <img class="logo match-cover"
                                     src="https://sta01.sxzhjt.cn/file/imgs/team/football/1gq92j83kv7.png"
                                     data-src="https://sta01.sxzhjt.cn/file/imgs/team/football/1gq92j83kv7.png">
                                <p>伊拉克</p>
                            </div>
                            <div>vs</div>
                            <div>
                                <img class="logo match-cover"
                                     src="https://sta01.sxzhjt.cn/file/imgs/team/football/1gq92j83kv7.png"
                                     data-src="https://sta01.sxzhjt.cn/file/imgs/team/football/1gq92j83kv7.png">
                                <p>奥魅力</p>
                            </div>
                        </div>
                    </div>
                </el-carousel-item>
            </el-carousel>
        </template>
        {{--  热门主播  --}}
        <div class="content-row content-up-row">
            <div class="title"><h2>热门主播</h2>
                <el-link class="all" href="https://element.eleme.io" target="_blank">
                    <i class="el-icon-plus"></i>更多
                </el-link>
            </div>
            <el-row>
                <el-col class="live-up-row" :span="4">
                    <el-link href="https://element.eleme.io" target="_blank">
                        <el-image
                            src="https://sta.sxzhjt.cn/file/head/20201129/1706d749aa66550e8927e25d7b40bff7"
                            fit="fit"></el-image>
                        <p>xiaomi</p>
                    </el-link>
                </el-col>
                <el-col class="live-up-row" :span="4">
                    <el-link href="https://element.eleme.io" target="_blank">
                        <el-image
                            src="https://sta.sxzhjt.cn/file/head/20201129/1706d749aa66550e8927e25d7b40bff7"
                            fit="fit"></el-image>
                        <p>xiaomi</p>
                    </el-link>
                </el-col>
            </el-row>
        </div>
        {{--  足球直播  --}}
        <div class="content-row live-room live-other">
            <div class="title"><h2>视频推荐</h2>
                <el-link class="all" href="https://element.eleme.io" target="_blank">
                    <i class="el-icon-plus"></i>更多
                </el-link>
            </div>
            <el-row>
                <el-col class="live-room-row" :span="6">
                    <div class="grid-content bg-purple">
                        <div class="block">
                            <el-image :src="src">
                                <div slot="placeholder" class="image-slot">
                                    加载中<span class="dot">...</span>
                                </div>
                            </el-image>
                            <div class="live-title live-up-title">
                                <div>澳洲甲 墨尔本城 VS 惠灵顿凤凰</div>
                                <div class="up-info-box">
                                    <div>
                                        <el-image
                                            class="up-img"
                                            src="https://sta.sxzhjt.cn/file/head/20201129/1706d749aa66550e8927e25d7b40bff7"
                                            fit="fit"></el-image>
                                    </div>
                                    <div>xiaomi</div>
                                    <div><i class="el-icon-s-opportunity"></i>100W</div>
                                </div>
                            </div>
                            <div class="living">
                                <img src="https://sta01.sxzhjt.cn/web/assets/yy/img/living.gif">
                                <span>Live</span>
                            </div>


                        </div>
                    </div>
                </el-col>

                <el-col class="live-room-row" :span="6">
                    <div class="grid-content bg-purple">
                        <div class="block">
                            <el-image :src="src">
                                <div slot="placeholder" class="image-slot">
                                    加载中<span class="dot">...</span>
                                </div>
                            </el-image>
                            <div class="live-title live-up-title">
                                <div>澳洲甲 墨尔本城 VS 惠灵顿凤凰</div>
                                <div class="up-info-box">
                                    <div>
                                        <el-image
                                            class="up-img"
                                            src="https://sta.sxzhjt.cn/file/head/20201129/1706d749aa66550e8927e25d7b40bff7"
                                            fit="fit"></el-image>
                                    </div>
                                    <div>xiaomi</div>
                                    <div><i class="el-icon-s-opportunity"></i>100W</div>
                                </div>
                            </div>
                            <div class="living">
                                <img src="https://sta01.sxzhjt.cn/web/assets/yy/img/living.gif">
                                <span>Live</span>
                            </div>


                        </div>
                    </div>
                </el-col>

                <el-col class="live-room-row" :span="6">
                    <div class="grid-content bg-purple">
                        <div class="block">
                            <el-image :src="src">
                                <div slot="placeholder" class="image-slot">
                                    加载中<span class="dot">...</span>
                                </div>
                            </el-image>
                            <div class="live-title live-up-title">
                                <div>澳洲甲 墨尔本城 VS 惠灵顿凤凰</div>
                                <div class="up-info-box">
                                    <div>
                                        <el-image
                                            class="up-img"
                                            src="https://sta.sxzhjt.cn/file/head/20201129/1706d749aa66550e8927e25d7b40bff7"
                                            fit="fit"></el-image>
                                    </div>
                                    <div>xiaomi</div>
                                    <div><i class="el-icon-s-opportunity"></i>100W</div>
                                </div>
                            </div>
                            <div class="living">
                                <img src="https://sta01.sxzhjt.cn/web/assets/yy/img/living.gif">
                                <span>Live</span>
                            </div>


                        </div>
                    </div>
                </el-col>

                <el-col class="live-room-row" :span="6">
                    <div class="grid-content bg-purple">
                        <div class="block">
                            <el-image :src="src">
                                <div slot="placeholder" class="image-slot">
                                    加载中<span class="dot">...</span>
                                </div>
                            </el-image>
                            <div class="live-title live-up-title">
                                <div>澳洲甲 墨尔本城 VS 惠灵顿凤凰</div>
                                <div class="up-info-box">
                                    <div>
                                        <el-image
                                            class="up-img"
                                            src="https://sta.sxzhjt.cn/file/head/20201129/1706d749aa66550e8927e25d7b40bff7"
                                            fit="fit"></el-image>
                                    </div>
                                    <div>xiaomi</div>
                                    <div><i class="el-icon-s-opportunity"></i>100W</div>
                                </div>
                            </div>
                            <div class="living">
                                <img src="https://sta01.sxzhjt.cn/web/assets/yy/img/living.gif">
                                <span>Live</span>
                            </div>


                        </div>
                    </div>
                </el-col>

                <el-col class="live-room-row" :span="6">
                    <div class="grid-content bg-purple">
                        <div class="block">
                            <el-image :src="src">
                                <div slot="placeholder" class="image-slot">
                                    加载中<span class="dot">...</span>
                                </div>
                            </el-image>
                            <div class="live-title live-up-title">
                                <div>澳洲甲 墨尔本城 VS 惠灵顿凤凰</div>
                                <div class="up-info-box">
                                    <div>
                                        <el-image
                                            class="up-img"
                                            src="https://sta.sxzhjt.cn/file/head/20201129/1706d749aa66550e8927e25d7b40bff7"
                                            fit="fit"></el-image>
                                    </div>
                                    <div>xiaomi</div>
                                    <div><i class="el-icon-s-opportunity"></i>100W</div>
                                </div>
                            </div>
                            <div class="living">
                                <img src="https://sta01.sxzhjt.cn/web/assets/yy/img/living.gif">
                                <span>Live</span>
                            </div>


                        </div>
                    </div>
                </el-col>
            </el-row>
        </div>
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
                    activeName: 'phb',
                    textarea: "123123",
                    src: 'https://cube.elemecdn.com/6/94/4d3ea53c084bad6931a56d5158a48jpeg.jpeg'
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

