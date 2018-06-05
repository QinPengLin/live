@extends('Live.public.master')
@section('after-styles-end')
    <style>
        .card{
            margin-bottom: 70px;
        }
        .masonry-container{
            margin-top: 15px;
        }
    </style>
@endsection

@section('content')
<div class="wrapper">
    <div class="container">

        <div class="masonry-container">
@foreach($index as $k=>$v)
    @if($k%3==0)
                        <div class="card-box col-md-4 col-sm-6">
                            <div class="card">
                                <div class="header">
                                    <img src="{{$v['img']}}"/>
                                    <div class="filter"></div>
                                    <div class="actions">
                                        <a href="{{$v['href']}}" target="_blank"><button class="btn btn-round btn-fill btn-neutral btn-modern">
                                            Watch
                                        </button></a>
                                    </div>
                                    <div class="social-line social-line-visible" data-buttons="2">
                                        <button class="btn btn-social">
                                            <i class="fa fa-fire"></i>  {{$v['heat']}}
                                        </button>
                                        <button class="btn btn-social">
                                            <i class="fa fa-gamepad"></i>  {{$v['types']}}
                                        </button>
                                    </div>
                                </div>

                                <div class="content">
                                    <h6 class="category"><i class="fa fa-user"></i> {{$v['author']}}</h6>
                                    <h4 class="title"><a target="_blank" href="{{$v['href']}}">{{$v['title']}}</a></h4>
                                    <a href="{{$v['href']}}" target="_blank"><p class="description">点击查看详情....</p></a>
                                    <a href="http://www.qinpl.cn/" target="_blank"><p class="description">由www.qinpl.cn提供技术支持</p></a>
                                </div>
                            </div> <!-- end card -->
                        </div>
    @else
                    <div class="card-box col-md-4 col-sm-6">
                        <div class="card" data-background="color" data-color="black">
                            <div class="header">
                                <img src="{{$v['img']}}"/>
                                <div class="social-line social-line-visible" data-buttons="2">
                                    <button class="btn btn-social">
                                        <i class="fa fa-fire"></i>  {{$v['heat']}}
                                    </button>
                                    <button class="btn btn-social">
                                        <i class="fa fa-gamepad"></i>  {{$v['types']}}
                                    </button>
                                </div>
                            </div>

                            <div class="content">
                                <h6 class="category"><i class="fa fa-user"></i> {{$v['author']}}</h6>
                                <h4 class="title"><a target="_blank" href="{{$v['href']}}">{{$v['title']}}</a></h4>
                                <a href="{{$v['href']}}" target="_blank"><p class="description">点击查看详情....</p></a>
                                <a href="http://www.qinpl.cn/" target="_blank"><p class="description">由www.qinpl.cn提供技术支持</p></a>
                            </div>
                        </div> <!-- end card -->
                    </div>
    @endif

@endforeach
        </div>

    </div>
</div> <!-- end wrapper -->
@endsection
@section('after-scripts-end')
    <script>
        console.log('999');
    </script>
@stop
