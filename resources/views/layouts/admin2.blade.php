<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{csrf_token()}}}">
    <title> @yield('title')</title>
    <title> Đăng Nhập Hệ Thống Admin2 </title>
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

		<style>
			body {
			    font-family: "Lato", sans-serif;
			}

			.sidenav {
			    height: 100%;
			    width: 0;
			    position: fixed;
			    z-index: 1;
			    top: 0;
			    left: 0;
			    background-color: #111;
			    overflow-x: hidden;
			    transition: 0.5s;
			    padding-top: 60px;
			}

			.sidenav a {
			    padding: 8px 8px 8px 32px;
			    text-decoration: none;
			    font-size: 25px;
			    color: #818181;
			    display: block;
			    transition: 0.3s;
			}

			.sidenav a:hover, .offcanvas a:focus{
			    color: #f1f1f1;
			}

			.sidenav .closebtn {
			    position: absolute;
			    top: 0;
			    right: 25px;
			    font-size: 36px;
			    margin-left: 50px;
			}

			#main {
			    transition: margin-left .5s;
			    padding: 16px;
			}

			@media screen and (max-height: 450px) {
			  .sidenav {padding-top: 15px;}
			  .sidenav a {font-size: 18px;}
			}
		</style>
</head>
<body>

    <div class="container-fuild">
        <div class="row">
            <div class="header col-sm-12">

                <div class="logo col-sm-3">
                    <img src="public/assets/Admin/images/uet_logo.png" alt="UET">
                </div>
                <div class="headContent col-sm-6">
                    <h2 class="text-center "> Hệ thống quản lí điểm rèn luyện sinh viên UET admin2</h2>
                </div>
                <div class="headUser col-sm-3">
                    <p class="text-right"> xin chào bạn <strong> {{Auth::user()->username}} </strong>  <a href="{{ URL::to('logout') }}"><i class="icon-logout"></i> </a> </p>
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
            <button style="margin-left: 15px" > gửi phản hồi sv admin2</button>

        </div>
    </div>

</body>
