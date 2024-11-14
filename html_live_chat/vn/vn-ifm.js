let wss = 'wss.supers.live';
let https = 'https://api.supers.live';

function getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] === variable) {
            return pair[1];
        }
    }
    return (false);
}

var me = '';
var is_send = false;
var is_scrollTop = true;
var user = {};
var t = getQueryVariable("t") ?? null;
var v = getQueryVariable("v");
var ws = null;
if (!v) {
    v = '0';
}

$(function () {
    // 获取参数
    if (
        navigator.userAgent.match(/Mobi/i) ||
        navigator.userAgent.match(/Android/i) ||
        navigator.userAgent.match(/iPhone/i)
    ) {
        // 当前设备是移动设备
        $("#colse-barrage").click(function () {
            let colse_barrage = $("#mplayer-header").css('display');
            if (colse_barrage === 'block') {
                $('#barrage-txt').css('display', 'none');
                $('#send-barrage').css('display', 'none');
                $('#mplayer-header').css('display', 'none');
                $("#colse-barrage").text('Bật rào cản');
                $('#colse-barrage').css('background-color', '#54911d');
            } else {
                $('#barrage-txt').css('display', 'block');
                $('#send-barrage').css('display', 'block');
                $('#mplayer-header').css('display', 'block');
                $("#colse-barrage").text('Đóng rào chắn');
                $('#colse-barrage').css('background-color', '#cf3333');
            }
        });
    } else {
        // 关闭弹幕
        $("#colse-barrage").click(function () {
            let colse_barrage = $("#mplayer-header").css('display');
            if (colse_barrage === 'none') {
                $('#mplayer-header').css('display', 'flex');
                $("#colse-barrage").text('Đóng rào chắn');
                $('#colse-barrage').css('background-color', '#cf3333');
            } else {
                $('#mplayer-header').css('display', 'none');
                $('#colse-barrage').text('Bật rào cản');
                $('#colse-barrage').css('background-color', '#54911d');
            }
        });
    }

    $.post(https + '/api/live-room/vn/?code=' + Math.random(), function (data) {
        let roomList = data.lists;
        let defData = (data.first[Object.keys(data.first)[0]]);
        let muiMuiPlayerSrc = defData.video + '?code=' + Math.random();
        let muiMuiPlayerPoster = defData.video_img;
        let playStatus = defData.status;
        let dataType = null;
        if (roomList[v] && t && v && (roomList[v].title === decodeURI(t))) {
            muiMuiPlayerSrc = roomList[v].video + '?code=' + Math.random();
            muiMuiPlayerPoster = roomList[v].video_img;
            dataType = roomList[v].type;
            playStatus = roomList[v].status;
            $('#video-title').text(decodeURI(t));
            //--- 网站关键词 ---
            // let t_t = $('title').text();
            // $("title").text(decodeURI(t) + " SPSVN Sân Đấu");
            // $('meta[property="og:title"]')[0].content = decodeURI(t) + " SPSVN Sân Đấu";
            // $('meta[name="keywords"]')[0].content = decodeURI(t) + t_t;
            // $('meta[name="description"]')[0].content = decodeURI(t) + ' ' + (playStatus === 1 ? 'phát trực tiếp' : 'tạm thời rời đi') + t_t;
            // $('meta[name="og:description"]')[0].content = decodeURI(t) + ' ' + (playStatus === 1 ? 'phát trực tiếp' : 'tạm thời rời đi') + t_t;
            //--- END网站关键词 ---
        } else {
            $('#video-title').text(defData.title);
            v = defData.uuid;
            t = defData.title;
            dataType = defData.type;
            playStatus = defData.status;
        }
        if (playStatus !== 1) {
            muiMuiPlayerSrc = '/';
        }
        let muiMuiPlayer = {
            container: document.getElementById("mui-player"),
            src: muiMuiPlayerSrc,
            poster: muiMuiPlayerPoster,
            themeColor: '#06000000',
            live: true,
            height: 585,
            autoFit: false,
            lang: "en",
            // autoplay: true,
            initFullFixed: false,
            videoAttribute: [
                {attrKey: 'webkit-playsinline', attrValue: 'true'},
                {attrKey: 'playsinline', attrValue: 'true'},
            ],
            parse: {
                type: dataType === 1 ? 'hls' : 'flv',
                loader: dataType === 1 ? Hls : flvjs,
                config: {
                    debug: false,
                },
            }
        }
        if (
            navigator.userAgent.match(/Mobi/i) ||
            navigator.userAgent.match(/Android/i) ||
            navigator.userAgent.match(/iPhone/i)
        ) {
            // 当前设备是移动设备
            muiMuiPlayer.autoFit = true;
            delete muiMuiPlayer.height;
        }
        // 示例 hls 配置
        let tv_box = '';
        for (key in roomList) {
            if (roomList[key].live_show === 1) {
                tv_box += '<div class="col-xs-6 col-md-4 item-box"><a href="?t=' + encodeURI(roomList[key].title) + '&v=' + roomList[key].uuid + '" style="width: 80%;background-color: #db2b42;color: aliceblue;font-weight: bold; border: 0;" class="video-item btn btn-default" >' + roomList[key].title + '</a></div>';
            }
        }
        $('#tv-box').append(tv_box);
        // 判断是否开始准备完成
        let is_play = true;

        var mp = new MuiPlayer(muiMuiPlayer);
        mp.on('duration-change', function (event) {
            if (is_play) {
                $("#loding").css('display', 'none');
                $('#play').css('display', 'block');
                is_play = false;
            }
        });
        mp.on('error', function (event) {
            if (playStatus !== 1) {
                // 未开播
                mp.showToast('Người dẫn chương trình vẫn chưa bắt đầu phát sóng trực tiếp');
                $('#mplayer-error .errop-tip').text('Người dẫn chương trình vẫn chưa bắt đầu phát sóng trực tiếp');
            } else {
                mp.showToast('Lỗi phát video liên hệ quản trị viên');
                $('#mplayer-error .errop-tip').text('Hãy làm mới! Hoặc liên hệ với quản trị viên!');
            }
        });
        // 点击播放

        // 点击播放
        $('#play').click(function () {
            $("#loding").css('display', 'none');
            $('#play').css('display', 'none');
            $('#play-switch').click();
        });
        $('#play-switch').click(function () {
            let btn_play = $('#play-switch ._play').css('display');
            if (btn_play === 'none') {
                $('#play').css('display', 'block');
            } else {
                $('#play').css('display', 'none');
            }
        });
        // 未开播
        if (playStatus !== 1) {
            $('#ready').html('');
            $('#progress').css('display', 'none');
        }

        runWs();
    });


    $('#play').click(function () {
        $("#loding").css('display', 'none');
        $('#play').css('display', 'none');
        $('#play-switch').click();
    });
    $('#play-switch').click(function () {
        let btn_play = $('#play-switch ._play').css('display');
        if (btn_play === 'none') {
            $('#play').css('display', 'block');
        } else {
            $('#play').css('display', 'none');
        }
    });
})


