@extends('layouts.origin')
@section('title','Hi Student')

@section('avatar')
    <center>
    	<img src="public\assets\Admin\images\avatars\{{$avatar}}.png" class="img-responsive img-circle" alt="friend 8" height="200" width="200">
    </center>
@endsection

@section('username')
	<center>{{$username}}</center>
@endsection

@section('navbar')
	@parent
@endsection

@section('content')
	<p>{{$id_role}}</p>
	<p>{{$mssv}}</p>
@endsection