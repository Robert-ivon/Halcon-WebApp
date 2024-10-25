<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    // READ: Display a list of all photos for an order
    public function index($orderId)
    {
        $photos = Photo::where('order_id', $orderId)->get();
        return view('photos.index', compact('photos'));
    }

    // CREATE: Show the form for uploading a new photo
    public function create()
    {
        return view('photos.create');
    }

    // STORE: Store a newly uploaded photo in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|integer',
            'photo_type' => 'required|string|in:loaded,delivered',
            'url' => 'required|string',
        ]);

        Photo::create($validated);

        return redirect()->route('photos.index')->with('success', 'Photo uploaded successfully!');
    }

    // DELETE: Delete a specific photo
    public function destroy(Photo $photo)
    {
        $photo->delete(); // Soft delete
        return redirect()->route('photos.index')->with('success', 'Photo deleted successfully!');
    }
}

