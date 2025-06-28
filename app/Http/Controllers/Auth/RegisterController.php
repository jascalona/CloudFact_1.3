<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        \Log::info('Datos recibidos para validación:', $data);

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:lectura,lectura-escritura'],
            'dpt' => ['required', 'string', 'max:255'],
            'cargo' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'n_extension' => ['required', 'string', 'max:255'],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'dpt' => $data['dpt'],
            'cargo' => $data['cargo'],
            'location' => $data['location'],
            'phone' => $data['phone'],
            'n_extension' => $data['n_extension'],
        ]);

        $user->assignRole($data['role']);

        return $user; // Siempre devolver el usuario, no una redirección
    }

    // Sobrescribe este método para manejar la redirección después del registro exitoso
    protected function registered(Request $request, $user)
    {
        return redirect()->route('user_manager')
               ->with('alert_message', 'El Usuario fue creado con éxito!');
    }
}