@extends('layouts.app')

@section('content')
    <h1>Photos</h1>
    <a href="{{ route('photos.create') }}">Add New Photo</a>
    <ul>
        @foreach($photos as $photo)
            <li>
                <p>Type: {{ $photo->photo_type }}</p>
                <img src="{{ $photo->url }}" alt="Photo Evidence">
                <form action="{{ route('photos.destroy', $photo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
