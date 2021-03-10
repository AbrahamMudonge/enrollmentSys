@extends('layouts.app')

     @section('content')
<div class="card">
<div class="card-header">
Edit Lesson
</div>
<div class="card-body">
<form action="/update-lesson/{{$clickedLesson->id}}" method="post">
@csrf 
@method('PUT')

<input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
            <div class="row">
            <div class="col-lg-6"> 
                   <div class="form-group">
                       <label for="lesson_name">Name:</label>
                        <input type="text" class="form-control @error('lesson_name') is-invalid @enderror" name="lesson_name" value="{{$clickedLesson->lesson_name}}" >
                        @error('lesson_name')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
               <div class="col-lg-6"> 
                   <div class="form-group">
                       <label for="course_id">Course Name:</label>
                        <select class="form-control @error('course_id') is-invalid @enderror" name="course_id">
                            <option value="">--select Course--</option>
                            @foreach ($fetchAllCourses as $course)
                                <option value="{{ $course->id }}">{{ $course->courseName }}</option>
                            @endforeach
                        </select> 
                        @error('course_id')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update Lesson</button>

</form>
</div>

</div>

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