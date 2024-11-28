<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PurchasingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:purchasing'); // Only allow access to purchasing role
    }

    public function index()
    {
        // Fetch orders that require purchasing
        $orders = Order::where('status', 'In process')->get();
        
        return view('purchasing.dashboard', compact('orders'));
    }

    // Additional methods for managing purchased items can be added here
}
