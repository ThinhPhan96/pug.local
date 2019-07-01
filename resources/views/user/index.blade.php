@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>{{$users->name}}</h1>
    <div style="margin: 20px 0">
        @if( $wallet == null )
            <a href="{{route('user.wallet.create')}}"class="btn btn-success"> Tạo Wallet</a>
        @else
            <a href="{{route('user.wallet.index')}}"class="btn btn-info">Wallet</a>
            <a href="{{route('user.collect.index')}}"class="btn btn-success"> Thu phí</a>
            <a href="{{route('user.pay.index')}}"class="btn btn-success"> Trả phí</a>
            <a href="{{route('user.bill.index')}}"class="btn btn-success"> Giao dịch</a>

        @endif


    </div>
    <div class="tables container">
        <div class="table-responsive bs-example widget-shadow">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Tên</th>
                    <th>email</th>
                    <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$users->name}}</td>
                        <td>{{$users->email}}</td>
                        <td>
                            <a href="{{route('user.edit')}}" class="btn btn-warning">Sửa</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection