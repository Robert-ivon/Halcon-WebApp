@extends('layouts.app')

@section('title', 'Warehouse Dashboard')

@section('content')
    <div class="container">
        <h1>Warehouse Dashboard</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display Orders In Process -->
        <h3>Orders In Process</h3>
        <ul class="list-group">
            @foreach ($orders as $order)
                <li class="list-group-item">
                    Invoice: {{ $order->invoice_number }} - Status: {{ $order->status }}
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm float-right">Edit</a>
                </li>
            @endforeach
        </ul>

        <!-- Display Orders In Route -->
        <h3>Orders In Route</h3>
        <ul class="list-group">
            @foreach ($orders as $order)
                <li class="list-group-item">
                    Invoice: {{ $order->invoice_number }} - Status: {{ $order->status }}
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm float-right ml-2">View</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
