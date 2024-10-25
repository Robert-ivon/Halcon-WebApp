@extends('layouts.app')

@section('content')
    <h1>Departments</h1>
    <a href="{{ route('departments.create') }}">Add New Department</a>
    <ul>
        @foreach($departments as $department)
            <li>
                <a href="{{ route('departments.show', $department->id) }}">{{ $department->name }}</a>
                <a href="{{ route('departments.edit', $department->id) }}">Edit</a>
                <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
