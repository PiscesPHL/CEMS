@extends('layouts.app', ['page_title' => 'Deleted Students (Trash)'])

@section('content')
<div class="row">
    <div class="col-md-12">
        
        @if(session('success'))
        <div class="alert alert-success" role="alert">
              {{ session('success') }}            
        </div>
        @endif

        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('students.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Back to Active Students
            </a>

            <form method="GET" action="{{ route('students.trashed') }}" class="d-flex">
                <div class="input-group input-group-sm">
                    <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search deleted student">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>

        <div class="card mb-4">
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Student Number</th>
                            <th>Full Name</th>
                            <th>Deleted At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse( $students as $key => $student )
                        <tr class="align-middle">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $student->student_number }}</td>
                            <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                            <td>{{ $student->deleted_at->format('M d, Y h:i A') }}</td>
                            
                            <td class="d-flex gap-2">
                                <form method="POST" action="{{ route('students.restore', $student->id) }}">
                                    @csrf   
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to restore this student?')">
                                        <i class="bi bi-arrow-counterclockwise"></i> Restore
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('students.forceDelete', $student->id) }}">
                                    @csrf   
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('This cannot be undone. Continue?')">
                                        <i class="bi bi-trash"></i> Permadelete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">No deleted students found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="card-footer clearfix">
                {{ $students->links('pagination::bootstrap-5') }}
            </div>
            
        </div>
    </div>
</div>
@endsection