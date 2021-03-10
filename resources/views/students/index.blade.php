@extends('layouts.app')
@section('content')
<div >
    <div >
        <div >
            <div >
                <div class="text-white card-header bg-info">
                    <h1 class="card-title">Students
                    <span>
                        {{$countStudents}}
                    </span>
                    
                    <a href="#" class="float-right btn btn-dark btn-sm" data-target="#addStudent" data-toggle="modal">Add</a>
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
                          <th>Student Name</th>
                          <th>Phone Number</th>
                          <th>Course Name</th>
                          <th>Department Name</th>
                          <th>Created On</th>
                          <th>Created By</th>
                          <th>Action</th>
                          
                          
                        </tr>
                    </thead>
                    <tbody>
                      @forelse ($fetchAllStudents as $student)
                        <tr>
                          <td>{{$student->studentName}}</td>
                          <td>{{$student->phoneNumber}}</td>
                          <td>{{$student->courses->courseName}}</td>
                          <td>{{$student->departments->departmentName}}</td>
                          <td>{{$student->created_at->diffForHumans()}}</td>
                          <td>{{$student->created_by}}</td>
                          
                          <!-- diffforhumans helps to imput the created at in form of sec min days -->
                          
                          <td>
                              <a href='#'data-toggle='modal' data-target='#viewStudent-{{$student->id}}' class='btn btn-primary btn-sm'>view</a>
                              <a href='#' data-toggle='modal' data-target='#editStudent-{{$student->id}}'  class='btn btn-success btn-sm'>edit</a>
                              @include('students.edit')
                              <a href='#'class='btn btn-danger btn-sm' onclick="confirm('you are about to delete {{$student->studentName}}?')  ? document.getElementById('deleted-student-{{$student->id}}').submit(): '' ">delete</a>
                              <form action="{{route('students.destroy',$student->id)}}" method="post" id="deleted-student-{{$student->id}}">
                                    @csrf
                                    @method('delete')
                              </form>
                          </td>
                          
                        </tr>
                        
                        
                        @include('students.view')
                        @empty
                        <spam class="alert alert-danger">No Students found</span>
                      @endforelse
                      
                    </tbody>
                
                </table>
          {{--    {{$fetchAllStudents->links()}}  --}}  
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //include create modal form -->
@include('students.create')

@endsection