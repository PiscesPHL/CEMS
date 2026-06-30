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
        <div class="d-flex justify-content-end gap-2 mb-3">
            <a href="{{ route('students.trashed') }}" class="btn btn-outline-danger btn-sm">
                <i class="bi bi-trash"></i> View Trash
            </a>
            <a href="{{ url('students/create') }}" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-plus"></i> Add New Student
            </a>
        </div>
        @endcan

        <div class="card mb-4">
            <div class="card-body p-0">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Student No.</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Year Level</th>
                            
                            @can('manage-students')
                                <th>Actions</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $students as $student )
                        <tr class="align-middle">
                            <td>{{ $student->student_number }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                            <td>{{ $student->course }}</td>
                            <td>{{ $student->year_level }}</td>
                            
                            @can('manage-students')
                            <td class="d-flex gap-2">
                                @if(isset($student->email))
                                <form action="{{ route('students.send-email', $student) }}" method="POST" class="d-inline" onsubmit="return confirm('Send welcome email to this student?')">
                                    @csrf   
                                    <button type="submit" class="btn btn-sm btn-info text-white">Send Email</button>
                                </form>
                                @endif

                                <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                                
                                <form action="{{ url('students', $student->id) }}" method="POST" class="d-inline">
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