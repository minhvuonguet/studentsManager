@extends('layouts.admin')
@section('title',' List Admin')
@section('content')

<div class="newClass">
    <form action="postnewclass" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <h1> Thêm mới danh sách lớp </h1>

        <div class="form-group">
            <label for="classname">Tên lớp</label>
            <input type="text" class="form-control" id="classname" name="clasname" placeholder="Tên lớp">
        </div>
        <div class="form-group">
            <label for="getEx">import excels</label>
            <input type="file" name="fileExcels" id="getEx"></br>
            <button type="submit">Import</button>
        </div>

    </form>
</div>

@stop
