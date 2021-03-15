<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    
    public function index()
    {
        
        $showCourses =Courses::OrderBy('created_at','desc')->simplepaginate(3);
        //$showCourses = Courses::latest()->simplepaginate(3)->get();
        $countCourses=Courses::count();
        $mostExpensiveCourse = Courses::max('price');
        $cheapest = Courses::min('price');

        // Select id, courseName from courses where startDate > now() AND status == 1;
        // $coursesWithIdAndCoursename = Courses::select('id', 'courseName')
        //                             ->where('startDate', '>', date('Y-m-d'))
        //                             ->where('status', '=', 1)
        //                             ->orderBy('courseName', 'asc')
        //                             ->get();

        // where([
        // ['startDate', '>', date('Y-m-d')],
        // ['status', '=', 1],
        // ['status', '=', 1]
        //])
        // $whatToShowToStudents = $coursesWithIdAndCoursename->addSelect('price')->get();
        
        
        
        // Counting the upcoming courses
        // SELECT COUNT(*) FROM courses WHERE startDate > now()
        $noOfUpcomingCourses = Courses::where('startDate', '>', date('Y-m-d'))->count();

        //count for  arcived
        $noOfArchivedCourses = Courses::where('startDate', '<', date('Y-m-d'))->count();
        $priceOfArchivedCourses = Courses::where('startDate', '<', date('Y-m-d'))->sum('price');
        $maxOfArchivedCourses = Courses::where('startDate', '<', date('Y-m-d'))->max('price');
        $minOfArchivedCourses = Courses::where('startDate', '<', date('Y-m-d'))->min('price');
        $avgOfArchivedCourses = Courses::where('startDate', '<', date('Y-m-d'))->avg('price');

        // SELECT * FROM `courses` WHERE startDate > now()
        $upComingCourses = Courses::where('startDate', '>', date('Y-m-d'))
                                ->orderBy('courseName', 'desc')
                                ->orderBy('created_at', 'asc')
                                ->get();


                                $archivedCourses = Courses::where('startDate', '<', date('Y-m-d'))
                                ->orderBy('courseName', 'desc')
                                ->orderBy('created_at', 'asc')
                                ->get();

        return view ('courses.index',
                compact('showCourses','countCourses', 'mostExpensiveCourse', 
                'cheapest', 'upComingCourses','archivedCourses',
                'noOfUpcomingCourses','noOfArchivedCourses','priceOfArchivedCourses','maxOfArchivedCourses',
                'minOfArchivedCourses','avgOfArchivedCourses'
            ));
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

    public function viewStudent($id)
    {
        // Finding the exact clicked course
        $course = Courses::findOrFail($id);        
        
        //SELECT * FROM `students` WHERE courses_id = theClickedId
        
        $studentTakingCourse = Student::where('courses_id', '=', $id)->get();
        $noOfStudents = Student::where('courses_id', '=', $id)->count();

        //SELECT name, gender FROM `students` WHERE courses_id =2
        // $studentTakingCourse = Student::select('name', 'gender')
        //                         ->where('courses_id', '=', 2)
        //                         ->orderBy('name', 'asc')
        //                         ->oldest()
        //                         ->get();

        //SELECT name, gender FROM `students` WHERE courses_id =2
        // $studentTakingCourse = Student::select('name', 'gender')
        //                         ->where('courses_id', '=', 2) same as ->where('course_id', 2)
        //                         ->orderBy('name', 'asc')
        //                         ->oldest()
        //                         ->count();
        return view('courses.view-student', compact('studentTakingCourse', 'course', 'noOfStudents'));
    }
}
