@extends('layouts.app')
@section('content')
<div >
    <div >
        <div >
            <div >
                <div class="text-white card-header bg-info">
                    <h1 class="card-title">Instructors
                    <span>
                    </span>
                    
                    <a href="#" class="float-right btn btn-dark btn-sm" data-target="#addInstructor" data-toggle="modal">Add</a>
                   <!-- display success message -->
                    @if (session ('message'))
                        <div class="alert alert-success">
                        <small>{{session('message')}}</small>
                        
                        </div>
                        @endif
                    </h1>
                </div>

                <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Instructor Name</th>
                            <th>Course</th>
                            <th>Created On</th>
                            <th>Created By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($displayAllInstructoreAndCourses as $instructor)
                            <tr>
                                <td>{{ $instructor->instructor_name}}</td>
                                <td>{{ $instructor->courses->courseName}}</td>
                                <td>{{ $instructor->created_at}}</td>
                                <td>{{ $instructor->courses->create_by}}</td>
                                <td>
                                    <a href="">edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                
                </table>
              
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //include create modal form -->
@include('instructor.create')

@endsection
