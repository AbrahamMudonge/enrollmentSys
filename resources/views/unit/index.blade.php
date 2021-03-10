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
                <div class="table-responsive">
                    <table class="table">
                      @forelse ($units as $key=>$unit)
                          <tr>
                              <td>{{ $key + 1 }}</td>
                              <td>{{ $unit->name }}</td>
                              <td>{{ $unit->course->courseName }}</td>
                              <td>
                                  <a href="/unit-edit/{{ $unit->id }}" class="btn btn-success">edit</a>
                              </td>
                          </tr>
                      @empty
                          <tr>
                              <td colspan="4"> No data Available</td>
                          </tr>
                      @endforelse
                    </table>
                  </div>
            </div>
            <div class="card-footer text-muted text-uppercase">
              ZALEGO ACADEMY
            </div>
          </div>
    </div>
</div>


<div class="modal fade" id="unitsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/create-unit" method="POST">
          @csrf
          <div class="modal-body">
                  <div class="form-group">
                      <label for="Unit Name">Unit Name</label>
                      <input name="name" type="text" class="form-control" id="unitName" placeholder="Unit Name">
                  </div>
                  <div class="form-group">
                      <label for="inputState">Course</label>
                      <select name="course_id" id="inputState" class="form-control">
                        <option selected disabled>---Select---</option>
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