<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // READ: Display a list of all departments
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    // CREATE: Show the form for creating a new department
    public function create()
    {
        return view('departments.create');
    }

    // STORE: Store a newly created department in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:departments',
        ]);

        Department::create($validated);

        return redirect()->route('departments.index')->with('success', 'Department created successfully!');
    }

    // EDIT: Show the form for editing a specific department
    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    // UPDATE: Update a specific department in the database
    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:departments,name,'.$department->id,
        ]);

        $department->update($validated);

        return redirect()->route('departments.index')->with('success', 'Department updated successfully!');
    }

    // DELETE: Soft delete a specific department
    public function destroy(Department $department)
    {
        $department->delete(); // Soft delete
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully!');
    }
}
