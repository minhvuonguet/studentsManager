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
                {{--<a href="#">MVH - UET</a>--}}
            </h1>
        </div>
        <div class="sidebar-inner">
            <div class="sidebar-top big-img">
                <div class="user-image">
                    {{--@if(Auth::user()->image)--}}
                        {{--<img src="public/uploads/admin_img/{{Auth::user()->image}}" class="img-responsive img-circle" alt="friend 8">--}}
                    {{--@else--}}
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

                <li class=" nav-active active"><a href="javascript:void(0)"><i class="icon-home"></i><span>Admin Manager</span></a></li>
                <li class="nav-parent">
                    <a href="{{ URL::to('formdiem') }}" class="test_"><i class="icon-puzzle"></i><span> Form điểm rèn luyện </span> </a>
                </li>
                <li class="nav-parent">
                    <a href="{{ URL::to('newclass') }}" class="test_"><i class="icon-puzzle"></i><span> Import Danh Sách</span> </a>
                </li>
                <li class="nav-parent">
                    <a href="{{ URL::to('done_import') }}" class="test_"><i class="icon-puzzle"></i><span>Xem danh sách</span> </a>
                </li>
                <li class="nav-parent">
                    <a href="{{ URL::to('coVanHocTap.listCoVanHocTap') }}" class="test_"><i class="icon-puzzle"></i><span>Danh Sách Cố Vấn Học Tập </span> </a>
                </li>
                <li class="nav-parent">
                    <a href="{{ URL::to('doanVien.listDoanVien') }}" class="test_"><i class="icon-puzzle"></i><span>Danh Sách Vi Phạm </span> </a>
                </li>
                <li class="nav-parent">
                    <a href="{{ URL::to('phanHoi.phan_hoi') }}" class="test_"><i class="icon-puzzle"></i><span>Xử Lý Phản Hồi </span> </a>
                </li>
                <li class="nav-parent">
                    <a href="{{ URL::to('khenThuong.khen_thuong') }}" class="test_"><i class="icon-puzzle"></i><span>Khen Thưởng </span> </a>
                </li>

                <li class="nav-parent">
                    <a href="{{URL::to('tinhdiem')}}"><i class="icon-screen-desktop"></i><span>Tính điểm</span> </a>

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