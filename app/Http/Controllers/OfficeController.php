<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 
use App\Models\Department;

class OfficeController extends Controller
{
    public function index()
    {
        $offices = Office::all();
        $departments = Department::all();
        return view('offices_view', compact('offices', 'departments'));
    }

    public function createOffice(Request $request)
    {
        // Validate incoming request data
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:255',
        //     'department_id' => 'required',
        // ]);
    
        // // If validation fails, return JSON response with errors
        // if ($validator->fails()) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Validation failed',
        //         'errors' => $validator->errors(),
        //     ], 422);
        // }
    
        // Validation passed, create a new Office record
        $office = Office::create([
            'name' => $request->input('name'),
            'department_id' => $request->input('department_id'),
        ]);
    
        // Check if the record was created successfully
        if ($office) {
            return response()->json([
                'success' => true,
                'message' => 'Office created successfully',
                'data' => $office,
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create office',
            ], 500);
        }
    }
    

}
