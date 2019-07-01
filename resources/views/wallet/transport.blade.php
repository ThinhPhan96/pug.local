@extends('layouts.app')
@section('content')
    <h1>Chuyển khoản</h1>
    <div class="row">
        <div class="form-three widget-shadow">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form name="category" action="{{route('user.wallet.transporter')}}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Số tk</label>
                    <div class="col-sm-8">
                        <select name="id">
                            @foreach($wallet as $vi)
                                <option>{{$vi->id}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Số tiền</label>
                    <div class="col-sm-8">
                        <input type="text" name="money" value="{{old('money')}}" class="form-control1" id="focusedinput" placeholder="Default Input">
                    </div>
                </div>
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection