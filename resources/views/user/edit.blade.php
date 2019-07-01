@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Sửa {{$users->name}}</h1>
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
            <form name="user" action="{{route('user.update')}}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Tên User</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" value="{{$users->name}}" class="form-control1" id="focusedinput" placeholder="Default Input">
                    </div>
                </div>
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
