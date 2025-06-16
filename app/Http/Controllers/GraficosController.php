<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraficosController extends Controller
{
    public function indexG()
    {
        //Datos de ejemplo
        $categorias = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'];
        $valores = [150, 230, 224, 218, 135, 147];

        return view('dashboar', compact('categorias', 'valores'));

    }
}
