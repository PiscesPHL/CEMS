@extends('layouts.app', ['page_title' => 'Add New Organization'])

@section('content')
<div class="col-md-6">
    
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('organizations.index') }}" class="btn btn-outline-secondary btn-sm">Back to Organizations</a>
    </div>

    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Organization Details</div>
        </div>

        <form action="{{ route('organizations.store') }}" method="POST">
            @csrf   
            <div class="card-body">
                @include('organizations.form-org')
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save Organization</button>
            </div>
        </form>
    </div>
</div>
@endsection