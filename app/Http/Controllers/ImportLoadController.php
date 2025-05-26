<?php

namespace App\Http\Controllers;

use App\Imports\DataLoad;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ImportLoadController extends Controller
{
    public function form()
    {
        return view("screens.Lgeneral");
    }

    public function import(Request $request)
    {

        if (!$request->file('file')) {
            return redirect()->back()->with('error', 'Error al cargar las lecturas');
        }

        try {
            Excel::import(new DataLoad, $request->file('file'));
            return redirect()->back()->with('success', 'Carga exitosa');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'Lo sentimos, Ocurrio un Error al cargar las lecturas, por favor valide el los datos antes de realizar la carga masiva');
        }

    }
}
