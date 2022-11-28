<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\Teacher;
use App\Models\Topic;


class MainController extends Controller
{
    function login(){
        return view('auth.login');
    }
    function register(){
        return view('auth.register');
    }
    function save(Request $request){
        $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required'
        ]);
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $save = $admin->save();

        if($save){
            return back()->with('success','Registration has been successful');
        }
        else{
            return back()->with('fail','Try Again, Something wrong');
        }
    }



    function check(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $userInfo = Admin::where('email','=',$request->email)->first();

        if(!$userInfo){
            return back()->with('fail','User not found');   
        }
        else{
            if(Hash::check($request->password,$userInfo->password)){
                $request->session()->put('LoggedUser',$userInfo->id);
                return redirect('admin/dashboard');
            }
            else{
                return back()->with('fail','Password is not correct!');
            }
        }
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login'); //redirect to home page future 
        }
    }

    function dashboard(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.dashboard',$data);
    }
    public function TeacherDetails(){
       $teacher= Teacher::all();
       return view ('admin.TeacherList',['teachers'=> $teacher]);
   }

   public function TeacherAdd(Request $request){



    $request->validate([

        'name'=>'required',

        'email' => 'required|email|unique:teachers',

        'password' => 'required'

    ]);

   

    $teacher = new Teacher;

    $teacher->name = $request->name;

    $teacher->email = $request->email;

   $teacher->password = Hash::make($request->password);

    $save = $teacher->save();

    return redirect('admin/TeacherList');



    // if($save){

    //     return back()->with('success','Registration has been successful');

    // }

    // else{

    //     return back()->with('fail','Try Again, Something wrong');

    // }


}  public function teacherEditDetails(Request $request){

    $teacher=Teacher::where('id',$request->id)->first();


    return view('admin.teacherEdit')->with('teacher',$teacher);
}




}
