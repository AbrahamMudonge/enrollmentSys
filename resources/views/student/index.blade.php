@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-9 offset-col-sm-2">
            <div class="card">
                <div class="card-header">
                    <h5>Students</h5>
                    <a href="{{ route('student.create') }}" class="btn btn-success px-5 float-right">Create Student</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Gender</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $key=>$student)
                                <tr>
                                    {{-- <td>{{ $student->id }}</td> --}}
                                    <td>{{ $student->name }}</td>
                                    {{-- <td>{{ $student->courses_id }}</td> --}}
                                    <td>{{ $student->gender }}</td>
                                    <td>
                                        <a href="#">edit</a>
                                        <a href="#">Show</a>
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

@endsection