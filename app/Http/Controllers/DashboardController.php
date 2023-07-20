<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;

class DashboardController extends Controller {
    public function index()
    {
        $employees = Employee::all();
        
        $attendances = Attendance::all();
            
        return view('dashboard', compact('employees', 'attendances'));
    }

   
}