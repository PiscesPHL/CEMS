@extends('layouts.app', ['page_title' => 'Dashboard'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                
                <h1>I am logged in as {{ auth()->user()->name }}</h1>

                @if($role === 'admin')
                    <p>I can manage students and users.</p>
                @else
                    <p>I can view allowed pages only.</p>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection