<?php

namespace App\Http\Controllers;
use App\Models\Teacher;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherAPIController extends Controller
{
    function list(){
        return Teacher::all();
    }

     function add(Request $request){
        $tr = new Teacher;
        $tr->name = $request->name;
        $tr->email = $request->email;
        $tr->password = Hash::make($request->password);
        $result = $tr->save();
   
         if( $result) {
             return["Result"=>"Successful"];
         }else{
             return["Result"=>"Failed"];
         }
    }
}

