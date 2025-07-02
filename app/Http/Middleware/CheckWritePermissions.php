<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckWritePermissions
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Verifica si el usuario tiene el permiso 'edit_records'
        // O un permiso más específico si lo necesitas
        if (auth()->user()->can('edit_records')) { // <--- CAMBIO AQUÍ
            return $next($request);
        }

        // Si el usuario NO tiene el permiso para editar, aplicar restricciones
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
            'userManagerIndex',
        ];

        if (in_array($request->route()->getName(), $protectedRoutes)) {
            return $this->denyAccess($request);
        }

        return $next($request);
    }

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