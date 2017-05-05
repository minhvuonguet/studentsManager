@extends('layouts.origin')
@section('title','Đọc file Excels')

@section('avatar')
    <img src="public\assets\Admin\images\avatars\{{$user->avatar}}.png" class="img-responsive img-circle" alt="friend 8" height="200" width="200">
@endsection

@section('username')
	<center>{{$user->username}}</center>
@endsection

@section('navHome')
	@parent
@endsection

@section('navShowPoint')
@endsection

@section('navReport')
@endsection

@section('navExtra')
					<li class="nav-parent">
                        <a href="{{ URL::to('readExcels') }}" class="test_">
                            <i class="icon-puzzle"></i>
                            <span>Thêm Danh Sách</span> 
                        </a>
                    </li>

                    <li class="nav-parent">
                        <a href="{{ URL::to('formdiem') }}" class="test_">
                            <i class="icon-puzzle">
                            </i>
                            <span> Form điểm rèn luyện </span> 
                        </a>
                    </li>

                    <li class="nav-parent">
                        <a href="{{ URL::to('newclass') }}" class="test_"><i class="icon-puzzle"></i><span>Thêm danh sách lớp</span> </a>
                    </li>

                    <li class="nav-parent">
                        <a href="{{ URL::to('done_import') }}" class="test_"><i class="icon-puzzle"></i><span>xem danh sách sv</span> </a>
                    </li>
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
	<p>{{$user}}</p>
	</form>
@endsection