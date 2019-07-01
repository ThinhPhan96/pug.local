@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$user->name}}</h1>
        <div style="margin: 20px 0">
                <a href ="{{ route('user.bill.export') }}" class="btn btn-info export" id="export-button"> Xuất file excel </a>
            <a href="{{route('user.index')}}"class="btn btn-info">Về trang người dùng</a>
        </div>
        <div class="tables container">
            <div class="table-responsive bs-example widget-shadow">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Tên Giao dịch</th>
                        <th>Phí giao dịch</th>
                        <th>Thời gian</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($collects as $collect)
                    <tr>
                        <td>{{$collect->name}}</td>
                        <td> + {{number_format($collect->money)}}</td>
                        <td>{{$collect->created_at}}</td>
                    </tr>
                        @endforeach
                    @foreach($pays as $pay)
                        <tr>
                            <td>{{$pay->name}}</td>
                            <td> - {{number_format($pay->money)}}</td>
                            <td>{{$pay->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection