@extends('layouts.origin')
@section('title','Đọc file Excels')

@section('navExcels')
                        <li class="nav-active active">
                            <a href="{{URL::to('readExcels')}}">
                                <i class="glyphicon glyphicon-circle-arrow-up fa-2x"></i>
                                <span style="font-size: 200%">Excels</span>
                            </a>
                        </li>
@endsection

@section('content')
	<form action='updateDB' method="post" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<label>Chọn bảng</label>
	<select name="choseTable">
		<option value="students">Danh sách Sinh Viên mới</option>
		<option value="class">Danh sách Lớp học mới</option>
		<option value="presidentclass">Danh sách cán bộ Lớp</option>
		<option value="presidentgroup">Danh sách cán bộ Đoàn</option>
		<option value="adviser">Danh sách Cố Vấn Học Tập</option>
		<option value="violateytsv">Danh sách vi phạm Ý Thức Sinh Viên</option>
		<option value="violateytcd">Danh sách vi phạm Ý thức Công Dân</option>
		<option value="bonus">Danh sách khen thưởng</option>
	</select></br>
	<label>Chọn file tải lên</label>
	<input type="file" name="fileExcels"></br>
	<button type="submit">Import</button>
	</form>
@endsection