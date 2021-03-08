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
    public function edit($id)
    {
        $clickedLesson=Lesson::findOrFail($id);
        $fetchAllCourses=Courses::latest()->get();
        return view('lesson.edit',compact('clickedLesson','fetchAllCourses'));
    }
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'lesson_name'=>'required',
            'course_id'=>'required'
        ]);
        $lesson =Lesson::findOrFail($id);//find the exact lesson
        $lesson->lesson_name=$request->lesson_name;
        $lesson->course_id=$request->course_id;
        $lesson->save();

        return redirect('lesson')->with('message','lesson updated successfully');
    }
}
