@extends('layouts.main')
@section('content')


    <div class="container">
        <h4>Create Exam </h4>
        <form action=" {{ route('teacher.exams') }} " method="POST">
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
                <input type="text" name="exam_name" class="form-control" id="">
            </div>
            <span class="text-danger">@error('exam_name') {{$message}} @enderror</span>

            <div class="form-group">
                <div class="label">TeacherID</div>
                <input type="text" name="teacher_id" class="form-control" id="" value="{{$LoggedTeacherInfo['id']}}" placeholder="{{$LoggedTeacherInfo['id']}}">
            </div>
            <br>
            <div class="form-group">
                <button class="btn btn-block btn-info" type="submit">Create</button>
                <br><br>
                <a href="{{route('teacher.dashboard')}}" class="btn btn-secondary btn-sm">Back</a>
            </div>

        </form>
    </div>
@endsection