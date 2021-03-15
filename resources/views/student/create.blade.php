@extends('layouts.app')
@section('content')

<form action="{{ route('student.store') }}" method="POST">
    @csrf

    <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
    {{-- Input Name --}}
    <div class="form-group">
      <label for="Name">Name</label>
      <input name="name" type="text" class="form-control" id="name" placeholder="Full Name">
    </div>

    {{-- Select Gender --}}
    <div class="form-group">
      <label for="gender"></label>
      <select name="gender" class="form-control" id="gender">
        <option value="1">Male</option>
        <option value="2">Female</option>
      </select>
    </div>

    {{-- Select Course --}}
    <div class="form-group">
        <label for="course"></label>
        <select name="course_id" class="form-control" id="courses">
         <option disabled selected>-- Select -- </option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->courseName }}</option>
            @endforeach
        </select>
      </div>

      <button class="btn btn-success" type="submit">Create Student</button>

</form>


@endsection