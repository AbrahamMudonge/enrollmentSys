<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseInstructorController;
use Illuminate\Support\Facades\Auth;

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

    

}   );
