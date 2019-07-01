@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$user->name}}</h1>
        <div style="margin: 20px 0">
            <a href="{{route('user.pay.create')}}"class="btn btn-success"> Thêm trả</a>

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
                    @foreach($pays as $pay)
                    <tr>
                        <td>{{$pay->name}}</td>
                        <td>{{number_format($pay->money)}}</td>
                        <td>{{$pay->desc}}</td>
                        <td>{{$pay->created_at}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection