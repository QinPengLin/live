@extends('Usechain.public.master')
@section('after-styles-end')
    <style>
        body{
            background: #F0EFF5;
        }
        .card{
            margin-bottom: 70px;
        }
        .masonry-container{
            margin-top: 15px;
        }
    </style>
@endsection
@section('content')
<div class="wrap">
    <form name="form1" method="post" action="#">
        <input type="hidden" name="t" value="ing">
        <input type="hidden" name="step" value="3">
        <input type="hidden" name="id" value="425">
        <div class="address">
            <div class="head">联系方式</div>
            <div class="body">
                <ul>
                    <li>
                        <span class="lab">姓名</span>
                        <input type="text" name="realname" id="realname" value="" placeholder="名字" class="s01" />
                    </li>
                    <li>
                        <span class="lab">联系电话</span>
                        <input type="number" name="tel" id="tel" value="" placeholder="手机或固话" class="s01" />
                    </li>
                    <li>
                        <span class="lab">公司</span>
                        <input type="text" name="company" id="company" value="" placeholder="公司名称" class="s01" />
                    </li>
                    <li>
                        <span class="lab">推荐码</span>
                        <input type="text" name="tj_code" id="tj_code" value="" placeholder="推荐码" class="s01" />
                    </li>
                    <li>
                        <span class="lab">推荐人</span>
                        <input type="text" name="tj_name" id="tj_name" value="" placeholder="推荐人（选填）" class="s01" />
                    </li>
                </ul>
            </div>
            <div style="font-size:16px;margin-left:10px;">
                6.8日上午凭姓名+手机号在洲际大酒店签到处领取门票，请如实填写。<br />咨询电话：陈小姐   0571-85310854
            </div>
        </div>


        <a href="javascript:submit_form();" class="btn">保存</a>
    </form>
</div>
@endsection
@section('after-scripts-end')

<script>
    var ele=document.getElementsByTagName("html")[0],
        size=document.body.clientWidth/320*20;
    size=size>=33.75?33.75:size;
    ele.style.fontSize=size+"px"

    function $(id){
        return document.getElementById(id);
    }

    function submit_form(){

        var realname = $('realname').value;
        var tel = $('tel').value;
        var company = $('company').value;
        var tj_code=$('tj_code').value;

        if(!realname){
            alert('请填写名字');
            return false;
        }
        if( !tel ){
            alert('请填写联系电话');
            return false;
        }
        if( !company ){
            alert('请填写公司');
            return false;
        }
        if (!tj_code){
            alert('请填推荐码');
            return false;
        }
        form1.submit();
    }

</script>
@stop