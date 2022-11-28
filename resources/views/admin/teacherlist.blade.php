@extends('layouts.main')
@section('content') 
<div class="card">
    <div class="card-header">
    </div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><h1>Teacher Details</h1></div>
            <div class="col col-md-10">
                <a href="{{route('TeacherCreate')}}" class="btn btn-info">Add</button></a> 
            </div>
        </div>
    </div>
 <table class="table table-success table-striped ">
        <thead class="table-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            {{-- <th scope="col">Password</th> --}}
{{--             
            <th scope="col">Edit</th>
            <th scope="col"> Delete</th> --}}
            
            
            
        </tr>
        </thead>
        <br> 
        @foreach($teachers as $teacher)
        <tr> 
            <td>{{$teacher['id']}}</td>
            <td>{{$teacher['name']}}</td>
            <td>{{$teacher['email']}}</td>
            {{-- <td>{{$user['password']}}</td> --}}
            <td><a href="teacherEdit/{{$teacher->id}}" class="btn btn-info">Edit</button></a>
            {{-- <td><a href= "teacherDelete/{{$teacher->id}}" class="btn btn-danger">Delete</button></a>  --}}
        
​
            {{-- <td><a href="StudentEdit/{{$user->id}}" class="btn btn-info">Edit</button></a>
            <td><a href= "StudentDelete/{{$user->id}}" class="btn btn-danger">Delete</button></a> 
                </td> --}}

        </tr>
        
       
        @endforeach
         
    
    </table>
    <a href="{{route('admin.dashboard')}}" class="btn btn-info">Back</button></a> 
   @endsection 