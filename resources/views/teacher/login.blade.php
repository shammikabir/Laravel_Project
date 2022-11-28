@extends('layouts.main')
@section('content')

    <div class="container">
        <h4>Login</h4>
        <form action="{{ route('teacher.check')}}" method="post">
            {{csrf_field()}}

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
            

            <div class="form-group">
                <div class="label">Email</div>
                <input type="text" name="email" class="form-control" id="">
            </div>
            <span class="text-danger">@error('email') {{$message}} @enderror</span>
            <div class="form-group">
                <div class="label">Password</div>
                <input type="text" name="password" class="form-control" id="">
            </div>
            <span class="text-danger">@error('password') {{$message}} @enderror</span>
            <br>
            <div class="form-group">
                <button class="btn btn-block btn-primary" type="submit">Login</button>
                <br><br>
                <a href="{{route('teacher.register')}}">Create Account</a>
            </div>
        </form>
    </div>
@endsection