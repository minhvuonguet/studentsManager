@extends('layouts.admin')
@section('title',' List Admin')
@section('content')

<div class="newClass">
    <form action="postnewclass" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <h1> Thêm mới danh sách </h1>
        <select name="type_file">
            <option selected value="list_class" > Danh sách lớp</option>
            <option value="list_ad_class"> Danh sách cán bộ lớp</option>
            <option value="list_ad_class_bang_diem"> Kết Quả Học Tập </option>
            <option value="list_ad_class_khen_thuong"> Khen Thưởng </option>
            <option value="list_vi_pham_quyche_thi"> Vi Phạm Quy Chế Thi </option>
            <option value="list_nghien_cuu_khoa_hoc"> Nghiên Cứu Khoa Học </option>
            <option value="list_vi_pham_sh_lop"> Vi Phạm Sinh Hoạt Lớp  </option>
        </select>
        {{--<div class="form-group">--}}
            {{--<label for="classname">Tên lớp</label>--}}
            {{--<input type="text" class="form-control" id="classname" name="clasname" placeholder="Tên lớp">--}}
        {{--</div>--}}
        <div class="form-group">
            <label for="getEx">import excels</label>
            <input type="file" name="fileExcels" id="getEx"></br>
            <button type="submit">Import</button>
        </div>

    </form>


</div>

@stop
