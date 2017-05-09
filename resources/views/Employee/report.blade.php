@extends('layouts.origin')
@section('title','Phản Hồi')

@section('navReport')
                    <li class="nav-active active">
                        <a href="{{URL::to('report')}}">
                            <i class="glyphicon glyphicon-send fa-2x"></i>
                            <span style="font-size: 200%">Phản hồi</span>
                        </a>
                    </li>
@endsection

@section('content')
	<center><h1>Gửi Phản Hồi</h1></center>
	<form action='' method="post" enctype="multipart/form-data">
		{{ csrf_token }}
		<section>
			<option></option>
			<option></option>
		</section>
		<input type="text" name="reportText">
	</form>
@endsection