<?php

namespace App\Http\Controllers;

use App\Models\Desinstalation;
use Illuminate\Http\Request;

class DesinstalationController extends Controller
{
    
    /**VISTA INDEX */
    public function indexDesinstalation(){
        


        /**DATOS ENVIADOS DESDE CANTIDAD DE EQUIPOS OPERATIVOS */


        /**DATOS ENVIADOS DESDE CANTIDAD DE EQUIPOS NO OPERATIVOS */


        /**VISTA DE TABLA DESINSTALACION */
        $desincor = Desinstalation::all();

        return view('screens.desinstalation', compact('desincor'));
    }

}
