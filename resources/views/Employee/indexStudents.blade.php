@extends('layouts.origin')
@section('title','Hi Student')

@section('avatar')
    <img src="public\assets\Admin\images\avatars\{{$avatar}}.png" class="img-responsive img-circle" alt="friend 8">
@endsection

@section('username')
	<center>{{$username}}</center>
@endsection

@section('navbar')
	@parent
@endsection

@section('content')

@endsection