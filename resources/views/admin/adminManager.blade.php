@extends('layouts.admin')
@section('title', 'Trang Quản lí ')

<div class="container">
    <div class="row">
        {{--<button style="margin-top: 150px" > tinh diem </button>--}}
        <a href="{{ URL::to('caculate') }}"> tinh diem </a>
    </div>
</div>
<style>
    .row {
        margin-top:  200px;
    }
</style>