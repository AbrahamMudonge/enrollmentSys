@extends('layouts.app')
@section('content')
<div >
    <div >
        <div >
            <div >
                <div class="text-white card-header bg-info">
                    <h1 class="card-title">Users
                    <span>
                        {{$countUsers}}
                    </span>
                    
                    <a href="#" class="float-right btn btn-dark btn-sm" data-target="#addUser" data-toggle="modal">Add New User</a>
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
                          <th>User Name</th>
                          <th>Email</th>
                          <th>Password</th>
                          
                          
                        </tr>
                    </thead>
                    <tbody>
                      @forelse ($fetchAllUsers as $user)
                        <tr>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->password}}</td>
                          
                          <!-- diffforhumans helps to imput the created at in form of sec min days -->
                          
                          <td>
                              {{-- <a href='#'data-toggle='modal' data-target='#viewDepartment-{{$department->id}}' class='btn btn-primary btn-sm'>view</a> --}}
                              <a href='#' data-toggle='modal' data-target='#editUser-{{$user->id}}'  class='btn btn-success btn-sm'>edit</a>
                              @include('users.edit')
                              <a href='#'class='btn btn-danger btn-sm' onclick="confirm('you are about to delete {{$user->name}}?')  ? document.getElementById('deleted-user-{{$user->id}}').submit(): '' ">delete</a>
                              <form action="{{route('users.destroy',$user->id)}}" method="post" id="deleted-user-{{$user->id}}">
                                    @csrf
                                    @method('delete')
                              </form>
                          </td>
                          
                        </tr> 
                        
                        
                        {{-- @include('departments.view') --}}
                        @empty
                        <span class="alert alert-danger">No User found</span>
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
@include('users.create')

@endsection