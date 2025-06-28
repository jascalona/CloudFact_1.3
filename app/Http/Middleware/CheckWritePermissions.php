<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckWritePermissions
{

    public function handle(Request $request, Closure $next)
    {
        // Si el usuario no está autenticado, redirigir al login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Si el usuario tiene rol de lectura-escritura, permitir continuar
        if (auth()->user()->hasRole('lectura-escritura')) {
            return $next($request);
        }

        // Para usuarios de solo lectura:

        // 1. Bloquear métodos HTTP que modifican datos
        if (
            $request->isMethod('POST') || $request->isMethod('PUT')
            || $request->isMethod('PATCH') || $request->isMethod('DELETE')
        ) {
            return $this->denyAccess($request);
        }

        // 2. Bloquear rutas específicas (opcional)
        $protectedRoutes = [
            'users.create',
            'users.store',
            'users.edit',
            'users.update',
            'users.destroy',
            // Agrega aquí otras rutas a proteger
            'userManagerIndex',
        ];

        if (in_array($request->route()->getName(), $protectedRoutes)) {
            return $this->denyAccess($request);
        }

        return $next($request);
    }

    /**
     * Denegar el acceso y responder adecuadamente
     */
    protected function denyAccess($request)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'No tienes permisos para realizar esta acción'
            ], 403);
        }

        return redirect()
            ->back()
            ->with('alert_message', 'No tienes permisos para realizar esta acción');
    }

}
