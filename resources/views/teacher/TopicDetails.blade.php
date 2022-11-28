@extends('layouts.main')
@section('content')

<div class="card">
    <div class="card-header">
    </div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><h1>Topic Details</h1></div>
            <div class="col col-md-10">





 </div>
 <br><br>
 <hr>

 <table class="table table-success table-striped ">
     <thead class="table-dark">
     <tr>
         <th scope="col">id</th>
         <th scope="col">Topics Name</th>
         <th scope="col">Teacher Id</th>
         {{-- <th scope="col">Password</th> --}}
{{--             
         <th scope="col">Edit</th>
         <th scope="col"> Delete</th> --}}
         
         
         
     </tr>
     </thead>
     <br> 
     @foreach($toics as $topic)
     <tr> 
         <td>{{$topic['id']}}</td>
         <td>{{$topic['topics_name']}}</td>
         <td>{{$topic['teacher_id']}}</td>
         {{-- <td>{{$user['password']}}</td> --}}
     
​
         {{-- <td><a href="StudentEdit/{{$user->id}}" class="btn btn-info">Edit</button></a>
         <td><a href= "StudentDelete/{{$user->id}}" class="btn btn-danger">Delete</button></a> 
             </td> --}}

     </tr>
     
    
     @endforeach
      
 
 </table>

 
</div>
</div>
@endsection