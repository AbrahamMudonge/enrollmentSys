<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departments;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $fetchAllDepartments = Departments::all();
        $countDepartments=Departments::count();
        return view('departments.index', compact('fetchAllDepartments','countDepartments'));
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
            'departmentName'=>['required'],
            'description'=>['required'],
                        
        ]);
        //grabbing loggedin user
        // $request['create_by']=Auth::user()->name;
        Departments::create($request->all());
        //return back();
        return back()->with('message','Departments Registered Successfully');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clickedDepartment=Departments::findOrFail($id);
        // $fetchAllCourses=Courses::latest()->get();
        return view('departments.edit',compact('clickedDepartment'));
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
        $findDepartmentsById= Departments::find($id);
        //update all the request from the form
        $findDepartmentsById->update ($request->all());
        //dd($findCoursesById);
        return back()->with('message','Departments updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findDepartments=Departments::find($id);
        $findDepartments->delete();
        return back()->with('message','Department Deleted Successfully');
    }
}
