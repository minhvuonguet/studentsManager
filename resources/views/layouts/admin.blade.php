<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{csrf_token()}}}">
    <title> @yield('title')</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="header">
                <div class="logo">

                </div>
                <div class="headContent">

                </div>
                <div class="headUser">
                    <p> xin chào bạn {{Auth::user()->name}}  <a href="{{ URL::to('logout') }}">logout</i> </a> </p>

                </div>
            </div>
            <div class="container">

            </div>
            <div class="bottom">

            </div>
        </div>
    </div>
</body>