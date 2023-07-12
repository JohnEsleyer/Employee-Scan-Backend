<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return response()->json($employees);
    }

    // Executed when dashboard is displayed
    public function allEmployeeView()
    {
        $employees = Employee::all();

        return view('dashboard')->with('employees', $employees);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'department_id' => 'required',
        ]);

        $employee = Employee::create($validatedData);
        return response()->json($employee, 201);
    }
   
    public function storeEmployeeView(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'department_id' => 'required',
        ]);

        $employee = Employee::create($validatedData);
        return redirect()->back()->with('success', 'Employee added successfully.');
    }


    public function show($id)
    {
        $employee = Employee::findOrFail($id);

        return response()->json($employee);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'department_id' => 'required',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($validatedData);

        return response()->json($employee);
    }


    public function destroyEmployeeView($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->back()->with('success', 'Employee deleted successfully.');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return response()->json(null, 204);
    }

    public function exists($id)
    {
        $exists = Employee::where('id', $id)->exists();
        return response()->json(['exists' => $exists]);
    }
}