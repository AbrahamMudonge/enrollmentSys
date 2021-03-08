@extends('layouts.app')
    @section('content')
<div >
    <div >
        <div >
            <div >
                <div class="text-white card-header bg-info">
                    <h1 class="card-title">Lessons
                    <span>
                    </span>
                    
                    <a href="#" class="float-right btn btn-dark btn-sm" data-target="#addLesson" data-toggle="modal">Add</a>
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
                            <th>Lesson Name</th>
                            <th>Course</th>
                            <th>Created On</th>
                            <th>Created By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($displayAllLesson as $lesson)
                            <tr>
                                <td>{{ $lesson->lesson_name}}</td>
                                <td>{{ $lesson->courses->courseName}}</td>
                                <td>{{ date('dS - F - Y', strtotime($lesson->created_at)) }}</td>
                                <td>{{ $lesson->courses->create_by}}</td>
                                <td>
                                    <a href="/edit-lesson/{{$lesson->id}}" class="btn btn-success">edit</a>
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
@include('lesson.create')

@endsection