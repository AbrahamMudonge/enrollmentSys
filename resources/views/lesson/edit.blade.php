@extends('layouts.app')
@section('content')


<div class="card">
   <div class="card-header">
       Edit Lesson
   </div>

   <div class="card-body">
       <form action="/update-lesson/{{ $clickedLesson->id }}" method="post">
           @csrf
           @method('PUT')

           <input type="hidden" value="{{ Auth::user()->id }}" name="created_by">

            <div class="form-group">
                <label for="Lesson Name">Lesson Name</label>
                <input name="name" type="text" class="form-control" 
                id="lessonName" value="{{ $clickedLesson->lesson_name }}">
            </div>
            <div class="form-group">
                <label for="course_id">Courses</label>
                <select name="course_id" id="courseId" class="form-control">
                    <option selected disabled>-- Select COurse --</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->courseName }}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-info" type="submit">Update Lesson</button>
            
       </form>
   </div>
</div>


@endsection