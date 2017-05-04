@extends('layouts.origin')
@section('title','Hi Student')

@section('avatar')
    <img src="public\assets\Admin\images\avatars\{{$avatar}}.png" class="img-responsive img-circle" alt="friend 8" height="200" width="200">
@endsection

@section('username')
	<center>{{$username}}</center>
@endsection

@section('navbar')
	@parent
@endsection

@section('content')
	<form action='updateDB' method="post" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<label>Chọn bảng</label>
	<select name="choseTable">
		<option value="sinhvien">Danh sách Sinh Viên</option>
		<option value="NCKH">Danh sách Nghiên Cứu Khoa Học</option>
		<option value="YTCD">Danh sách Ý Thức Công Dân</option>
		<option value="YTSV">Danh sách Ý Thức Sinh Viên</option>
		<option value="HDDT">Danh sách Hoạt Động Đoàn THể</option>
	</select></br>
	<label>Chọn file tải lên</label>
	<input type="file" name="fileExcels"></br>
	<button type="submit">Import</button>
	</form>
@endsection