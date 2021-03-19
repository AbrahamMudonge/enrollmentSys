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
    // public function store(Request $request)
    // {
    //     // dd($request->all());
        
    //     // $request['created_by']=Auth::user()->name;

    //     Lesson::create( $request->all() );
    //     return back()->with('message', 'Lesson added Successfuly');
    // }
    // public function edit($id)
    // {
    //     $clickedLesson=Lesson::findOrFail($id);
    //     $fetchAllCourses=Courses::latest()->get();
    //     return view('lesson.edit',compact('clickedLesson','fetchAllCourses'));
    // }
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

        $courses = Courses::latest()->get();
        $lessons = Lesson::all();
        return view('lesson.index', compact('courses', 'lessons'));
    }

    public function create()
    {
        $courses = Courses::latest()->get();
        return view('lesson.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required',
            'course_id'=>'required'
        ]);

        $lesson = new Lesson();
        $lesson->lesson_name = $request->name;
        $lesson->course_id = $request->course_id;
        $lesson->created_by = $request->created_by;
        $lesson->save();

        return redirect()->back();


    }

    public function edit($id)
    {
        $clickedLesson = Lesson::findOrFail($id);
        $courses = Courses::latest()->get();
        return view('lesson.edit', compact('clickedLesson', 'courses'));
    }

    // public function update(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'name' =>'required',
    //         'course_id'=>'required'
    //     ]);

    //     $lesson = Lesson::findOrFail($id); //Find the exact lesson
    //     $lesson->lesson_name = $request->name;
    //     $lesson->course_id = $request->course_id;
    //     $lesson->save();

    //     return redirect('/lesson');

    // }
}
