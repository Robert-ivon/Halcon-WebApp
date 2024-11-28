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

        <!-- Display error messages -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <!-- Users Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Users</h3>
                        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Create New User</a>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse ($users as $user)
                                <li class="list-group-item">
                                    {{ $user->name }} - Role: {{ $user->role->name }}
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm float-right ml-2">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="float-right" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </li>
                            @empty
                                <li class="list-group-item">No users available.</li>
                            @endforelse
                        </ul>
                        <div class="mt-3">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Roles Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Roles</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse ($roles as $role)
                                <li class="list-group-item">{{ $role->name }}</li>
                            @empty
                                <li class="list-group-item">No roles available.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
