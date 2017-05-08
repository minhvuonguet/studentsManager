@extends('layouts.origin')
@section('title','Home')

@section('navViewUser')
@endsection



@section('navHome')
                    <li class=" nav-active active">
                        <a href="{{URL::to('home')}}">
                            <i class="glyphicon glyphicon-home fa-2x"></i>
                            <span style="font-size: 200%">Trang Chủ</span>
                        </a>
                    </li>
@endsection

@section('navAdmin')
                    <li class="nav-parent">
                        <a href="{{URL::to('view')}}">
                            <i class="glyphicon glyphicon-list-alt fa-2x"></i>
                            <span style="font-size: 200%">Quản Lý Form</span>
                        </a>
                    </li>

                    <li class="nav-parent">
                        <a href="{{URL::to('view')}}">
                            <i class="glyphicon glyphicon-plus fa-2x"></i>
                            <span style="font-size: 200%">Tính Điểm</span>
                        </a>
                    </li>

                    <li class="nav-parent">
                        <a href="{{URL::to('view')}}">
                            <i class="glyphicon glyphicon-stats fa-2x"></i>
                            <span style="font-size: 200%">Thống kê</span>
                        </a>
                    </li>
@endsection

@section('content')
<p>Phòng công tác sinh viên</p>
@endsection