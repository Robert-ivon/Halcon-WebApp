@extends('layouts.app')

@section('content')
    <h1>Upload Photo</h1>
    <form action="{{ route('photos.store') }}" method="POST">
        @csrf
        <label>Photo Type:</label>
        <select name="photo_type">
            <option value="loaded">Loaded</option>
            <option value="delivered">Delivered</option>
        </select>
        
        <label>Photo URL:</label>
        <input type="text" name="url" required>
        
        <button type="submit">Upload Photo</button>
    </form>
@endsection
