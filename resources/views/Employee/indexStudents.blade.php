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
{{--<<<<<<< HEAD--}}
    {{--<body>--}}
            {{--<div class="container-fuild">--}}
                {{--<div class="row">--}}
                    {{--<div class="header col-sm-12">--}}
                        {{--<div class="logo col-sm-3">--}}
                            {{--<img src="public/assets/Admin/images/uet_logo3.png" --}}
                            {{--alt="UET"--}}
                            {{--width="90"--}}
                            {{--height="90">--}}
                        {{--</div>--}}
                        {{--<div class="headContent col-sm-6">--}}
                            {{--<h4 class="text-center "> Hệ thống Xem Điểm Rèn Luyện Của Sinh Viên  </h4>--}}
                        {{--</div>--}}

                    {{--</div>--}}

                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="panel panel-primary" style="margin-top: 20px">--}}
                {{--<div class="row">--}}
                    {{--<button style="margin-left: 15px" > Thông Tin Cá Nhân </button>--}}


                {{--</div>--}}
                {{--<div class="row">--}}
                    {{--<button style="margin-left: 15px" > Xem Điểm </button>--}}


                {{--</div>--}}

            {{--</div>--}}



    {{--</body>--}}


    {{--<body>--}}


        {{--<div class="form-group" style="margin-top: 100px">--}}

            {{--<div class="panel panel-primary">--}}


                {{--<div class="panel-body">--}}



                    {{--{{Auth::user()->username}}--}}
                    {{--<table class="table table-bordered">--}}

                        {{--<thead>--}}

                        {{--<button style="margin-left: 15px" > Thông Tin Cá Nhân </button>--}}
                        {{--<button style="margin-left: 15px" > Xem Điểm </button>--}}

                        {{--</thead>--}}

                    {{--</table>--}}
{{--=======--}}
<body>
@section('main-parent')
    <div class="sidebar">
        <div class="logopanel">
            <h1>
                {{--<a href="#">MVH - UET</a>--}}
            </h1>
        </div>
        <div class="sidebar-inner">
            <div class="sidebar-top big-img">
                <div class="user-image">
{{-->>>>>>> bbddd39cd7253dfbc7f2ebdbecec57d1e02db489--}}

                    <img src="public/assets/Admin/images/default.png" class="img-responsive img-circle" alt="friend 8">
                    {{--@endif--}}
                </div>
                <h4></h4>
                {{--{{Auth::user()->username}}--}}
                <div class="dropdown user-login">
                    <form action="searchemployee" method="get" class="searchform" id="search-results">
                        <input class="form-control" name="name" placeholder="Search employee..." type="text">
                        {!! csrf_field() !!}
                    </form>
                </div>
            </div>

            <ul class="nav nav-sidebar">

                <li class="nav-parent">
                    <a href="{{ URL::to('formdiem') }}" class="test_"><i class="icon-puzzle"></i><span> Xem Điểm </span> </a>
                </li>
                <li class="nav-parent">
                    <a href="{{ URL::to('newclass') }}" class="test_"><i class="icon-puzzle"></i><span> Xem Thông Tin </span> </a>
                </li>
                <li class="nav-parent">
                    <a href="{{ URL::to('listclass') }}" class="test_"><i class="icon-puzzle"></i><span> Chỉnh Sửa Thông Tin </span> </a>
                </li>
                <li class="nav-parent">
                    <a href="{{ URL::to('listclass') }}" class="test_"><i class="icon-puzzle"></i><span> Phản Hồi </span> </a>
                </li>




            </ul>


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
                        <a href="{{ URL::to('logout') }}"><i class="icon-logout"></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
            <!-- header-right -->
        </div>
        <div class="page-content page-thin ">
            <div class="col-md-12">

                <div class="row">
                    @yield('content')
                </div>
            </div> <!-- end .page-content-->
        </div> <!-- end .main-content-->

    </div>

</body>

</html>
@show
@section('script_')
    <script>
        $(document).ready(function(){
            $('.alert').delay(4000).slideUp();
        });
    </script>
@show