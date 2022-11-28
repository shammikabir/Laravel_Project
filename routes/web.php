<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\AuthCheck;
use App\Http\Middleware\TeacherCheck;
use App\Models\Topic;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// ___________________________________________________________________________
//                            Admin Route
// ___________________________________________________________________________

Route::post('/auth/save',[MainController::class, 'save'])->name('auth.save');
Route::post('/auth/check',[MainController::class,'check'])->name('auth.check');
Route::get('/auth/logout',[MainController::class,'logout'])->name('auth.logout');


Route::get('/TeacherCreate', function () {
    return view('admin.TeacherCreate');
});

Route::post('/TeacherCreate', [MainController::class, 'TeacherAdd'])->name('TeacherCreate');


Route::get('/TeacherList', [MainController::class, 'TeacherDetails'])->name('TeacherList');

// Route::post('/TeacherList', [AdminController::class, 'TeacherDetails'])->name('TeacherList');
    Route::get('/auth/login',[MainController::class, 'login'])->name('auth.login');
    Route::get('/auth/register',[MainController::class, 'register'])->name('auth.register');

Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/admin/dashboard',[MainController::class,'dashboard'])->name('admin.dashboard');

    Route::get('/teacherEdit/{id}', [MainController::class, 'teacherEditDetails'])->name('teacherEdit');
// Route::post('/teacherEdit', [TeacherController::class, 'StudentEditSubmit'])->name('StudentEdit');
});

// ___________________________________________________________________________
//                            Teacher Route
// ___________________________________________________________________________
Route::get('/teacher/topics',[TeacherController::class,'topics'])->name('teacher.topics');
Route::post('/teacher/topics',[TeacherController::class,'topicsSave'])->name('teacher.topicsSave');

Route::get('/teacher/exams',[TeacherController::class,'exams'])->name('teacher.exams');
Route::post('/teacher/exams',[TeacherController::class,'examsSave'])->name('teacher.examsSave');


Route::get('/teacher/viewTopics',[TeacherController::class,'viewTopics'])->name('teacher.viewTopics');

Route::post('/teacher/save',[TeacherController::class, 'save'])->name('teacher.save');
Route::post('/teacher/check',[TeacherController::class,'check'])->name('teacher.check');
Route::get('/teacher/logout',[TeacherController::class,'logout'])->name('teacher.logout');




Route::group(['middleware'=>['TeacherCheck']], function(){
    Route::get('/teacher/login',[TeacherController::class, 'login'])->name('teacher.login');
    Route::get('/teacher/register',[TeacherController::class, 'register'])->name('teacher.register');

    
    Route::get('/teacher/dashboard',[TeacherController::class,'dashboard'])->name('teacher.dashboard');
      
        
});


// ___________________________________________________________________________
//                            Student Route
// ___________________________________________________________________________
    Route::get('/student/login',[StudentController::class, 'login'])->name('student.login');
    Route::get('/student/register',[StudentController::class, 'register'])->name('student.register');
    //need to add middleware

    Route::post('/student/save',[StudentController::class, 'save'])->name('student.save');
    Route::post('/student/check',[StudentController::class,'check'])->name('student.check');
    Route::get('/student/logout',[StudentController::class,'logout'])->name('student.logout');

    Route::get('/student/dashboard',[StudentController::class,'dashboard'])->name('student.dashboard');//need to add middleware

    //Route::get('/StudentDashboard', [MainController::class, 'TeacherDetails'])->name('StudentList');