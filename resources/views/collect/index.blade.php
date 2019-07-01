@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$user->name}}</h1>
        <div style="margin: 20px 0">
            <a href="{{route('user.collect.create')}}"class="btn btn-success"> Thêm Thu</a>

            <a href="{{route('user.index')}}"class="btn btn-info">Về trang người dùng</a>
        </div>
        <div class="tables container">
            <div class="table-responsive bs-example widget-shadow">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Tên Thu</th>
                        <th>số tiền</th>
                        <th>Mô tả</th>
                        <th>Ngày tạo</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($collects as $collect)
                    <tr>
                        <td>{{$collect->name}}</td>
                        <td>{{number_format($collect->money)}}</td>
                        <td>{{$collect->desc}}</td>
                        <td>{{$collect->created_at}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection