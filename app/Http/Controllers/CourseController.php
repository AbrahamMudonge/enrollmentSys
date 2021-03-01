<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    
    public function index()
    {
        
        $showCourses =Courses::OrderBy('created_at','desc')->simplepaginate(3);
        $countCourses=Courses::count();
        return view ('courses.index',compact('showCourses','countCourses'));
    }
    public function store (Request $request)
    {
        //1.validate
    
        try{
            $this->validate($request,
        [
            'courseName'=>['required'],
            'price'=>['required'],
            'startDate'=>['required'],
            'endDate'=>['required'],
            'description'=>['required'],
                        
        ]);
        //grabbing loggedin user
        $request['create_by']=Auth::user()->name;
        Courses::create($request->all());
        //return back();
        return back()->with('message','Courses Registered Successfully');
        // dd($request->all());

        }catch (\throwable $th){
            throw $th;

        }

    }
    // update Courses
    public function update(Request $request, $id)
    {
        
        $findCoursesById= Courses::find($id);
        //update all the request from the form
        $findCoursesById->update ($request->all());
        //dd($findCoursesById);
        return back()->with('message','Courses updated successfully');
    
    }
    
    public function destroy($id)
    {
        $findCourses=Courses::find($id);
        $findCourses->delete();
        return back()->with('message','Courses Deleted Successfully');
    }
}
