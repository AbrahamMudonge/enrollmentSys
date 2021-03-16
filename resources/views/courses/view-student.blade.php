@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header text-uppercase bg-info">
        Students taking {{ $course->courseName }}

    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>ID</th>
                  <th>Student Name</th>
                  <th>Phone Number</th>
                  <th>Department Name</th>
                 
                  
                </tr>
            </thead>
            @forelse ($studentTakingCourse as $key=>$student)
                <tr>
                  <td>{{$key + 1}}</td>
                  
                  <td>{{$student->studentName}}</td>
                  <td>{{$student->phoneNumber}}</td>
                  <td>{{$student->departments->departmentName}}</td>
                  
                 @empty
                    <tr>
                        <td colspan="5">No student enrolled</td>
                    </tr>
                    @endforelse
            <tbody>
              

    </div>
        <div class="card-footer">
            
        </div>
</div>
@endsection