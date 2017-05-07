@extends('layouts.origin')
@section('title','Tài Khoản')

@section('avatar')
    <center>
    	<img src="public\assets\Admin\images\avatars\{{$user->avatar}}.png" class="img-responsive img-circle" alt="friend 8" height="200" width="200">
    </center>
@endsection

@section('username')
	<center>{{$sinhvien->fullname}}</center>
@endsection

@section('navAccount')
                    <li class="nav-active active">
                        <a href="{{URL::to('account')}}">
                            <i class="glyphicon glyphicon-user fa-2x"></i>
                            <span style="font-size: 200%">Tài Khoản</span>
                        </a>
                    </li>
@endsection

@section('content')
	<p>{{$user->id_role}}</p>
	<p>{{$user->mssv}}</p>
@endsection