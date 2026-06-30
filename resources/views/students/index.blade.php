@extends('layouts.app', ['page_title' => 'Manage Students'])
@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('success'))
        <div class="alert alert-success" role="alert">
              {{ session('success') }}            
        </div>
        @endif

        @can('manage-students')
        <div class="d-flex justify-end mb-3">
            <a href="{{ url('students/create') }}" class="btn btn-outline-primary btn-sm">Add New Student</a>
        </div>
        @endcan

        <div class="card mb-4">
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Student Number</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Course</th>
                            <th>Year Level</th>
                            
                            @can('manage-students')
                                <th>Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $students as $key => $student )
                        <tr class="align-middle">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $student->student_number }}</td>
                            <td>{{ $student->first_name }}</td>
                            <td>{{ $student->last_name }}</td>
                            <td>{{ $student->course }}</td>
                            <td>{{ $student->year_level }}</td>
                            
                            @can('manage-students')
                            <td class="d-flex gap-2">
                                <a href="{{ url('students', $student->id) }}/edit" class="btn btn-success btn-sm">Edit</a>
                                <form action="{{ url('students', $student->id) }}" method="POST">
                                    @csrf   
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                                </form>
                            </td>
                            @endcan
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection