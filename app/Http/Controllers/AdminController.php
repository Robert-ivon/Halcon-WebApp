<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin'); // Only allow access to admin role
    }

    public function index()
    {
        // Get all users and roles to display on the admin dashboard
        $users = User::all();
        $roles = Role::all();
        
        return view('admin.dashboard', compact('users', 'roles'));
    }

    // Additional methods for creating and updating users can be added here
}

