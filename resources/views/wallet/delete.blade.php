@extends('layouts.app')
@section('content')
    <h1>Xóa Wallet {{$wallet->name}}</h1>
    <div class="row">
        <div class="form-three widget-shadow">
            <form name="category" action="{{route('user.wallet.destroy')}}" method="post" class="form-horizontal">
                @csrf
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </div>
            </form>
        </div>
    </div>

@endsection
