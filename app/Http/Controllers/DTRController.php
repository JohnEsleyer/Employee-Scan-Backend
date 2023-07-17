<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;

class DTRController extends Controller {
    public function index()
    {
        $employees = Employee::all();

        return view('dtr', compact('employees'));
    }
}