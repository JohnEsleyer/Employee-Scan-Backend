<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller {
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
}
?>