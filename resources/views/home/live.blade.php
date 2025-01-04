@extends('home.app')
@section('title','房间')
@section('keywords','房间')
@section('description','房间')
<?php $__VERSION = env('HOME_VERSION');?>
<link rel="stylesheet" href="/home/css/live.css?v={{$__VERSION}}">
@section('content')
    <div id="live-content">
        <template>
            <el-tabs class="up-all-info live-room live-other" v-model="activeName" @tab-click="handleClick">
                <el-tab-pane label="全部" name="first">
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
                </el-tab-pane>
                <el-tab-pane label="足球" name="second">
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
                    </el-row>
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
                    src: 'https://cube.elemecdn.com/6/94/4d3ea53c084bad6931a56d5158a48jpeg.jpeg'
                };
            },
            mounted() {

            },
            methods: {
                handleClick(tab, event) {
                    console.log(tab, event);
                }
            },
        })
    </script>
@endsection

