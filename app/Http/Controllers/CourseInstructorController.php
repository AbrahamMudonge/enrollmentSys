<?php

namespace App\Http\Controllers;

use App\Models\CourseInstructor;
use App\Models\Courses;
use Illuminate\Http\Request;

class CourseInstructorController extends Controller
{
    //

    public function index()
    {
        $displayAllInstructoreAndCourses= CourseInstructor::all();
        $fetchAllCourses = Courses::all();
        return view('instructor.index', compact('fetchAllCourses','displayAllInstructoreAndCourses'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        CourseInstructor::create( $request->all() );
        return back()->with('message', 'Instructor added Successfuly');
    }
}
