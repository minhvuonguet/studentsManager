@extends('layouts.origin')
@section('title','Xem Điểm')

@section('navShowPoint')
                    <li class="nav-active active">
                        <a href="{{URL::to('showPoint')}}">
                            <i class="glyphicon glyphicon-list-alt fa-2x"></i>
                            <span style="font-size: 200%">Xem Điểm</span>
                        </a>
                    </li>
@endsection

@section('content')
	<h1 class="text-center">Điểm rèn luyện của {{$sinhvien->fullname}}</h1>
    <form>
        {{csrf_field()}}
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <table class="table table-bordered">
            <tr>
                <th class="col-md-9"> Nội dung đánh giá </th>
                <th class="col-md-1"> Điểm cộng/trừ </th>
            </tr>
            <tr>
                <td  class="col-md-9"> <strong> 1. Ý thức học tập </strong> </td>
                <td  class="col-md-1">30</td>
            </tr>
            <tr>
                <td><strong>2. Ý thức và kết quả chấp hành nội quy, quy chế trong nhà trường</strong></td>
                <td >25</td>
            </tr>
            <tr>
                <td><strong>3. Ý thức và kết quả tham gia hoạt động chính trị - xã hội, văn hoá, văn nghệ, thể thao, phòng chống các tệ nạn xã hội</strong></td>
                <td >20</td>
            </tr>
            <tr>
                <td> <strong>4. Về phẩm chất công dân và quan hệ với cộng đồng</strong></td>
                <td >15</td>
            </tr>
            <tr>
                <td> <strong>5. Ý thức và kết quả tham gia công tác phụ trách lớp, các đoàn thể, tổ chức trong nhà trường hoặc đạt được thành tích đặc biệt trong học tập, rèn luyện của học sinh, sinh viên</strong></td>
                <td >10</td>
            </tr>
            <tr>
                <td><strong>Tổng cộng (1.+2.+3.+4.+5.) [0, 100]</strong></td>
                <td >100</td>
            </tr>

            <tr>
                <td>Xếp loại</td>
                <td >Giỏi</td>
            </tr>
        </table>
    </form>
@endsection