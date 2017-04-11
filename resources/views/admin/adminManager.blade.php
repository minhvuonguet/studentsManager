@extends('layouts.admin')
@section('title',' List Admin')
@section('content')


        <button style="margin-top: 150px" > tinh diem </button>

        <form action='updateDB' method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label>import excels</label>
            <input type="file" onchange="this.form.submit();" name="fileExcels"></br>
        </form>

<style>
    .row {
        margin-top:  200px;
    }
</style>
@stop