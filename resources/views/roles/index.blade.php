@extends('layouts.app')

@section('content')
    <h1>Roles</h1>
    <a href="{{ route('roles.create') }}">Add New Role</a>
    <ul>
        @foreach($roles as $role)
            <li>
                <a href="{{ route('roles.show', $role->id) }}">{{ $role->name }}</a>
                <a href="{{ route('roles.edit', $role->id) }}">Edit</a>
                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
