@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <div class="card">
            <div class="card-header bg-info">
              Units
              <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#unitsModal">
                Add new Unit
              </button>
            </div>
            <div class="card-body">
                <form action="/unit-update/{{ $unit->id }}" method="POST">
                    @csrf
                    @method('PUT')
                            <div class="form-group">
                                <label for="Unit Name">Unit Name</label>
                                <input name="name" value="{{ $unit->name }}" type="text" class="form-control" id="unitName" placeholder="Unit Name">
                            </div>
                            <div class="form-group">
                                <label for="inputState">Course</label>
                                <select name="course_id" id="inputState" class="form-control">
                                  <option value="{{ $unit->course_id }}" selected>{{ $unit->course->courseName }}</option>
                                  <option disabled>_____________________</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->courseName }}</option>
                                    @endforeach
                                </select>
                              </div>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                  </form>
            </div>
            <div class="card-footer text-muted text-uppercase">
              ZALEGO ACADEMY
            </div>
          </div>
    </div>
</div>

@endsection