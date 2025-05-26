<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parks;


class SelectController extends Controller
{

    /**SELECTOR Y RETORNO DEL JQuery */

    public function show($id)
    {
        $registros = parks::findOrFail($id);
        return response()->json([
            'model' => $registros->model,
            'rif' => $registros->rif

        ]);
    }


}
