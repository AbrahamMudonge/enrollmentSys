<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Students;
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
            'featured_image'=>['required','mimes:jpg,jpeg,png','max:5048'],
                        
        ]);
        //getting the image
            $imageName=$request->courseName . '-'. time() . '.' .$request->featured_image->extension();
                        //dd($imageName);
            $request->featured_image->move(public_path('images/courses'),$imageName);

        //grabbing loggedin user
        // $request['create_by']=Auth::user()->name;
        // $request['featured_image']=$imageName;
        // Courses::create($request->all());
        $course=new Courses();
        $course->courseName=$request->courseName;
        $course->price=$request->price;
        $course->startDate=$request->startDate;
        $course->endDate=$request->endDate;
        $course->description=$request->description;
        $course->create_by=Auth::user()->name;
        $course->featured_image=$imageName;
        $course->save();
        

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
    public function viewStudents($id)
    {
        $course=Courses::findOrFail($id);
        $studentTakingCourse=Students::where('course_id', '=', $id)->get();
       return view('courses.view-student',compact('studentTakingCourse','course'));
    }
}
