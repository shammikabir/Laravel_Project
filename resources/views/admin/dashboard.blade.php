@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h4>Dashboard</h4>
            <table class="table table-hover">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                </thead>
                <tbody>
                    <td>{{$LoggedUserInfo['name'] }}</td>
                    <td>{{$LoggedUserInfo['email'] }}</td>
                    <td><a href="{{ route('auth.logout')}}">Logout</a></td>
                </tbody>
            </table>
        </div>
    </div>

    <a class="btn btn-primary" href="{{route('TeacherList')}}">Teacher Details</a>

</div>
@endsection