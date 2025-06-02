<?php

namespace App\Http\Controllers;

use App\Imports\LecturasImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ImportController extends Controller
{

    public function index()
    {
        return view('layouts.ImpCustomer');

    }

    public function form()
    {
        return view('layouts.ImpCustomer');
    }


    public function import(Request $request)
    {
        // dd("IMP");

     if (!$request->file('file')) {
            return redirect()->back()->with('alert_message', 'Por favor seleccione de el formato de carga .CSV');
        }

        try {
            Excel::import(new LecturasImport, $request->file('file'));
            return redirect()->back()->with('alert_message', 'Carga exitosa');
        } catch (\Exception $e) {
            return redirect()->back()->with('alert_message', 'Error: 001, ¡lo sentimos!, esta intentando cargar una lectura o formato erróneo. Rechazado por el servidor, por favor valide la documentacion e intente nuevamente ');
        }

    }




}
