<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Exam;
use App\Models\Topic;
use App\Http\Controllers\Auth;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreTeacherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeacherRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeacherRequest  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }

    function login(){
        return view('teacher.login');
    }

    function register(){
        return view('teacher.register');
    }
    function save(Request $request){
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

        $userInfo = Teacher::where('email','=',$request->email)->first();

        if(!$userInfo){
            return back()->with('fail','User not found');   
        }
        else{
            if(Hash::check($request->password,$userInfo->password)){
                $request->session()->put('LoggedTeacher',$userInfo->id);
                return redirect('teacher/dashboard');
            }
            else{
                return back()->with('fail','Password is not correct!');
            }
        }
    }

    function logout(){
        if(session()->has('LoggedTeacher')){
            session()->pull('LoggedTeacher');
            return redirect('/teacher/login'); //redirect to home page future 
        }
    }

    function dashboard(){
        $data = ['LoggedTeacherInfo'=>Teacher::where('id','=',session('LoggedTeacher'))->first()];
        // $topics = Topic::with('teacher_id','=',session('LoggedTeacher'))->get();
        // return view('teacher.dashboard',$data)->with($topics);
        return view('teacher.dashboard',$data);
    }


    function topics(){
        $data = ['LoggedTeacherInfo'=>Teacher::where('id','=',session('LoggedTeacher'))->first()];
        return view('teacher.topics',$data);
    }
    function topicsSave(Request $request){
        $request->validate([
            'topics_name'=>'required|min:4',
        ]);

        $topic = new Topic;
        $topic->topics_name = $request->topics_name;	
        $topic->teacher_id = $request->teacher_id;
        $save = $topic->save();

        if(!$save){
            return back()->with('fail','Failed To connect database');
        }
        else{
            return back()->with('success','Successfully Created');
        }
    }
    function viewTopics(){
        $data = ['courses'=>Topic::where('teacher_id','=',session('LoggedTeacher'))->first()];
        
        return view('teacher.viewTopics',$data);
    }


    function exams(){
       $data = ['LoggedTeacherInfo'=>Teacher::where('id','=',session('LoggedTeacher'))->first()];
        return view('teacher.exams')->with($data);
    }

    function examsSave(Request $request){
        $request->validate([
            'exam_name'=>'required|min:4',
        ]);

        $exams = new Exam;
        $exams->exam_name = $request->exam_name;	
        $exams->teacher_id = $request->teacher_id;
        $save = $exams->save();

        if(!$save){
            return back()->with('fail','Failed To connect database');
        }
        else{
            return back()->with('success','Successfully Created');
        }
    }

    // function list(){
    //     return Teacher::all();
    // }






    




}
