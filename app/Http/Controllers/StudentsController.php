<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Departments;
use App\Models\Students;
use Illuminate\Support\Facades\Auth;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fetchAllStudents = Students::all();
        $fetchAllCourses = Courses::all();
        $fetchAllDepartments = Departments::all();
        $countStudents=Students::count();
        return view('students.index', compact('fetchAllStudents','fetchAllCourses','fetchAllDepartments','countStudents'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $this->validate($request,
        [
            
            'studentName'=>['required'],
            'phoneNumber'=>['required'],
            'course_id'=>['required'],
            'department_id'=>['required'],
                        
        ]);
        //grabbing loggedin user
        $request['created_by']=Auth::user()->name;
        Students::create($request->all());
        //return back();
        return back()->with('message','Student Registered Successfully');
        // dd($request->all());

        }catch (\throwable $th){
            throw $th;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //select units where course_id = this_id napeana
        //$unit = Unit::where('course_id', '=', $id);
        //return view(view, copmact(unit));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clickedStudent=Students::findOrFail($id);
        // $fetchAllCourses=Courses::latest()->get();
        return view('students.edit',compact('clickedStudent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $findStudentById= Students::find($id);
        //update all the request from the form
        $findStudentById->update ($request->all());
        //dd($findCoursesById);
        return back()->with('message','Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findStudents=Students::find($id);
        $findStudents->delete();
        return back()->with('message','Students Deleted Successfully');
    }
}
