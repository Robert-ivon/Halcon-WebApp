@extends('layouts.app')

@section('content')
    <h1>Order Details</h1>

    <p><strong>Invoice Number:</strong> {{ $order->invoice_number }}</p>
    <p><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>
    <p><strong>Delivery Address:</strong> {{ $order->delivery_address }}</p>

    @if($order->status == 'Delivered' && $order->photo_url)
        <h3>Delivery Photo</h3>
        <img src="{{ asset('storage/'.$order->photo_url) }}" alt="Delivery Photo" class="img-fluid">
    @endif
@endsection
