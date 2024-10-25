@extends('layouts.app')

@section('content')
    <h1>Order Details</h1>
    <p>Invoice Number: {{ $order->invoice_number }}</p>
    <p>Delivery Address: {{ $order->delivery_address }}</p>
    <p>Status: {{ $order->status }}</p>
    <p>Notes: {{ $order->notes }}</p>
@endsection
