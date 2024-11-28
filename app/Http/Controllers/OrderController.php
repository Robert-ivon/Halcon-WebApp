<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Upload delivery photo for an order
    public function uploadPhoto(Request $request, Order $order)
    {
        // Validate the uploaded photo
        $request->validate([
            'delivery_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the photo
        $photoPath = $request->file('delivery_photo')->store('delivery_photos', 'public');
        
        // Update the order with the uploaded photo
        $order->delivery_photo = $photoPath;
        $order->status = 'Delivered'; // Update order status to "Delivered"
        $order->save();

        return redirect()->route('route.dashboard')->with('success', 'Order delivered and photo uploaded successfully!');
    }

    public function index()
    {
        $orders = Order::all();  // Fetch all orders
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        // Validate and store the order
        $validatedData = $request->validate([
            'invoice_number' => 'required|unique:orders',
            'customer_name' => 'required|string',
            'status' => 'required|string',
            'delivery_address' => 'required|string',
        ]);

        Order::create($validatedData);
        
        return redirect()->route('orders.index');
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('order_photos', 'public');
            $order->photo = $path;
        }
        
        $order->save();
        
        return redirect()->route('orders.index');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'archived';
        $order->save();
        
        return redirect()->route('orders.index');
    }
}
