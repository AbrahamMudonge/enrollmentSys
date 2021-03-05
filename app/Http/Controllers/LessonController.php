<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;


class LessonController extends Controller
{
    public function index()
    {
        $displayAllLesson= Lesson::all();
        $fetchAllCourses = Courses::all();
        return view('lesson.index', compact('fetchAllCourses','displayAllLesson'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        
        // $request['created_by']=Auth::user()->name;

        Lesson::create( $request->all() );
        return back()->with('message', 'Lesson added Successfuly');
    }
    
}
