@extends('layouts.app')

@section('content')
    <h1>Create Order</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <label>Invoice Number:</label>
        <input type="text" name="invoice_number" required>
        
        <label>Delivery Address:</label>
        <input type="text" name="delivery_address" required>
        
        <label>Status:</label>
        <select name="status">
            <option value="Ordered">Ordered</option>
            <option value="In process">In process</option>
            <option value="In route">In route</option>
            <option value="Delivered">Delivered</option>
        </select>
        
        <button type="submit">Create Order</button>
    </form>
@endsection
