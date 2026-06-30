@extends('layouts.app', ['page_title' => 'Manage Users'])
@section('content')
<div class="row">
<div class="col-md-12">
    @if(session('success'))
    <div class="alert alert-success" role="alert">
          {{ session('success') }}            
    </div>
    @endif
    <div class="d-flex justify-end mb-3">
        <a href="{{ url('users/create') }}" class="btn btn-outline-primary btn-sm">Add New User</a>
    </div>
    <div class="card mb-4">
        
        <div class="card-body p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Fullname</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Birthdate</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $users as $key => $user )
                    <tr class="align-middle">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $user->fullname }}</td>
                        <td>
                            <span class="badge {{ $user->role == 'Admin' ? 'text-bg-primary' : 'text-bg-secondary' }}">
                                {{ $user->role }}
                            </span>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->contact_number }}</td>
                        <td>{{ $user->display_birthdate }}</td>
                        
                        <td class="d-flex gap-2" >
                            <a href="{{ url('users', $user->id) }}/edit" class="btn btn-success btn-sm">Edit</a>
                            <form action="{{ url('users', $user->id) }}" method="POST">
                                @csrf   
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection