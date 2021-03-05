<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\CourseInstructorController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LessonController;

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
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // routes for instructor
    Route::get('/instructors',[CourseInstructorController::class,'index']);
    Route::post('/submit-instructor',[CourseInstructorController::class,'store']);

    // unit routes
    Route::get('/unit', [UnitController::class, 'index']);
    Route::post('/create-unit',[UnitController::class,'store']);
    Route::get('/unit-edit/{id}', [UnitController::class, 'edit']);
    Route::put('/unit-update/{id}', [UnitController::class, 'update']);

    // lesson routes
    Route::get('/lesson', [LessonController::class, 'index']);
    Route::post('/create-lesson',[LessonController::class, 'store'] );
    Route::get('/edit-lesson/{id}', [LessonController::class, 'edit']);
    Route::put('/update-lesson/{id}', [LessonController::class, 'update']);
}   );
