<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;
use App\Models\Department;
use App\Models\User;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DTRController extends Controller {
    public function index()
    {
        $users = User::all();
        $departments = Department::all();

        return view('dtr', compact('users', 'departments'));
    }

    // Search User
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $users = User::where('first_name', 'like', '%' . $keyword . '%')
            ->orWhere('last_name', 'like', '%' . $keyword . '%')
            ->get();

        return response()->json($users);
    }

    public function getAttendances(Request $request)
    {
        $employeeId = $request->input('employee_id');
        $selectedYear = $request->input('selectedYear');
        $selectedMonth = $request->input('selectedMonth');
    
        // Convert selectedYear and selectedMonth to integers (if not already done)
        $selectedYear = (int) $selectedYear;
        $selectedMonth = (int) $selectedMonth;
    
        // Create a Carbon instance for the selected Year and Month
        $selectedDate = Carbon::create($selectedYear, $selectedMonth, 1);
    
        // Get the formatted date string for the selected Year and Month
        $formattedDate = $selectedDate->format('Y-m');
    
        // Log the received data for debugging (you can remove this later)
        \Log::debug('Received Data:', [
            'employeeId' => $employeeId,
            'selectedYear' => $selectedYear,
            'selectedMonth' => $selectedMonth,
            'formattedDate' => $formattedDate,
        ]);
    
        $attendances = Attendance::where('employee_id', $employeeId)
            ->where(function ($query) use ($selectedYear, $selectedMonth) {
                $query->where(DB::raw('YEAR(time_in_am)'), $selectedYear)
                    ->where(DB::raw('MONTH(time_in_am)'), $selectedMonth)
                    ->orWhere(DB::raw('YEAR(time_out_am)'), $selectedYear)
                    ->where(DB::raw('MONTH(time_out_am)'), $selectedMonth)
                    ->orWhere(DB::raw('YEAR(time_in_pm)'), $selectedYear)
                    ->where(DB::raw('MONTH(time_in_pm)'), $selectedMonth)
                    ->orWhere(DB::raw('YEAR(time_out_pm)'), $selectedYear)
                    ->where(DB::raw('MONTH(time_out_pm)'), $selectedMonth);
            })
            ->get();
    
        // Log the SQL query for debugging (you can remove this later)
        \Log::debug('SQL Query:', [
            'query' => DB::getQueryLog(),
        ]);
    
        return response()->json($attendances);
    }

    public function searchByDepartment(Request $request)
    {
        $keyword = $request->input('keyword');
        $departmentId = $request->input('department_id');

        $users = User::where(function ($query) use ($keyword) {
            $query->where('first_name', 'like', '%' . $keyword . '%')
                ->orWhere('last_name', 'like', '%' . $keyword . '%');
        })->where('department_id', $departmentId)
        ->get();

        return response()->json($users);
    }

}