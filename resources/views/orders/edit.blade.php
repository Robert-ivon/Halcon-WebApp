@extends('layouts.app')

@section('content')
    <h1>Edit Order</h1>

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="invoice_number">Invoice Number</label>
            <input type="text" id="invoice_number" name="invoice_number" class="form-control" value="{{ $order->invoice_number }}" required>
        </div>
        <div class="form-group">
            <label for="customer_name">Customer Name</label>
            <input type="text" id="customer_name" name="customer_name" class="form-control" value="{{ $order->customer_name }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control">
                <option value="Ordered" {{ $order->status == 'Ordered' ? 'selected' : '' }}>Ordered</option>
                <option value="In process" {{ $order->status == 'In process' ? 'selected' : '' }}>In process</option>
                <option value="In route" {{ $order->status == 'In route' ? 'selected' : '' }}>In route</option>
                <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
            </select>
        </div>
        <div class="form-group">
            <label for="delivery_address">Delivery Address</label>
            <textarea id="delivery_address" name="delivery_address" class="form-control" rows="3" required>{{ $order->delivery_address }}</textarea>
        </div>
        <button type="submit" class="btn btn-warning">Update Order</button>
    </form>
@endsection
