@extends('layouts.admin')
@section('title',' List Admin')
@section('content')

        <h1> Danh sách sinh viên </h1>
        <select>
            {{--*/  $stt = 1 /*--}}
            @foreach($list_class as $list)
                <option> {{$stt}} : {{$list}} </option>
                {{--*/ $stt++ /*--}}
            @endforeach
        </select>
        <table class="table table-bordered">
            <tr>
                <th class="col-md-1"> STT </th>
                <th class="col-md-1"> MSSV </th>
                <th class="col-md-3"> Họ Têm</th>
                <th class="col-md-1"> Lớp </th>
                <th class="col-md-2"> Ngày Sinh</th>
                <th class="col-md-3"> email </th>
                <th class="col-md-1"> Điểm rèn luyện </th>
            </tr>
            {{--*/  $dem = 1 /*--}}
            @foreach($list_sinh_vien as $sinh_vien)

                <tr >
                    <td>{{$dem}}</td>
                    <td>{{$sinh_vien->mssv}}</td>
                    <td >{{$sinh_vien->fullname}} </td>
                    <td >{{$sinh_vien->class}} </td>
                    <td >{{$sinh_vien->birthday}} </td>
                    <td >{{$sinh_vien->email}} </td>
                    <td> {{$sinh_vien->point}} </td>
                </tr>
                {{--*/ $dem++ /*--}}

            @endforeach
        </table>


@stop
