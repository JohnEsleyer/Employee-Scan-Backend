<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
   
    public function index()
    {
        $attendance = Attendance::all();

        return response()->json($attendance);
    }

    public function store(Request $request)
    {
        $attendance = Attendance::create($request->all());

        return response()->json(['message' => 'Attendance created successfully']);
    }

    public function allAttendanceView()
    {
        $attendance = Attendance::all();

        return view('dashboard')->with('attendance', $attendance);
    }

    public function show($id)
    {
        $attendance = Attendance::find($id);

        if (!$attendance) {
            return response()->json(['message' => 'Attendance not found'], 404);
        }

        return response()->json($attendance);
    }

    public function update(Request $request, $id)
    {
        $attendance = Attendance::find($id);

        if (!$attendance) {
            return response()->json(['message' => 'Attendance not found'], 404);
        }

        $attendance->update($request->all());

        return response()->json(['message' => 'Attendance updated successfully']);
    }

    public function destroy($id)
    {
        $attendance = Attendance::find($id);

        if (!$attendance) {
            return response()->json(['message' => 'Attendance not found'], 404);
        }

        $attendance->delete();

        return response()->json(['message' => 'Attendance deleted successfully']);
    }

    public function exists($id)
    {
        $exists = Attendance::where('id', $id)->exists();

        return response()->json(['exists' => $exists]);
    }
}