function runWs() {
    ws = new ReconnectingWebSocket("wss://" + wss);
    ws.onopen = function (event) {
        let userInfo = localStorage.getItem("userinfo");
        let userInfoJsonGetItem = JSON.parse(userInfo) ?? {};
        userInfoJsonGetItem.code = 111;
        if (userInfoJsonGetItem) {
            user.username = userInfoJsonGetItem.username ?? 'null';
            user.user_id = userInfoJsonGetItem.user_id ?? 'null';
            userInfoJsonGetItem.username = user.username;
            userInfoJsonGetItem.user_id = user.user_id;
        } else {
            user.username = userInfoJsonGetItem.username = 'null';
            user.user_id = userInfoJsonGetItem.user_id = 'null';
        }
        userInfoJsonGetItem.message = 'welcome';
        userInfoJsonGetItem.live_room_id = v;
        ws.send(JSON.stringify(userInfoJsonGetItem));
    };

    ws.onmessage = function (event) {
        let data = JSON.parse(event.data);
        const dow = window.document.getElementById('user-msg');
        switch (data.code) {
            case 100:
                $(".c.tb span").text('~🎉 Chào mừng 🎊~' + data.username);
                break;
            case 111:
                me = user.username = data.username;
                user.username = data.username;
                user.user_id = data.user_id;
                localStorage.setItem("userinfo", JSON.stringify(user));
                $('.c.tb span').text('~🎉 Chào mừng 🎊~' + data.username);
                break;
            case 300:
                $(".c.tb span").text(data.message + '!');
                break;
            case 401:
                // 被限制
                almsg("bạn bị hạn chế");
                break;
            case 101:
                let elClass = "c co";
                if (data.user_id === user.user_id) {
                    elClass = "c me";
                }
                let html = '<div class="' + elClass + '"><span class="' + (elClass === 'c me' ? 'edit-name' : '') + '">' + data.username + ' </span>：<span>' + data.message + '</span></div>';
                $('#user-msg').append(html);
                if (is_scrollTop) {
                    dow.scrollTop = dow.scrollHeight;
                }
                break;
            case 102:
                $screen = $(document.getElementById("mplayer-header"));
                var content = $('<div class="commit-txt">' + data.message + '</div>');
                var top = Math.random() * $screen.height();
                content.css({
                    top: top + "px",
                    right: 0,
                    color: getRandomColor(),
                    "font-weight": "bold",
                    "letter-spacing": "2px",
                    "text-shadow": "rgb(0, 0, 0) 0px 0px 3px",
                });
                $('.mplayer-header').append(content);
                content.animate({
                    right: $screen.width() + 0 - content.width()
                }, 10000, function () {
                    $(this).remove();
                });
                break;
        }
    }

    ws.onclose = function (event) {
        // almsg('进入聊天室失败!请刷新或更换浏览器!');

        $('.c.tb span').text('Đang kết nối...');
    };
}


