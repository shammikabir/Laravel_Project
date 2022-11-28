@extends('layouts.main')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><h1>Edit Teacher Details</h1></div>

<div class="card">
    <div class="card-body">
        <form action="{{route('teacherEdit')}}" method="post">
            @csrf
            

            {{-- @if(Session::has('success') )
            <div class="alert alert-success" role="alert">{{Session::get ('success')}}</div>
            @endif
            @if(Session::has('fail') )
            <div class="alert alert-danger" role="alert">{{Session::get ('fail')}}</div>
            @endif --}}
            </div> 
            <div style="font-weight:bold">
            <span>name:</span>
            <input type="text" name="name" value = "{{$teacher->name}}"  class="form-control">
            {{-- @error('FirstName') --}}
            {{-- <span style="color:red">
              {{$message}}
            </span>
          @enderror --}}
            </div>
            <div style="font-weight:bold">
                <br>
                <span>email</span>
            <input type="text" name="LastName" value="{{$teacher->email}}"  class="form-control">
{{--            
            @error('LastName')
            <span style="color:red">
              {{$message}}
            </span>
          @enderror --}}
            </div>
          
          {{-- <div style="font-weight:bold">  
            <span>
            Course:
          </span>
            <input type="text" name="Course" placeholder="Course Name" value="{{old('Course')}}" class="form-control"> 
          
            @error('Course')
            <span style="color:red">
              {{$message}}
            </span>
          @enderror --}}
          
            
          
                    
             <div class="text- center">
            
             <input type="submit" class="btn btn-primary" value="Update" />
             </div>
          </form>  
          </body>  
          </html>  
        
            

@endsection