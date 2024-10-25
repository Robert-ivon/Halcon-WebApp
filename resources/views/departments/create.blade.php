@extends('layouts.app')

@section('content')
    <h1>Create Department</h1>
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <label>Department Name:</label>
        <input type="text" name="name" required>
        
        <button type="submit">Create Department</button>
    </form>
@endsection
