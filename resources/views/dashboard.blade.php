@extends('layouts.app', ['page_title' => 'Dashboard'])

@section('content')
<!-- Row 1: Role-Based Greeting -->
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h1>I am logged in as {{ auth()->user()->name }}</h1>
                
                @can('manage-students')
                    <p>I can manage students and users.</p>
                @else
                    <p>I can view allowed pages only.</p>
                @endcan
            </div>
        </div>
    </div>
</div>

<!-- Row 2: Statistics Boxes -->
<div class="row">
    <!-- New Orders Box -->
    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-primary">
            <div class="inner">
                <h3>150</h3>
                <p>New Orders</p>
            </div>
            <div class="small-box-icon">
                <i class="bi bi-cart"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="bi bi-link"></i></a>
        </div>
    </div>
    
    <!-- Bounce Rate Box -->
    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-success">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>
                <p>Bounce Rate</p>
            </div>
            <div class="small-box-icon">
                <i class="bi bi-bar-chart"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="bi bi-link"></i></a>
        </div>
    </div>

    <!-- User Registrations Box -->
    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-warning">
            <div class="inner">
                <h3>44</h3>
                <p>User Registrations</p>
            </div>
            <div class="small-box-icon">
                <i class="bi bi-person-plus"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="bi bi-link"></i></a>
        </div>
    </div>

    <!-- Unique Visitors Box -->
    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-danger">
            <div class="inner">
                <h3>65</h3>
                <p>Unique Visitors</p>
            </div>
            <div class="small-box-icon">
                <i class="bi bi-pie-chart"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="bi bi-link"></i></a>
        </div>
    </div>
</div>
@endsection