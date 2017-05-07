<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title> @yield('title')</title>
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,900" >
    <link href="http://fonts.googleapis.com/css?family=Lato+Open+Sans:400,300,600,700" >;
    <link href="{!! url('public/assets/Admin/css/bootstrap.css') !!}"rel="stylesheet">
    <link href="{!! url('public/assets/Admin/css/style.css') !!}" rel="stylesheet">
    <link href="{!! url('public/assets/Admin/css/rtl.css') !!}" rel="stylesheet">
    <link href="{!! url('public/assets/Admin/css/theme.css') !!}" rel="stylesheet">
    <link href="{!! url('public/assets/Admin/css/ui.css') !!}" rel="stylesheet">
    <link href="{!! url('public/assets/Admin/css/customs.css') !!}" rel="stylesheet">

    <script type="text/javascript" src="public/assets/Admin/js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="public/assets/Admin/js/bootstrap.js"></script>
    <script type="text/javascript" src="public/assets/Admin/js/jquery.validate.js"></script>
    <script type="text/javascript" src="public/assets/Admin/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="public/assets/Admin/plugins/noty/jquery.noty.packaged.min.js"></script>
    <script type="text/javascript" src="public/assets/Admin/js/main.js"></script>
</head>
<body>
@section('main-parent')
    <div class="sidebar">
        <div class="sidebar-inner">
            <div class="sidebar-top big-img">
                <div class="user-image">
                    <a href="{{URL::to('account')}}">
                		<center>
                            <img src="public\assets\Admin\images\avatars\{{$user->avatar}}.png" class="img-responsive img-circle" alt="friend 8" height="200" width="200">
                        </center>
                    </a>
                </div>

                <center style="font-size: 150%; color: white">{{$sinhvien->fullname}}</center>
                <div class="dropdown user-login">
                    <form action="searchemployee" method="get" class="searchform" id="search-results">
                        <input class="form-control" name="name" placeholder="Search employee..." type="text">
                        {!! csrf_field() !!}
                    </form>
                </div>
            </div>
            <ul class="nav nav-sidebar">
            @section('navHome')
                    <li class=" nav-parent">
                        <a href="{{URL::to('home')}}">
                            <i class="glyphicon glyphicon-home fa-2x"></i>
                            <span style="font-size: 200%">Trang Chủ</span>
                        </a>
                    </li>
            @show

            @section('navAccount')
                    <li class=" nav-parent">
                        <a href="{{URL::to('account')}}">
                            <i class="glyphicon glyphicon-user fa-2x"></i>
                            <span style="font-size: 200%">Tài Khoản</span>
                        </a>
                    </li>
            @show

            @section('navAddExcels')
                    <li class="nav-parent">
                        <a href="{{URL::to('showPoint')}}">
                            <i class="glyphicon glyphicon-circle-arrow-up fa-2x"></i>
                            <span style="font-size: 200%">Excels</span>
                        </a>
                    </li>
            @show

            @section('navShowPoint')
                    <li class="nav-parent">
                        <a href="{{URL::to('showPoint')}}">
                            <i class="glyphicon glyphicon-flash fa-2x"></i>
                            <span style="font-size: 200%">Xem Điểm</span>
                        </a>
                    </li>
            @show

            @section('navShowExcels')
                    <li class="nav-parent">
                        <a href="{{URL::to('showPoint')}}">
                            <i class="glyphicon glyphicon-briefcase fa-2x"></i>
                            <span style="font-size: 200%">Xem Danh Sách</span>
                        </a>
                    </li>
            @show

            @section('navReport')
                    <li class="nav-parent">
                        <a href="{{URL::to('report')}}">
                            <i class="glyphicon glyphicon-send fa-2x"></i>
                            <span style="font-size: 200%">Phản hồi</span>
                        </a>
                    </li>
            @show

            @section('navAdmin')
            @show

            </ul>
        </div>
    </div>

    <div class="main-content">
        <!-- BEGIN TOPBAR -->
        <!-- Cần sửa kích cỡ -->
        <div class="topbar">
             <center>
                <strong><font size="6">@yield('title')</font></strong>
            </center>
        </div>
        <!-- Cần sửa kích cỡ -->
        <div class="topbar">
            <div class="header-right">
                <ul class="header-menu nav navbar-nav">
                    <li class="dropdown" id="user-header"></li>
                    <li class="logout_Admin">
                        <a href="{{ URL::to('logout') }}">
                            <i class="icon-logout"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- header-right -->
        </div>
        <!-- Cần sửa kích cỡ -->
        <div class="page-content page-thin ">
            <div class="col-md-12">
                <div class="row">
                    @section('content')
                    @show
                </div>
            </div>
        </div>  <!-- end .page-content-->

    </div><!-- end .main-content-->
</body>

</html>
@show
@section('script_')
    <script>
        $(document).ready(function(){
            $('.nav-parent').click( function(){
               console.log($(this));
            });
        });
    </script>
@show