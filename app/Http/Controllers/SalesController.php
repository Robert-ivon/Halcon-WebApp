<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:sales'); // Only allow access to sales role
    }

    public function index()
    {
        // Fetch orders related to sales department
        $orders = Order::where('status', 'Ordered')->orWhere('status', 'In process')->get();
        
        return view('sales.dashboard', compact('orders'));
    }

    // Additional methods for creating and managing orders can be added here
}


