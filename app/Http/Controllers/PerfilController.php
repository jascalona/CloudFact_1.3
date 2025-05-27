<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PerfilController extends Controller
{
    /**Index bvista principal Perfil de Usuarios */
    public function index(){

        $user = user::all();

        return view('layouts.Perfil');
    }
}
