<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**VISTA PRINCIPAL LUEGO DE QUE SE VALIDE EL USUARIO */
    protected $redirectTo = 'dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }


    /**CIERRE DE SESION */
    public function logout(Request $request)
    {
        Auth::logout();          // Cierra la sesión
        $request->session()->invalidate();  // Invalida la sesión
        $request->session()->regenerateToken(); // Regenera el token CSRF

        return redirect('/'); // Redirige a la página principal 
    }

}
