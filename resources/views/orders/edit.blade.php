@extends('layouts.app')

@section('content')
    <h1>Edit Order</h1>
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Invoice Number:</label>
        <input type="text" name="invoice_number" value="{{ $order->invoice_number }}" required>
        
        <label>Delivery Address:</label>
        <input type="text" name="delivery_address" value="{{ $order->delivery_address }}" required>
        
        <label>Status:</label>
        <select name="status">
            <option value="Ordered" {{ $order->status == 'Ordered' ? 'selected' : '' }}>Ordered</option>
            <option value="In process" {{ $order->status == 'In process' ? 'selected' : '' }}>In process</option>
            <option value="In route" {{ $order->status == 'In route' ? 'selected' : '' }}>In route</option>
            <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
        </select>
        
        <button type="submit">Update Order</button>
    </form>
@endsection
