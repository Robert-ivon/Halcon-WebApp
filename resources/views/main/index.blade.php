@extends('layouts.app')

@section('title', 'Main Page - Halcon Web App')

@section('content')
    <!-- Customer Order Status Form -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center">Check Your Order Status</h1>
            <form action="{{ route('order.status') }}" method="GET" class="bg-light p-4 rounded shadow-sm">
                <div class="form-group">
                    <label for="customer_number">Customer Number</label>
                    <input type="text" name="customer_number" id="customer_number" class="form-control" placeholder="Enter your customer number" required>
                </div>

                <div class="form-group">
                    <label for="invoice_number">Invoice Number</label>
                    <input type="text" name="invoice_number" id="invoice_number" class="form-control" placeholder="Enter your invoice number" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Check Status</button>
            </form>
        </div>
    </div>

    <!-- For Admins, provide navigation to admin dashboard -->
    @auth
        @if(auth()->user()->role->name === 'Admin')
            <div class="row justify-content-center mt-5">
                <div class="col-md-6 text-center">
                    <h3>Admin Dashboard</h3>
                    <p>Manage users, orders, roles, and more.</p>
                    <a href="{{ route('dashboard') }}" class="btn btn-success">Go to Dashboard</a>
                </div>
            </div>
        @endif
    @endauth
@endsection
