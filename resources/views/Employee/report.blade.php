@extends('layouts.origin')
@section('title','Phản Hồi')

@section('avatar')
    <center>
    	<img src="public\assets\Admin\images\avatars\{{$user->avatar}}.png" class="img-responsive img-circle" alt="friend 8" height="200" width="200">
    </center>
@endsection

@section('username')
	<center>{{$sinhvien->fullname}}</center>
@endsection

@section('navReport')
                    <li class="nav-active active">
                        <a href="{{URL::to('report')}}">
                            <i class="glyphicon glyphicon-send fa-2x"></i>
                            <span style="font-size: 200%">Phản hồi</span>
                        </a>
                    </li>
@endsection

@section('content')
	<p>{{$user->id_role}}</p>
	<p>{{$user->mssv}}</p>
@endsection