<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('users.create', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users',
            'dpt' => 'required',
            'cargo' => 'required',
            'location' => 'required',
            'password' => 'required|min:8',
            'phone' => 'required',
            'n_extension' => 'required',
            'role' => 'required|in:lectura,lectura-escritura'
        ]);

        $user = User::create($validated);
        $user->assignRole($request->role);

        return redirect()->route('screens.user_manager')->with('success', 'Usuario creado exitosamente');
    }
}
