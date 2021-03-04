<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function index()
    {
        $courses = Courses::latest()->get();
        return view('lesson.index', compact('courses'));
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
}
