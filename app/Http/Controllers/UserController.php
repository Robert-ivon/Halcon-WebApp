<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // READ: Display a list of all users
    public function index()
    {
        $users = User::all(); // Fetch all users
        return view('users.index', compact('users'));
    }

    // CREATE: Show the form for creating a new user
    public function create()
    {
        return view('users.create');
    }

    // STORE: Store a newly created user in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role_id' => 'required|integer',
            'department_id' => 'required|integer',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role_id' => $validated['role_id'],
            'department_id' => $validated['department_id'],
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    // READ: Display a specific user by ID
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // EDIT: Show the form for editing a specific user
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // UPDATE: Update a specific user in the database
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'role_id' => 'required|integer',
            'department_id' => 'required|integer',
        ]);

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    // DELETE: Soft delete a specific user
    public function destroy(User $user)
    {
        $user->delete(); // Soft delete
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
