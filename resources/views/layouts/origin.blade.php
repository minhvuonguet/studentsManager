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

        <div class="logopanel">
            <h1>
                {{--<a href="#">Link Logo</a>--}}
            </h1>
        </div>

        <div class="sidebar-inner">
            <div class="sidebar-top big-img">
                <div class="user-image">
                		@section('avatar')
                        <img src="public\assets\Admin\images\avatars\avatar7_big@2x.png" class="img-responsive img-circle" alt="friend 8">
                        @show
                </div>
                <h4>
                @section('username')
                <p align = "center">Mu ha ha</p>
                @show
                </h4>
                <div class="dropdown user-login">
                    <form action="searchemployee" method="get" class="searchform" id="search-results">
                        <input class="form-control" name="name" placeholder="Search employee..." type="text">
                        {!! csrf_field() !!}
                    </form>
                </div>
            </div>
            @section('navbar')
            <ul class="nav nav-sidebar">

                    <li class=" nav-active active">
                        <a href="{{URL::to('ViewUser')}}">
                            <i class="icon-home"></i>
                            <span>Home</span>
                        </a>
                    </li>

                    <li class="nav-parent">
                        <a href="{{URL::to('readExcels')}}">
                            <i class="icon-bulb"></i>
                            <span>Excels</span>
                        </a>
                    </li>

                    <li class="nav-parent">
                        <a href="{{URL::to('adstudents')}}">
                            <i class="icon-bulb"></i>
                            <span>Xem Điểm</span>
                        </a>
                    </li>

                    <li class="nav-parent">
                        <a href="{{URL::to('adstudents')}}">
                            <i class="icon-bulb"></i>
                            <span>Phản hồi</span>
                        </a>
                    </li>
            </ul>
            @show
        </div>
    </div>

    <div class="main-content">
        <!-- BEGIN TOPBAR -->
        <div class="topbar">
            <div class="header-right">
                <ul class="header-menu nav navbar-nav">
                    <li class="dropdown" id="user-header">

                    </li>
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