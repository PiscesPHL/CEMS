@extends('layouts.app', ['page_title' => 'Edit Student Info'])
@section('content')
<div class="col-md-6">
    @if(session('success'))
    <div class="alert alert-success" role="alert">
          {{ session('success') }}            
    </div>
    @endif

    <div class="d-flex justify-end mb-3">
        <a href="{{ url('students') }}" class="btn btn-outline-secondary btn-sm">Back to List</a>
    </div>

    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Edit Information</div>
        </div>

        <form action="{{ url('students', $student->id) }}" method="POST">
            @csrf   
            @method('PUT')
            <div class="card-body">
                
                <div class="mb-3">
                    <label for="student_number" class="form-label">Student Number</label>
                    <input type="text" name="student_number" class="form-control @error('student_number') is-invalid @enderror" id="student_number" value="{{ old('student_number', $student->student_number) }}" />
                    @error('student_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" value="{{ old('first_name', $student->first_name) }}" />
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" value="{{ old('last_name', $student->last_name) }}" />
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror   
                </div>

                <div class="mb-3">
                    <label for="course" class="form-label">Course</label>
                    <input type="text" name="course" class="form-control @error('course') is-invalid @enderror" id="course" value="{{ old('course', $student->course) }}" />
                    @error('course')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="year_level" class="form-label">Year Level</label>
                    <input type="text" name="year_level" class="form-control @error('year_level') is-invalid @enderror" id="year_level" value="{{ old('year_level', $student->year_level) }}" />
                    @error('year_level')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection