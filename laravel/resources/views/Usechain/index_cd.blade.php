@extends('Usechain.public.master')
@section('content')
    <div class="wrap">
        <div class="pro">
            <div class="pic"><img src="{{URL::asset('/usechain/img/pic.jpg')}}" alt="" /></div>
            <div class="title">报名|Usechain——全球首个身份镜像区块链分享会</div>
            <div class="buy_type">
                <div class="h">选项：</div>
                <ul>
                    <li id="li_2" style="display: block;" class="active" onclick="select_buy(2);">剩余名额:{{$count}}/席</li>
                </ul>
            </div>
            <div class="buy_count" style="font-size:14px;">
                <p>
                    <b style="color: #cccccc;">项目背景：</b><br />
                    Usechain作为全球首个身份镜像区块链，将肩负起打造一个链上镜像世界的重任。通过在区块链上的真实身份映射，在用户隐私保护的前提之下满足金融系统中最重要的KYC（了解客户)及AML（反洗钱）原则，消除区块链匿名性带来的潜在危害，并基于身份带来全新共识算法革命，降低技术使用门槛，促进去中心化应用的真正落地，让华尔街所能提供的金融服务在链上的镜像世界中也能让每个人触手可及。<br/><br/>
                    <b>时&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;间：</b>2018年7月15日 下午14:00-16:00<br/>
                    <b>地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;点：</b>上海市长宁区长宁路1133号来福士广场T1幢办公楼23层2305-07<br/><br/>
                    <b>分享嘉宾：</b>Usechain COO 徐智文<br/><br/>
                    <b>主办机构：</b>Usechain 基金会<br/>
                    <b>特别协办：</b>雄岸资本、数加资本、骏募资本、图灵基金、筹帷资本、元弘投资、浙大区块链俱乐部Bithacks、求是区块链大学（筹）、成都易元科技、成都青翼科技<br/>
                    <span style="color: #cccccc;">了解更多信息：</span><br/>
                    官方网站:<a style="color: rgb(0, 0, 238);" href="http://www.usechain.net/" target="_blank">http://www.usechain.net/</a><br/>
                    telegram:<a style="color: rgb(0, 0, 238);" href="https://t.me/usechaingroup" target="_blank">https://t.me/usechaingroup</a><br/>
                    <span style="word-break:keep-all;white-space:nowrap;">项目白皮书:<a style="color: rgb(0, 0, 238);" href="http://www.usechain.net/usechain_en.pdf" target="_blank">http://www.usechain.net/usechain_en.pdf</a></span><br/>
                    <span style="word-break:keep-all;white-space:nowrap;">技术白皮书:<a style="color: rgb(0, 0, 238);" href="http://www.usechain.net/usechain_tech_cn.pdf" target="_blank">http://www.usechain.net/usechain_tech_cn.pdf</a></span><br/>
                    Facebook:<a style="color: rgb(0, 0, 238);" href="https://www.facebook.com/UsechainFoundation" target="_blank">https://www.facebook.com/UsechainFoundation</a><br/>
                    Twitter:<a style="color: rgb(0, 0, 238);" href="https://twitter.com/usechain" target="_blank">https://twitter.com/usechain</a><br/>
                    Linkedin:<a style="color: rgb(0, 0, 238);" href="https://www.linkedin.com/" target="_blank">https://www.linkedin.com/</a><br/>
                    reddit:<a style="color: rgb(0, 0, 238);" href="https://www.reddit.com/user/Usechain/" target="_blank">https://www.reddit.com/user/Usechain/</a><br/>
                    instagram:<a style="color: rgb(0, 0, 238);" href="https://www.instagram.com/UsechainOfficial/" target="_blank">https://www.instagram.com/UsechainOfficial/</a><br/>
                </p>
            </div>

            <a href="javascript:void(0);" id="buy_button" class="btn">报名</a>

        </div>

    </div>
@endsection

@section('after-scripts-end')
    <script>
        var ele=document.getElementsByTagName("html")[0],
            size=document.body.clientWidth/320*20;
        size=size>=33.75?33.75:size;
        ele.style.fontSize=size+"px"

        $("#buy_button").click(function(){
            window.location.href="/usechain/info";
        });

    </script>
@stop