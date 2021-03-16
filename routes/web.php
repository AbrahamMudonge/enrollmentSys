<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\CourseInstructorController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

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
Auth::routes(['verify'=>true]);

Route::group(  ['middleware'=>['web','auth','verified']],
function(){
    
    Route::get('/courses',[CourseController::class,'index']);
    Route::post('/submit-course',[CourseController::class,'store']);
    Route::put('/course-update/{id}',[CourseController::class,'update']);
    Route::delete('/course-delete/{id}',[CourseController::class,'destroy']);
    Route::get('/view-students/{id}',[CourseController::class,'viewStudents']);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    //routes for lesson
    Route::get('lesson',[LessonController::class, 'index']);
    Route::post('/submit-lesson',[LessonController::class,'store']);
    Route::get('/edit-lesson/{id}',[LessonController::class,'edit']);
    Route::put('/update-lesson/{id}',[LessonController::class,'update']);

    // routes for instructor
    Route::get('/instructors',[CourseInstructorController::class,'index']);
    Route::post('/submit-instructor',[CourseInstructorController::class,'store']);

    //resource controller route departments
    Route::resource('departments', DepartmentsController::class);
        //resource controller route departments
        Route::resource('students', StudentsController::class);
    

}   );
