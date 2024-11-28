@extends('layouts.app')

@section('title', 'Purchasing Dashboard')

@section('content')
    <div class="container">
        <h1>Purchasing Dashboard</h1>
        
        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display Orders that need to be purchased -->
        <h3>Orders Needing Purchasing</h3>
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
