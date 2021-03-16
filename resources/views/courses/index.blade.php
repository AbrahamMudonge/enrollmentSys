@extends('layouts.app')
@section('content')
<div >
    <div >
        <div >
            <div >
                <div class="text-white card-header bg-info">
                    <h1 class="card-title">Courses
                    <span>
                        {{$countCourses}}
                    </span>
                    
                    <a href="#" class="float-right btn btn-dark btn-sm" data-target="#addCourse" data-toggle="modal">Add</a>
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
                          <th>Course Name</th>
                          <th>Price</th>
                          <th>start Date</th>
                          <th>End Date</th>
                          <th>Description</th>
                          <th>Created On</th>
                          <th>Created By</th>
                          <th>Action</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                      @forelse ($showCourses as $courses)
                        <tr>
                            <td><img src="{{ asset('images/courses/' . $courses->featured_image) }}" class="image-responsive img-thumbnail" alt=""></td>
                            
                          <td>{{$courses->courseName}}</td>
                          <td>{{$courses->price}}</td>
                          <td>{{$courses->startDate}}</td>
                          <td>{{$courses->endDate}}</td>
                          <td>{{$courses->description}}</td>
                          
                          <!-- diffforhumans helps to imput the created at in form of sec min days -->
                          <td>{{$courses->created_at->diffForHumans()}}</td>
                          <td>{{$courses->create_by}}</td>
                          <td>
                              <a href='#'data-toggle='modal' data-target='#viewCourse-{{$courses->id}}' class='btn btn-primary btn-sm'>view</a>
                              <a href='#' data-toggle='modal' data-target='#editCourse-{{$courses->id}}'  class='btn btn-success btn-sm'>edit</a>

                              @include('courses.edit')
                              <a href='#'class='btn btn-danger btn-sm' onclick="confirm('you are about to delete {{$courses->courseName}}?')  ? document.getElementById('deleted-course-{{$courses->id}}').submit(): '' ">delete</a>
                              <a href='/view-students/{{ $courses->id }}'  class='btn btn-warning btn-sm'>View students</a>
                              <form action="/course-delete/{{$courses->id}}" method="post" id="deleted-course-{{$courses->id}}">
                                    @csrf
                                    @method('delete')
                              </form>
                          </td>
                          
                        </tr>
                        
                        
                        @include('courses.view')
                        @empty
                        <spam class="alert alert-danger">No Courses found</span>
                      @endforelse
                      
                    </tbody>
                
                </table>
                {{$showCourses->links()}}
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //include create modal form -->
@include('courses.create')

@endsection