<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{csrf_token()}}}">
    <title> @yield('title')</title>
    <title> Đăng Nhập Hệ Thống Admin </title>
    <link href="{!! url('public/assets/Admin/css/bootstrap.css') !!}" rel="stylesheet">
    <link href="{!! url('public/assets/Admin/css/style_login.css') !!}" rel="stylesheet">
    <link href="{!! url('public/assets/Admin/css/customs.css') !!}" rel="stylesheet">



    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,900" >
    <link href="http://fonts.googleapis.com/css?family=Lato+Open+Sans:400,300,600,700" >;

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

    <div class="container-fuild">
        <div class="row">
            <div class="header col-sm-12">
                <div class="logo col-sm-3">
                    <img src="public/assets/Admin/images/uet_logo.png" alt="UET">
                </div>
                <div class="headContent col-sm-6">
                    <h2 class="text-center "> Hệ thống quản lí điểm rèn luyện sinh viên UET </h2>
                </div>
                <div class="headUser col-sm-3">
                    <p class="text-right"> xin chào bạn <strong> {{Auth::user()->name}} </strong>  <a href="{{ URL::to('logout') }}"><i class="icon-logout"></i> </a> </p>
                </div>
            </div>
            @section('main-parent')
                <div class="content">

                </div>
            @show
            <div class="bottom">

            </div>
        </div>

        <div>
            <button style="margin-left: 15px" > gửi phản hồi sv </button>

        </div>
    </div>

</body>