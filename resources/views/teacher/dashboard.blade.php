

@extends('layouts.main')
@section('content')

<div class="container">
    <h4>Teacher Dashboard</h4>
    <a class="btn btn-secondary" href="{{ route('teacher.topics')}}" role="button">Create Topics</a>
    {{-- <a class="btn btn-secondary" href="{{ route('teacher.viewTopics')}}" role="button">View Topics</a> --}}
    {{-- <a class="btn btn-secondary" href="{{ route('teacher.exams')}}" role="button">Create Exam</a> --}}
    <div class="row">
        <div class="col-md-6 col-md-offset-3">          
            <h5>Teacher Information</h5>
            <table class="table table-hover">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                </thead>
                <tbody>
                    <td>{{$LoggedTeacherInfo['name'] }}</td>
                    <td>{{$LoggedTeacherInfo['email'] }}</td>
                    <td>{{$LoggedTeacherInfo['id'] }}</td>
                    <td><a href="{{ route('teacher.logout')}}">Logout</a></td>
                </tbody>
            </table>

            <h5>Topics</h5>
            {{ $LoggedTeacherInfo->topics }}
            <hr>


        </div>
        <br><br>
        <hr>

        
    </div>
</div>
@endsection