@extends('layouts.app')
@section('content')
<div >
    <div >
        <div >
            <div >
                <div class="text-white card-header bg-info">
                    <h1 class="card-title">Departments
                    <span>
                        {{$countDepartments}}
                    </span>
                    
                    <a href="#" class="float-right btn btn-dark btn-sm" data-target="#addDepartment" data-toggle="modal">Add</a>
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
                          <th>Department Name</th>
                          <th>Description</th>
                          <th>Actions</th>
                          
                          
                        </tr>
                    </thead>
                    <tbody>
                      @forelse ($fetchAllDepartments as $department)
                        <tr>
                          <td>{{$department->departmentName}}</td>
                          <td>{{$department->description}}</td>
                          
                          <!-- diffforhumans helps to imput the created at in form of sec min days -->
                          
                          <td>
                              <a href='#'data-toggle='modal' data-target='#viewDepartment-{{$department->id}}' class='btn btn-primary btn-sm'>view</a>
                              <a href='#' data-toggle='modal' data-target='#editDepartment-{{$department->id}}'  class='btn btn-success btn-sm'>edit</a>
                              @include('departments.edit')
                              <a href='#'class='btn btn-danger btn-sm' onclick="confirm('you are about to delete {{$department->departmentName}}?')  ? document.getElementById('deleted-department-{{$department->id}}').submit(): '' ">delete</a>
                              <form action="{{route('departments.destroy',$department->id)}}" method="post" id="deleted-department-{{$department->id}}">
                                    @csrf
                                    @method('delete')
                              </form>
                          </td>
                          
                        </tr> 
                        
                        
                        @include('departments.view')
                        @empty
                        <spam class="alert alert-danger">No Departments found</span>
                      @endforelse
                      
                    </tbody>
                
                </table>
          {{--    {{$fetchAllDepartments->links()}}  --}}  
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //include create modal form -->
@include('departments.create')

@endsection