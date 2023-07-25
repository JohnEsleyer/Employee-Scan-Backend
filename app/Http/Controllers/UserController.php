<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\UserType;

class UserController extends Controller {
    public function index()
    {
        $users = User::all();
        $departments = Department::all();
        $user_types = UserType::all();

        return view('add_user', compact('users','departments', 'user_types'));
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'department_id' => 'required',
        ]);

        $user = User::create($validatedData);
        return response()->json($user, 201);
    }

    
}
?>