// 点击发送消息
$("#send-btn").click(function () {
    sunmitMessage();
});
// 回车发送消息
$("#input-message").keydown(function (e) {
    var e = e || event;
    if (e.keyCode == 13) {
        e.preventDefault ? e.preventDefault() : (e.returnValue = false);
        let input_message = $('#input-message').val();
        if (parseInt(input_message.length) <= 0) {
            return false;
        }
        sunmitMessage();
    }
});
// 内容改变时
$("#input-message").on('input propertychange', function () {
    let input_message = $('#input-message').val();
    if (parseInt(input_message.length)) {
        $('#send-btn').attr('disabled', false);
    } else {
        $('#send-btn').attr('disabled', true);
    }

});
// 判断是否到底部了
$('#user-msg').scroll(function () {
    scrollHeight = window.document.getElementById('user-msg').scrollHeight + 9;
    let chartH = window.document.getElementById('user-msg').clientHeight + $('#user-msg').scrollTop();
    let wc = scrollHeight - chartH;
    if (wc <= 10) {
        is_scrollTop = true;
        $('#chart-to-btm').css('display', 'none');
    } else {
        is_scrollTop = false;
        $('#chart-to-btm').css('display', 'block');
    }
});
// 点击到底部
$('#chart-to-btm').click(function () {
    const dow = window.document.getElementById('user-msg');
    dow.scrollTop = dow.scrollHeight;
    $('#chart-to-btm').css('display', 'none');
});

// 发送消息
function sunmitMessage() {
    if (is_send) {
        return false;
    }
    let input_message = $("#input-message").val();
    if (parseInt(input_message.length) <= 0) {
        almsg('Vui lòng nhập thông tin!');
        return false;
    }
    is_send = true;
    // 模拟发送消息
    $('#send-btn').attr('disabled', true);
    let data = {
        code: 101,
        username: me,
        user_id: user.user_id,
        live_room_id: v,
        message: input_message,
    };
    ws.send(JSON.stringify(data));
    $('#input-message').val('');
    is_send = false;
}

// 错误提示
function almsg(message) {
    $('#myModalWit .modal-body').text(message);
    $('#myModalWit').modal('show');
}

// 发送弹幕
$('#send-barrage').click(function () {
    sendBarrage();
});
// 回车发送弹幕
$("#barrage-txt").keydown(function (e) {
    var e = e || event;
    if (e.keyCode == 13) {
        e.preventDefault ? e.preventDefault() : (e.returnValue = false);
        sendBarrage();
    }
});

//发送弹幕
function sendBarrage() {
    let commit = $('#barrage-txt').val();
    if (parseInt(commit.length) <= 0) {
        return false;
    }
    let data = {
        code: 102,
        username: me,
        user_id: user.user_id,
        live_room_id: v,
        message: commit,

    };
    ws.send(JSON.stringify(data));
    $('#barrage-txt').val('');
}


// 弹幕颜色
function getRandomColor() {
    let arr = [];
    for (var i = 0; i < 3; i++) {
        arr.push(Math.floor(Math.random() * 128 + 128));
    }
    let [r, g, b] = arr;
    var color = `#${r.toString(16).length > 1 ? r.toString(16) : '0' + r.toString(16)}${g.toString(16).length > 1 ? g.toString(16) : '0' + g.toString(16)}${b.toString(16).length > 1 ? b.toString(16) : '0' + b.toString(16)}`;
    return color;
}

// 点击修改昵称
$("#user-msg").on('click', '.edit-name', function () {
    $('#form-username').val(user.username);
    $('#userNameForm').modal('show');
});

// 点击确定修改昵称
$("#form-sub").click(function () {
    let form_username = $('#form-username').val();
    if (!form_username || form_username.length <= 0 || form_username === '') {
        return;
    }
    editUserName();
});
// 回车修改昵称
$("#form-username").keydown(function (e) {
    var e = e || event;
    if (e.keyCode == 13) {
        e.preventDefault ? e.preventDefault() : (e.returnValue = false);
        editUserName();
    }
});

function editUserName() {
    let form_username = $('#form-username').val();
    let data = {
        code: 300,
        live_room_id: v,
        username: form_username,
        'user_id': user.user_id,
        message: user.username + 'đổi tên:' + form_username,
    };
    let userInfo = localStorage.getItem("userinfo");
    let userInfoJsonGetItem = JSON.parse(userInfo);
    userInfoJsonGetItem.username = form_username;
    me = form_username;
    localStorage.setItem("userinfo", JSON.stringify(userInfoJsonGetItem));
    ws.send(JSON.stringify(data));
    $('#userNameForm').modal('hide');
}
