@extends('layouts.main')
@section('content')
    <div class="container">
        <h4>Topics/Courses</h4>
            <p>
                {{$courses->topics}}
            </p>
            


            <a href="{{route('teacher.dashboard')}}" class="btn btn-secondary btn-sm">Back</a>
    </div>
@endsection

