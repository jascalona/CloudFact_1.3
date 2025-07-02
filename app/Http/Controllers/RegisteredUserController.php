<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    

    public function RegisterUsers(){
            $this->authorize('access-admin-panel');
    return view('screens.user_manager');
    }

    /**
     * Display the registration view.
     */
    
    public function create()
    {
        return view('screens.user_manager'); // La vista que ya tienes
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'cargo' => ['required', 'string', 'max:255'],
            'dpt' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:lectura,lectura-escritura'],
            'phone' => ['required', 'string', 'max:20'],
            'n_extension' => ['required', 'string', 'max:20'],
            'location' => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'cargo' => $request->cargo,
            'dpt' => $request->dpt,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'phone' => $request->phone,
            'n_extension' => $request->n_extension,
            'location' => $request->location,
        ]);


        $user->assignRole($request['role']);

       // return $user; // Siempre devolver el usuario, no una redirección

//        event(new Registered($user));

        return redirect()->back()->with('success', 'Usuario registrado exitosamente');
    }


    

}
