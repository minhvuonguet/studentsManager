@extends('layouts.origin')
@section('title','Home')

@section('navViewUser')
@endsection



@section('navHome')
                    <li class=" nav-active active">
                        <a href="{{URL::to('home')}}">
                            <i class="glyphicon glyphicon-home fa-2x"></i>
                            <span style="font-size: 200%">Trang Chủ</span>
                        </a>
                    </li>
@endsection

@section('content')
<p>Cố vấn học tập</p>
@endsection