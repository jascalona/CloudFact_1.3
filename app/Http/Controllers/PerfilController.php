<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\User;

class PerfilController extends Controller
{
    /**Index bvista principal Perfil de Usuarios */
    public function index(){

        $users = user::orderBy('created_at', 'desc')
        ->paginate(7) ;

        return view('layouts.Perfil', compact('users'));
    }
}
