<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller {
    public function index()
    {
        $users = User::all();

        return view('add_user', compact('users'));
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