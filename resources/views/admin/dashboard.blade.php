@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>

        <!-- Display success message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="row">
            <!-- Users Section -->
            <div class="col-md-6">
                <h3>Users</h3>
                <a href="{{ route('users.create') }}" class="btn btn-primary mb-2">Create New User</a>
                <ul class="list-group">
                    @foreach ($users as $user)
                        <li class="list-group-item">
                            {{ $user->name }} - Role: {{ $user->role->name }}
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm float-right ml-2">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="float-right" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
            
            <!-- Roles Section -->
            <div class="col-md-6">
                <h3>Roles</h3>
                <ul class="list-group">
                    @foreach ($roles as $role)
                        <li class="list-group-item">{{ $role->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
