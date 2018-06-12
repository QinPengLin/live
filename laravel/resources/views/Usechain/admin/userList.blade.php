<!DOCTYPE HTML>
<html>
<head>
    <title>Usechain</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Bootstrap Core CSS -->
    <link href="{{URL::asset('/usechain/admin/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="{{URL::asset('/usechain/admin/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{URL::asset('/usechain/admin/css/font-awesome.css')}}" rel="stylesheet">
    <!-- jQuery -->
    <script src="{{URL::asset('/usechain/admin/js/jquery.min.js')}}"></script>
    <!----webfonts--->
    <link href='http://fonts.useso.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <!---//webfonts--->
    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::asset('/usechain/admin/js/bootstrap.min.js')}}"></script>
</head>
<body>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Modern</a>
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="{{URL::asset('/usechain/admin/images/1.png')}}" alt=""/><span class="badge"></span></a>
                <ul class="dropdown-menu">
                    <li class="m_2"><a href="#"><i class="fa fa-lock"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="#"><i class="fa fa-table nav_icon"></i>预约信息<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/usechain/admin/index">邀请码列表</a>
                            </li>
                            <li>
                                <a href="/usechain/admin/userList">预约用户列表</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
    <div id="page-wrapper">
        <div class="col-md-12 graphs">
            <div class="xs">
                <h3>预约用户列表</h3>
                <div class="bs-example4" data-example-id="contextual-table">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>姓名</th>
                            <th>电话</th>
                            <th>使用预约码</th>
                            <th>公司</th>
                            <th>推荐人</th>
                            <th>预约时间</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($userData as $v)
                            <tr class="active">
                                <th scope="row">{{$v->id}}</th>
                                <td>{{$v->name}}</td>
                                <td>{{$v->tel}}</td>
                                <td><?php echo trim($v->rec_coed,","); ?></td>
                                <td>{{$v->company}}</td>
                                <td>{{$v->rec_name}}</td>
                                <td><?php  $timeint=strtotime($v->creation_time); echo date("Y-m-d H:i:s",($timeint+28800)); ?>{{$v->creation_time}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{$userData->links()}}
            </div>
            <div class="copy_layout">
                <p>Copyright &copy; 2015.Company name All rights reserved.More Templates</p>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- Nav CSS -->
<link href="{{URL::asset('/usechain/admin/css/custom.css')}}" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="{{URL::asset('/usechain/admin/js/metisMenu.min.js')}}"></script>
<script src="{{URL::asset('/usechain/admin/js/custom.js')}}"></script>
</body>
</html>
