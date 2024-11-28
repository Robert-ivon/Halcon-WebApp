@extends('layouts.app')

@section('title', 'Sales Dashboard')

@section('content')
    <div class="container">
        <h1>Sales Dashboard</h1>

        <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Create New Order</a>

        <!-- Display all sales orders -->
        <h3>All Orders</h3>
        <ul class="list-group">
            @foreach ($orders as $order)
                <li class="list-group-item">
                    Invoice: {{ $order->invoice_number }} - Status: {{ $order->status }}
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm float-right ml-2">View</a>
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm float-right">Edit</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
