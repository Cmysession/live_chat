@extends('home.app')
@section('title','直播')
@section('keywords','直播')
@section('description','直播')
<link rel="stylesheet" href="/home/css/home.css">
<link rel="stylesheet" href="/home/muiplayer/mui-player.min.css">
<script type="text/javascript" src="/home/js/reconnecting-websocket.js"></script>
<script type="text/javascript" src="/home/muiplayer/mui-player.min.js"></script>
<script type="text/javascript" src="/home/muiplayer/hls.min.js"></script>
<script type="text/javascript" src="/home/muiplayer/flv.min.js"></script>
@section('content')
    {{--  直播  --}}
    <div id="video-content">
        <div id="video-info">
            {{--    直播    --}}
            <div id="video-box">
                <div id="mui-player"></div>
                <el-button id="go-room" type="warning" plain>进入直播间</el-button>
            </div>
            {{--    列表    --}}
            <div id="video-list">
                <ul class="room-list">
                    <li class="active">
                        <a>
                            <i></i>
                            <img class="live-cover"
                                 src="https://sta01.sxzhjt.cn/file/common/20240628/b94a4321390a963a2f8c4048599d9cf9_wh320.jpg"
                                 alt="">
                        </a>
                    </li>
                    <li>
                        <a>
                            <i></i>
                            <img class="live-cover"
                                 src="https://sta01.sxzhjt.cn/file/common/20240628/b94a4321390a963a2f8c4048599d9cf9_wh320.jpg"
                                 alt="">
                        </a>
                    </li>
                    <li>
                        <a>
                            <img class="live-cover"
                                 src="https://sta01.sxzhjt.cn/file/common/20240628/b94a4321390a963a2f8c4048599d9cf9_wh320.jpg"
                                 alt="">
                        </a>
                    </li>
                    <li>
                        <a>
                            <img class="live-cover"
                                 src="https://sta01.sxzhjt.cn/file/common/20240628/b94a4321390a963a2f8c4048599d9cf9_wh320.jpg"
                                 alt="">
                        </a>
                    </li>
                    <li>
                        <a>
                            <img class="live-cover"
                                 src="https://sta01.sxzhjt.cn/file/common/20240628/b94a4321390a963a2f8c4048599d9cf9_wh320.jpg"
                                 alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
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

        </el-carousel>
    </template>
    {{--  正在直播  --}}
    <div class="content-row live-room">
        <div class="title"><h2>正在直播</h2>
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
                        <div class="live-title">午后聊球</div>
                        <div class="living">
                            <img src="https://sta01.sxzhjt.cn/web/assets/yy/img/living.gif">
                            <span>Live</span>
                        </div>
                        <div class="live-name">
                            <div>xiaomi</div>
                            <div><i class="el-icon-s-opportunity"></i>100W</div>
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
                        <div class="live-title">午后聊球</div>
                        <div class="living">
                            <img src="https://sta01.sxzhjt.cn/web/assets/yy/img/living.gif">
                            <span>Live</span>
                        </div>
                        <div class="live-name">
                            <div>xiaomi</div>
                            <div><i class="el-icon-s-opportunity"></i>100W</div>
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
                        <div class="live-title">午后聊球</div>
                        <div class="living">
                            <img src="https://sta01.sxzhjt.cn/web/assets/yy/img/living.gif">
                            <span>Live</span>
                        </div>
                        <div class="live-name">
                            <div>xiaomi</div>
                            <div><i class="el-icon-s-opportunity"></i>100W</div>
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
                        <div class="live-title">午后聊球</div>
                        <div class="living">
                            <img src="https://sta01.sxzhjt.cn/web/assets/yy/img/living.gif">
                            <span>Live</span>
                        </div>
                        <div class="live-name">
                            <div>xiaomi</div>
                            <div><i class="el-icon-s-opportunity"></i>100W</div>
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

                        <div class="living">
                            <img src="/home/images/living.gif">
                            <span>Live</span>
                        </div>
                        <div class="live-name">
                            <div>xiaomi</div>
                            <div><i class="el-icon-s-opportunity"></i>100W</div>
                        </div>
                        <div class="live-title">午后聊球</div>
                    </div>
                </div>
            </el-col>
        </el-row>

    </div>
    {{--  热门主播  --}}
    <div class="content-row">
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
        <div class="title"><h2>足球直播</h2>
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

        {{--  其他直播  --}}
        <div class="content-row live-room live-other">
            <div class="title"><h2>其他直播</h2>
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
                    src: 'https://cube.elemecdn.com/6/94/4d3ea53c084bad6931a56d5158a48jpeg.jpeg'
                }
            },
            mounted() {
                this._data.mp = new MuiPlayer(this._data.MuiPlayer);
            },
            methods: {},
        })
    </script>
@endsection

