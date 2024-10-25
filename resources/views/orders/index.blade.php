@extends('layouts.app')

@section('content')
    <h1>Orders</h1>
    <a href="{{ route('orders.create') }}">Add New Order</a>
    <ul>
        @foreach($orders as $order)
            <li>
                <a href="{{ route('orders.show', $order->id) }}">Invoice #{{ $order->invoice_number }}</a>
                <a href="{{ route('orders.edit', $order->id) }}">Edit</a>
                <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
