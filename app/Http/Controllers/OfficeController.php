<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index()
    {
        $offices = Office::all();
        return view('offices.index', compact('offices'));
    }

    public function create()
    {
        return view('offices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'office_name' => 'required|max:255',
            'department_id' => 'required|integer',
        ]);

        Office::create([
            'office_name' => $request->office_name,
            'department_id' => $request->department_id,
        ]);

        return redirect()->route('offices.index')->with('success', 'Office created successfully.');
    }

    public function edit(Office $office)
    {
        return view('offices.edit', compact('office'));
    }

    public function update(Request $request, Office $office)
    {
        $request->validate([
            'office_name' => 'required|max:255',
            'department_id' => 'required|integer',
        ]);

        $office->update([
            'office_name' => $request->office_name,
            'department_id' => $request->department_id,
        ]);

        return redirect()->route('offices.index')->with('success', 'Office updated successfully.');
    }

    public function destroy(Office $office)
    {
        $office->delete();
        return redirect()->route('offices.index')->with('success', 'Office deleted successfully.');
    }
}
