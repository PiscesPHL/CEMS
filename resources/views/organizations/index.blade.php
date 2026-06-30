@extends('layouts.app', ['page_title' => 'Manage Organizations'])

@section('content')
<div class="row">
    <div class="col-md-12">
        
        @if(session('success'))
        <div class="alert alert-success" role="alert">
              {{ session('success') }}            
        </div>
        @endif

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('organizations.create') }}" class="btn btn-outline-primary btn-sm">Add New Organization</a>
        </div>

        <div class="card mb-4">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Acronym</th>
                            <th>Description</th>
                            <th>Adviser</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse( $organizations as $key => $org )
                        <tr class="align-middle">
                            <td>{{ $key + 1 }}</td>
                            <td><strong>{{ $org->name }}</strong></td>
                            <td>{{ $org->acronym ?? '-' }}</td>
                            
                            <td>
                                @if($org->description)
                                    <span title="{{ $org->description }}">{{ \Illuminate\Support\Str::limit($org->description, 40) }}</span>
                                @else
                                    <span class="text-muted fst-italic">No description</span>
                                @endif
                            </td>

                            <td>
                                @if($org->adviser)
                                    <span class="badge text-bg-light border"><i class="bi bi-person"></i> {{ $org->adviser->name }}</span>
                                @else
                                    <span class="text-muted fst-italic">None</span>
                                @endif
                            </td>
                            <td>{{ $org->category }}</td>
                            <td>
                                <span class="badge {{ $org->status == 'Active' ? 'text-bg-success' : 'text-bg-secondary' }}">
                                    {{ $org->status }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('organizations.edit', $org->id) }}" class="btn btn-success btn-sm">Edit</a>
                                    <form action="{{ route('organizations.destroy', $org->id) }}" method="POST">
                                        @csrf   
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this organization?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">
                                No organizations found. Click "Add New Organization" to get started!
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection