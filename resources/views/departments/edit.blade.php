@extends('layouts.app')

@section('content')
    <h1>Edit Department</h1>
    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Department Name:</label>
        <input type="text" name="name" value="{{ $department->name }}" required>
        
        <button type="submit">Update Department</button>
    </form>
@endsection
