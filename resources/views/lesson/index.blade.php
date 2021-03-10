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

@section('content')

<div class="card">
    <div class="card-header">
      All LESSONS POSTED
      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
        Add new Lesson
      </button>
    </div>
    <div class="card-body">
      <table class="table">
          <tr>
            <th>ID</th>
            <th>LESSON NAME</th>
            <th>COURSE</th>
            <th>CREATED BY</th>
            <th>ACTION</th>
          </tr>

          @foreach ($lessons as $lesson)
              <tr>
                <td>{{ $lesson->id }}</td>
                <td>{{ $lesson->lesson_name }}</td>
                <td>{{ $lesson->course_id }}</td>
                <td>{{ $lesson->created_by }}</td>
                <td>
                  <a href="/edit-lesson/{{ $lesson->id }}" class="btn btn-success">Edit</a>
                </td>
              </tr>
          @endforeach
      </table>
    </div>
    <div class="card-footer">
     ZALEGO ACADEMY
    </div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/create-lesson" method="POST">
            @csrf
        <div class="modal-body">
            
            <input type="hidden" value="{{ Auth::user()->id }}" name="created_by">

            <div class="form-group">
                <label for="Lesson Name">Lesson Name</label>
                <input name="name" type="text" class="form-control" 
                id="lessonName" placeholder="Lesson Name">
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>


@endsection