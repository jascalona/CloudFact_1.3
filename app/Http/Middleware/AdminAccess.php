<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    public function handle(Request $request, Closure $next)
    {
        // Si no está autenticado, redirigir al login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Verificar si es administrador (asumiendo que el rol admin es 'administrador')
        if (auth()->user()->role === 'Admin') { // Ajusta según tu estructura de roles
            return $next($request);
        }

        // Denegar acceso para no administradores
        return $this->denyAccess($request);
    }

    protected function denyAccess($request)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Acceso restringido: se requieren privilegios de administrador'
            ], 403);
        }

        return redirect()
            ->route('.dashboard') // o la ruta que prefieras
            ->with('alert_message', 'Acceso restringido: se requieren privilegios de administrador');
    }
}