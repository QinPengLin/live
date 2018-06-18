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
        .list_zezao {
            width: 100%;
            height: 100%;
            background: url({{URL::asset('/usechain/img/bejj.png')}});
            padding: 0;
            margin: 0;
            position: absolute;
            z-index: 301;
            top: 0;
            position: fixed;
            text-align: center;
            display: none;
        }
        .v_k {
            height: 100px;
            width: 200px;
            margin-top: 200px;
            margin-left: auto;
            margin-right: auto;
            background: #FFFFFF;
            border-radius: 3px;
        }
    </style>
@endsection
@section('content')
    <div class="list_zezao" id="list_zezao"  @if($err) style="display: block;" @endif>
        <div class="v_k">
            <div style="font-size: 14px;">{{$err}}</div>
            <a style="margin: 1.2rem 0.5rem 2rem;font-size: 16px;height: 1.5rem;line-height: 1.5rem;" href="javascript:coles();" class="btn">确定</a>
        </div>
    </div>
    <div class="wrap">
        <form name="form1" method="post" action="">
            <div class="address">
                <div class="head">填写报名信息</div>
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
                            <span class="lab">推荐人</span>
                            <input type="text" name="tj_name" id="tj_name" value="" placeholder="推荐人（选填）" class="s01" />
                        </li>
                        {{csrf_field()}}
                    </ul>
                </div>
                <div style="font-size:16px;margin-left:10px;">
                    6.23日下午凭姓名+手机号在成都市武侯区益州大道北段布鲁明顿广场2楼鳯凰·灃格荟参加，请如实填写。<br />咨询电话：18982287525
                </div>
            </div>


            <a href="javascript:submit_form();" class="btn">报名</a>
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
        function coles(){
            document.getElementById("list_zezao").style.display="none";
        };
        function submit_form(){

            var realname = $('realname').value;
            var tel = $('tel').value;
            var company = $('company').value;

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

            form1.submit();
        }

    </script>
@stop