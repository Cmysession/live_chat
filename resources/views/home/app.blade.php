<?php $__VERSION = env('HOME_VERSION'); ?>
    <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    <meta property="og:title" content="@yield('title')">
    <meta name="og:description" content="@yield('description')">
    <meta property="og:image" content="{{$_SERVER['APP_URL']}}/favicon.ico">
    <meta property="og:url" content="{{$_SERVER['APP_URL'].$_SERVER['REQUEST_URI']}}">
    <link rel="stylesheet" href="/home/css/index.css?v={{$__VERSION}}">
    <link rel="stylesheet" href="/home/css/public.css?v={{$__VERSION}}">
    <link rel="shortcut icon" href="{{$_SERVER['APP_URL']}}/favicon.ico" type="image/x-icon">
</head>
<body>
<div id="app">
    <template>
        {{--  头部  --}}
        <div id="header">
            <div id="header-box">
                <div id="header-logo">
                    <img src="/favicon.ico">
                </div>
                <div id="header-menu">
                    <ul>
                        <a href="/vn">
                            <li>首页</li>
                        </a>
                        <a href="/vn/live">
                            <li>全部直播</li>
                        </a>
                        <a href="/vn/contest">
                            <li>赛事</li>
                        </a>
                        <el-tooltip class="item" effect="dark"
                                    raw-content placement="bottom">
                            <div slot="content" style="text-align: center;background-color: #FFFFFF">
                                <img src='{{$_SERVER['APP_URL']}}/favicon.ico'
                                     style="width:150px;height:150px;border-radius: 150px"/>
                                <div>
                                    <div style="color: #7a7a7a">用手机浏览器扫一扫</div>
                                    <div style="color: #7a7a7a">精彩马上呈现</div>
                                </div>

                            </div>
                            <li>下载APP<sup id="dowsup">HOT</sup></li>
                        </el-tooltip>
                    </ul>
                </div>
                <div id="header-user">
                    <ul>
                        <li><i class="el-icon-user-solid"></i>登陆</li>
                        <li>注册</li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="content">
            @yield('content')
        </div>
        {{--   底部    --}}
        <div id="foot">
            <p class="foot-logo">
                <el-image src="{{$_SERVER['APP_URL']}}/favicon.ico"></el-image>
            </p>
            <p class="foot-str">
                Copyright © 2020 yuyan.live, All rights reserved.
            </p>
        </div>
    </template>
</div>
</body>
<script src="/home/js/vue.js?v={{$__VERSION}}"></script>
<script src="/home/js/index.js?v={{$__VERSION}}"></script>
<script>
    var menu = 'hello';
</script>
@yield('script')
</html>
