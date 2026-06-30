@extends('layouts.app', ['page_title' => '403 Error'])

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 text-center mt-5">
        <h1 class="text-danger display-1 fw-bold">403</h1>
        <h2>Access Denied</h2>
        
        <!-- Text from your slide -->
        <p class="lead mt-3">I am not allowed to open this page.</p>
        
        <!-- Link from your slide -->
        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">
            <i class="bi bi-arrow-left"></i> Back to Dashboard
        </a>
    </div>
</div>
@endsection