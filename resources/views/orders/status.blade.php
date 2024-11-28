@extends('layouts.app')

@section('title', 'Order Status')

@section('content')
    <h1>Order Status</h1>

    <p><strong>Invoice Number:</strong> {{ $order->invoice_number }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>
    
    @if($order->status == 'Delivered' && $order->photo_url)
        <h3>Delivery Proof</h3>
        <img src="{{ asset('storage/' . $order->photo_url) }}" alt="Delivery Photo" class="img-fluid">
    @endif
@endsection
