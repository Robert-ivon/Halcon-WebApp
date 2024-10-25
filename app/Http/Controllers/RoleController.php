<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // READ: Display a list of all roles
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    // CREATE: Show the form for creating a new role
    public function create()
    {
        return view('roles.create');
    }

    // STORE: Store a newly created role in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles',
        ]);

        Role::create($validated);

        return redirect()->route('roles.index')->with('success', 'Role created successfully!');
    }

    // EDIT: Show the form for editing a specific role
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    // UPDATE: Update a specific role in the database
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,'.$role->id,
        ]);

        $role->update($validated);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully!');
    }

    // DELETE: Soft delete a specific role
    public function destroy(Role $role)
    {
        $role->delete(); // Soft delete
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully!');
    }
}

