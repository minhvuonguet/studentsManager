@extends('layouts.admin')
@section('title', 'Trang Quản lí ')

<div class="container">
    <div class="row">
        <button style="margin-top: 150px" > tinh diem </button>
        <form action='showExcels' method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label>import excels</label>
            <input type="file" onchange="this.form.submit();" name="fileExcels"></br>
            <!-- <button type="submit">Import</button> -->
        </form>
    </div>
</div>
