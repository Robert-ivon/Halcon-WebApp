@extends('layouts.app')

@section('title', 'Route Dashboard')

@section('content')
    <div class="container">
        <h1>Route Dashboard</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display Orders In Route -->
        <h3>Orders In Route</h3>
        <ul class="list-group">
            @foreach ($orders as $order)
                <li class="list-group-item">
                    Invoice: {{ $order->invoice_number }} - Status: {{ $order->status }}
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm float-right ml-2">View</a>

                    <!-- Upload Delivery Photo Button -->
                    <form action="{{ route('orders.uploadPhoto', $order->id) }}" method="POST" enctype="multipart/form-data" class="float-right">
                        @csrf
                        <input type="file" name="delivery_photo" required>
                        <button type="submit" class="btn btn-success btn-sm ml-2">Upload Delivery Photo</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

