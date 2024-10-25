<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // READ: Display a list of all orders
    public function index()
    {
        $orders = Order::latest()->get();
        return view('orders.index', compact('orders'));
    }

    // CREATE: Show the form for creating a new order
    public function create()
    {
        return view('orders.create');
    }

    // STORE: Store a newly created order in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'invoice_number' => 'required|string|unique:orders',
            'delivery_address' => 'required|string|max:255',
            'status' => 'required|in:Ordered,In process,In route,Delivered',
            'notes' => 'nullable|string',
        ]);

        Order::create($validated);

        return redirect()->route('orders.index')->with('success', 'Order created successfully!');
    }

    // READ: Display a specific order by ID
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    // EDIT: Show the form for editing a specific order
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    // UPDATE: Update a specific order in the database
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'invoice_number' => 'required|string|unique:orders,invoice_number,'.$order->id,
            'delivery_address' => 'required|string|max:255',
            'status' => 'required|in:Ordered,In process,In route,Delivered',
            'notes' => 'nullable|string',
        ]);

        $order->update($validated);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }

    // DELETE: Soft delete a specific order (archive it)
    public function destroy(Order $order)
    {
        $order->delete(); // Soft delete
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
    }
}

