<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:route'); // Only allow access to route role
    }

    public function index()
    {
        // Fetch orders with the status 'In route' and allow uploading of photos
        $orders = Order::where('status', 'In route')->get();
        
        return view('route.dashboard', compact('orders'));
    }

    // Additional methods for handling photos (e.g., loading/unloading) can be added here
}
