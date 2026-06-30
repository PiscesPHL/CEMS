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
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $student->email) }}" placeholder="student@example.com">
                    @error('email')
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
                    <select name="course" class="form-control @error('course') is-invalid @enderror" id="course">
                        <option value="" disabled>Select a Course</option>
                        <option value="BSIT" {{ old('course', $student->course) == 'BSIT' ? 'selected' : '' }}>BSIT - Bachelor of Science in Information Technology</option>
                        <option value="BSCS" {{ old('course', $student->course) == 'BSCS' ? 'selected' : '' }}>BSCS - Bachelor of Science in Computer Science</option>
                        <option value="BSIS" {{ old('course', $student->course) == 'BSIS' ? 'selected' : '' }}>BSIS - Bachelor of Science in Information Systems</option>
                        <option value="BSEMC" {{ old('course', $student->course) == 'BSEMC' ? 'selected' : '' }}>BSEMC - Bachelor of Science in Entertainment and Multimedia Computing</option>
                    </select>
                    @error('course')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="year_level" class="form-label">Year Level</label>
                    <select name="year_level" class="form-control @error('year_level') is-invalid @enderror" id="year_level">
                        <option value="" disabled>Select Year Level</option>
                        <option value="1st Year" {{ old('year_level', $student->year_level) == '1st Year' ? 'selected' : '' }}>1st Year</option>
                        <option value="2nd Year" {{ old('year_level', $student->year_level) == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                        <option value="3rd Year" {{ old('year_level', $student->year_level) == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                        <option value="4th Year" {{ old('year_level', $student->year_level) == '4th Year' ? 'selected' : '' }}>4th Year</option>
                        <option value="Irregular" {{ old('year_level', $student->year_level) == 'Irregular' ? 'selected' : '' }}>Irregular</option>
                    </select>
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