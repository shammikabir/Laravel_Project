<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    //  public function dashboard(){

      
    //     $student= Student::all();

    //    return view ('/student/dashboard', ['students'=> $student]);

    //   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    function login(){
        return view('student.login');
    }

    function register(){
        return view('student.register');
    }
    function save(Request $request){
        $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:students',
            'password' => 'required'
        ]);
        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $save = $student->save();

        if($save){
            return back()->with('success','Registration has been successful');
        }
        else{
            return back()->with('fail','Try Again, Something wrong');
        }
    }


    //login 

    function check(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $userInfo = Student::where('email','=',$request->email)->first();

        if(!$userInfo){
            return back()->with('fail','User not found');   
        }
        else{
            if(Hash::check($request->password,$userInfo->password)){
                $request->session()->put('LoggedStudent',$userInfo->id);
                return redirect('student/dashboard');
            }
            else{
                return back()->with('fail','Password is not correct!');
            }
        }
    }

    function logout(){
        if(session()->has('LoggedStudent')){
            session()->pull('LoggedStudent');
            return redirect('/student/login'); //redirect to home page future 
        }
    }

    function dashboard(){
        $data = ['LoggedStudentInfo'=>Student::where('id','=',session('LoggedStudent'))->first()];

        $student= Student::all();


        // $topics = Topic::with('teacher_id','=',session('LoggedTeacher'))->get();
        // return view('teacher.dashboard',$data)->with($topics);
        return view ('/student/dashboard', ['students'=> $student]);
    }


}
