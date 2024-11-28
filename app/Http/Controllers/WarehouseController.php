<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:warehouse'); // Only allow access to warehouse role
    }

    public function index()
    {
        // Fetch orders that are either 'In process' or 'In route'
        $orders = Order::where('status', 'In process')->orWhere('status', 'In route')->get();
        
        return view('warehouse.dashboard', compact('orders'));
    }

    // Additional methods for managing order stock and inventory can be added here
}

