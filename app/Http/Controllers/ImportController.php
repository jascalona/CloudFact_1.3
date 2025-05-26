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
            return redirect()->back()->with('alert_message', 'Lo sentimos, Ocurrio un error al realizar la carga');
        }

        try {
            Excel::import(new LecturasImport, $request->file('file'));
            return redirect()->back()->with('alert_message', 'Carga exitosa');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'Lo sentimos, Ocurrio un Error al cargar las lecturas, por favor valide el los datos antes de realizar la carga masiva');
        }

    }




}
