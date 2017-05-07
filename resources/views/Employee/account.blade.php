@extends('layouts.origin')
@section('title','Tài Khoản')

@section('navAccount')
                    <li class="nav-active active">
                        <a href="{{URL::to('account')}}">
                            <i class="glyphicon glyphicon-user fa-2x"></i>
                            <span style="font-size: 200%">Tài Khoản</span>
                        </a>
                    </li>
@endsection

@section('navAddExcels')
@endsection
@section('navShowExcels')
@endsection

@section('content')
	<p>{{$user->id_role}}</p>
	<p>{{$user->mssv}}</p>
@endsection