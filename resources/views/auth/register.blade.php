@extends('layouts.main')
@section('content')

    <div class="container">
        <h4>Register</h4>
        <form action="{{ route('auth.save')}}" method="post">
            @if (Session::get('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif
            @if (Session::get('fail'))
            <div class="alert alert-danger">
                {{Session::get('fail')}}
            </div>
            @endif
            
            
            
            {{csrf_field()}}
            <div class="form-group">
                <div class="label">Name</div>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="">
            </div>
            <span class="text-danger">@error('name') {{$message}} @enderror</span>
            <div class="form-group">
                <div class="label">Email</div>
                <input type="text" name="email" class="form-control"  value="{{ old('email') }}" id="">
            </div>
            <span class="text-danger">@error('email') {{$message}} @enderror</span>
            <div class="form-group">
                <div class="label">Password</div>
                <input type="password" name="password" class="form-control" id="">
            </div>
            <span class="text-danger">@error('password') {{$message}} @enderror</span>
            <br>
            <div class="form-group">
                <button class="btn btn-block btn-primary" type="submit">Register</button>
                <br><br>
                <a href="{{route('auth.login')}}">Login</a>
            </div>
        </form>
    </div>
@endsection