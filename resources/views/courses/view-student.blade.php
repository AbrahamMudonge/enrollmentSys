@extends('layouts.app')
@section('content')

<div class="row">
    <div class="card col-sm-9 offset-sm-2">
        <div class="card-header text-uppercase bg-info">
            Students taking {{ $course->courseName }} are {{ $noOfStudents }}
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>STUDENT NAME</th>
                        <th>GENDER</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($studentTakingCourse as $key=>$student)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $student->name }}</td>
                            <td>
                                @if ($student->gender == 1)
                                    Male
                                @elseif($student->gender ==2)
                                    Female
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No Student Enrolled</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection