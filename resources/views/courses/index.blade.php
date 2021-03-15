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
                              <form action="/course-delete/{{$courses->id}}" method="post" id="deleted-course-{{$courses->id}}">
                                    @csrf
                                    @method('delete')
                              </form>

                              <a href="/view-student/{{ $courses->id }}" class="btn btn-warning btn-sm">View Students</a>
                          </td>
                          
                        </tr>
                        
                        
                        @include('courses.view')
                        @empty
                        <span class="alert alert-danger">No Courses found</span>
                      @endforelse
                      
                    </tbody>
                
                </table>
                {{$showCourses->links()}}
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-9 offset-sm-2">
            <div class="card">
                <div class="card-header text-uppercase">Aggregates</div>
                <div class="card-body">
                    <p class="card-text">Count no of courses: {{ $countCourses }}</p>
                    <p class="card-text">Most Expensive Course Price: {{ $mostExpensiveCourse }}</p>
                    <p class="card-text">Cheapest Course: {{ $cheapest }}</p>


                    <br><br>
                    <table class="table">
                        <thead class="bg-info">
                            <tr>
                                <th colspan="2">Upcoming Courses: {{ $noOfUpcomingCourses }}</th>
                            </tr>
                            <tr>
                                <th>ID</th>
                                <th>Course Name</th>
                            </tr>
                        </thead>

                       @foreach ($upComingCourses as $key=>$upComingCourse)
                           <tr>
                               <td>{{ $key + 1 }}</td>
                               <td>{{ $upComingCourse->courseName }}</td>
                           </tr>
                       @endforeach
                    </table>


                    <table class="table">
                        <thead class="bg-info">
                        <th colspan="3">Archived  Courses: {{ $noOfArchivedCourses }}</th>
                        </thead>
                        <tr>
                            <th>ID</th>
                            <th>Course Name</th>
                            <th>Price</th>
                           
                        </tr>

                       @foreach ($archivedCourses as $key=>$archivedCourse)
                           <tbody>
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $archivedCourse->courseName }}</td>
                                    <td>{{ $archivedCourse->price }}</td>

                                </tr>
                           </tbody>
                       @endforeach

                       <tfoot>
                           <tr>
                               <th colspan="2" class="text-center">Total</th>
                               <th>{{ $priceOfArchivedCourses }}</th>
                           </tr>
                           <tr>
                               <th colspan="2" class="text-center">Maximum</th>
                               <th>{{ $maxOfArchivedCourses }}</th>
                            </tr>
                            <tr>
                               <th colspan="2" class="text-center">Minimum</th>
                               <th>{{ $minOfArchivedCourses}}</th>
                           </tr>
                           <tr>
                            <th colspan="2" class="text-center">Average</th>
                            <th>{{ $avgOfArchivedCourses}}</th>
                        </tr>
                       </tfoot>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>

<!-- //include create modal form -->
@include('courses.create')

@endsection