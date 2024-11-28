@extends('layouts.app')

@section('content')
    <h1>Create New Order</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="invoice_number">Invoice Number</label>
            <input type="text" id="invoice_number" name="invoice_number" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="customer_name">Customer Name</label>
            <input type="text" id="customer_name" name="customer_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control">
                <option value="Ordered">Ordered</option>
                <option value="In process">In process</option>
                <option value="In route">In route</option>
                <option value="Delivered">Delivered</option>
            </select>
        </div>
        <div class="form-group">
            <label for="delivery_address">Delivery Address</label>
            <textarea id="delivery_address" name="delivery_address" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Order</button>
    </form>
@endsection

