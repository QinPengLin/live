<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no," />
    <title>6月16号 Usechain 杭州站路演报名预约登记</title>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/usechain/css/usechain_mian.css')}}" />
    <script type="text/javascript" src="{{URL::asset('/usechain/js/jquery-1.4.2.min.js')}}"></script>
    @yield('after-styles-end')
</head>
<body>
@yield('content')
@yield('after-scripts-end')
<!--<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript"></script>-->
<script>
    wx.config({
        debug: false,
        appId: 'wx1c6d0ba7ee56a850',
        timestamp: '1528767103',
        nonceStr: 'qFPYqA2KlHCZMcSD',
        signature: 'b378453bdd9192f362ba02ae16115dac1211cf66',
        jsApiList: [
            // 所有要调用的 API 都要加到这个列表中
            'checkJsApi',
            'onMenuShareQQ',
            'onMenuShareTimeline',
            'onMenuShareAppMessage'
        ]
    });

    wx.ready(function () {

        wx.checkJsApi({
            jsApiList: [
                'checkJsApi',
                'onMenuShareQQ',
                'onMenuShareTimeline',
                'onMenuShareAppMessage'
            ],
            success: function (res) {
                //alert(JSON.stringify(res));
            }
        });

        //朋友圈
        //document.getElementById('ShareTimeline').onclick = function () {
        wx.onMenuShareTimeline({
            title: 'Usechain——全球首个身份镜像区块链',
            link: 'http://live.qinpl.cn/usechain/index',
            imgUrl: '{{URL::asset('/usechain/img/pic2.jpg')}}',
            trigger: function (res) {
                //alert('用户点击分享到朋友圈');
            },
            success: function (res) {
            },
            cancel: function (res) {
                //alert('已取消');
            },
            fail: function (res) {
                alert('wx.onMenuShareTimeline:fail: '+JSON.stringify(res));
            }
        });
        //alert('已注册获取“分享到朋友圈”状态事件');
        //};

        // 2. 分享接口
        // 2.1 监听“分享给朋友”，按钮点击、自定义分享内容及分享结果接口
        wx.onMenuShareAppMessage({
            title: 'Usechain——全球首个身份镜像区块链',
            link: 'http://live.qinpl.cn/usechain/index',
            imgUrl: '{{URL::asset('/usechain/img/pic2.jpg')}}',
            desc: '全球首个身份镜像区块链分享会',
            trigger: function (res) {
                // 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
                //alert('用户点击发送给朋友');
            },
            success: function (res) {
            },
            cancel: function (res) {
                //alert('已取消');
            },
            fail: function (res) {
                alert(JSON.stringify(res));
            }
        });

        // 2.3 监听“分享到QQ”按钮点击、自定义分享内容及分享结果接口
        wx.onMenuShareQQ({
            title: 'Usechain——全球首个身份镜像区块链',
            link: 'http://live.qinpl.cn/usechain/index',
            imgUrl: '{{URL::asset('/usechain/img/pic2.jpg')}}',
            desc: '全球首个身份镜像区块链分享会',
            trigger: function (res) {
                //alert('用户点击分享到QQ');
            },
            complete: function (res) {
                //alert(JSON.stringify(res));
            },
            success: function (res) {
            },
            cancel: function (res) {
                //alert('已取消');
            },
            fail: function (res) {
                alert(JSON.stringify(res));
            }
        });

        wx.error(function (res) {
            alert('wx.error: '+JSON.stringify(res));
        });

    });

</script>
</body>
</html>