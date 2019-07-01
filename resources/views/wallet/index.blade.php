@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$user->name}}</h1>
        <div style="margin: 20px 0">
            <a href="{{route('user.index')}}"class="btn btn-info">Về trang người dùng</a>
        </div>
        <div class="tables container">
            <div class="table-responsive bs-example widget-shadow">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Tên Wallet</th>
                        <th>số tk</th>
                        <th>Tiền trong ví</th>
                        <th>Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                        <td>{{$wallet->name}}</td>
                        <td>{{$wallet->id}}</td>
                        <td>{{number_format($wallet->money)}}</td>
                        <td>
                            <a href="{{route('user.wallet.edit')}}" class="btn btn-warning">Sửa</a>
                            <a href="{{route('user.wallet.delete')}}" class="btn btn-danger">Xóa</a>
                            <a href="{{route('user.wallet.transport')}}" class="btn btn-info">Chuyển khoản</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection