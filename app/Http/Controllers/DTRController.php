<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;
use App\Models\Department;

class DTRController extends Controller {
    public function index()
    {
        $employees = Employee::all();
        $departments = Department::all();

        return view('dtr', compact('employees', 'departments'));
    }

    // Search Employee
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $employees = Employee::where('first_name', 'like', '%' . $keyword . '%')
            ->orWhere('last_name', 'like', '%' . $keyword . '%')
            ->get();

        return response()->json($employees);
    }

    public function searchByDepartment(Request $request)
    {
        $keyword = $request->input('keyword');
        $departmentId = $request->input('department_id');

        $employees = Employee::where(function ($query) use ($keyword) {
            $query->where('first_name', 'like', '%' . $keyword . '%')
                ->orWhere('last_name', 'like', '%' . $keyword . '%');
        })->where('department_id', $departmentId)
        ->get();

        return response()->json($employees);
    }
    

}