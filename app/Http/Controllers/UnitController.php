<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Courses;

class UnitController extends Controller
{
    public function index()
    {
        $courses = Courses::all();
        $units = Unit::latest()->get();
        return view('unit.index', compact('units', 'courses'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'course_id' =>'required',
            'name'=>'required'
        ]);

        $unit = new Unit();
        $unit->name = $request->name;
        $unit->course_id = $request->course_id;
        $unit->save();

        return redirect()->back()->with('message', 'Successfully saved');
    }

    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        $courses = Courses::all();
        return view('unit.edit', compact('unit', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required',
            'course_id'=>'required'
        ]);

        $unit = Unit::findOrFail($id);
        $unit->name = $request->name;
        $unit->course_id = $request->course_id;
        $unit->save();

        // return Route::redirect('/unit')->with('message', 'Successfully Updated');
        return redirect('/unit');
    }
}
