<form action="{{ route('orders.search') }}" method="GET">
    <input type="text" name="invoice_number" placeholder="Enter Invoice Number">
    <button type="submit">Search</button>
</form>

@if($order)
    <h3>Order Status: {{ $order->status }}</h3>
    @if($order->status == 'Delivered')
        <img src="{{ $order->photos->last()->url }}" alt="Delivery Photo">
    @endif
@endif
