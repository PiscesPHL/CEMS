@extends('layouts.app', ['page_title' => 'Edit Organization'])

@section('content')
<div class="col-md-6">
    @if(session('success'))
    <div class="alert alert-success" role="alert">
          {{ session('success') }}            
    </div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('organizations.index') }}" class="btn btn-outline-secondary btn-sm">Back to Organizations</a>
        <a href="{{ route('organizations.create') }}" class="btn btn-outline-primary btn-sm">Add Another Organization</a>
    </div>

    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Update Information</div>
        </div>

        <form action="{{ route('organizations.update', $organization->id) }}" method="POST">
            @csrf   
            @method('PUT')
            
            <div class="card-body">
                @include('organizations.form-org')
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Organization</button>
            </div>
        </form>
    </div>
</div>
@endsection