@extends('layouts.app')

@section('content')
    <h1>Edit Role</h1>
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Role Name:</label>
        <input type="text" name="name" value="{{ $role->name }}" required>
        
        <button type="submit">Update Role</button>
    </form>
@endsection
