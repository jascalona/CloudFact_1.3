<?php

namespace App\Http\Controllers;

use App\Models\lgenals;
use Illuminate\Http\Request;
use function Laravel\Prompts\alert;
use Illuminate\Support\Facades\Storage;


class LecturaManualController extends Controller
{
    public function store(Request $request)
    {

        if (!empty($_POST['loadManual'])) {


            // Validar el archivo PDF si se subió
            if ($request->hasFile('doc')) {
                $request->validate([
                    'doc' => 'mimes:pdf|max:2048', // Máximo 2MB, solo PDF
                ]);
            }

            // Guardar el archivo PDF si existe
            $pdfPath = null;
            if ($request->file('doc')) {
                $pdfPath = $request->file('doc')->store('readings', 'public'); // Guarda en storage/app/public/desinstalation
            }

            /**CREAR INSTANCIA DEL  MODELO*/
            $CargaM = new lgenals();

            /**DECLARACION DE LOS INPUTS CARGA */
            #01 -- alquilers
            $CargaM->cliente = $request->post('cliente');
            $CargaM->rif = $request->post('rif');
            $CargaM->n_contract = $request->post('n_contract');

            #02 -- parks
            $CargaM->serial = $request->post('serial');
            $CargaM->model = $request->post('model');
            $CargaM->location = $request->post('location');

            #03 --lgenals DATETIMES
            $CargaM->date = $request->post('date');
            $CargaM->mes = $request->post('mes');

            #04 --lgenals CONT BN
            $CargaM->cont_ante_bn = $request->post('cont_ante_bn');
            $CargaM->cont_actu_bn = $request->post('cont_actu_bn');
            $CargaM->volum_bn = $request->post('volum_bn');

            #04 --lgenals CONT COLOR
            $CargaM->cont_ante_color = $request->post('cont_ante_color');
            $CargaM->cont_actu_color = $request->post('cont_actu_color');
            $CargaM->volum_color = $request->post('volum_color');

            #05 --lgenals CONT SCANER
            $CargaM->cont_ante_scan_images = $request->post('cont_ante_scan_images');
            $CargaM->cont_actu_scan_images = $request->post('cont_actu_scan_images');
            $CargaM->volum_scan_images = $request->post('volum_scan_images');

            $CargaM->doc_path = $pdfPath; //Guardar la ruta PDF


            try {
                $CargaM->save();
                return redirect()->back()->with('success', 'La lectura fue cargada con exito!');
            } catch (\Illuminate\Database\QueryException $e) {
                if ($e->getCode() == 23000) {
                    return redirect()->back()
                        ->withInput();
                }
                return redirect()->back()
                    ->withInput()
                    ->with('alert_message', 'Error al guardar el registro.');
            }
        } else {
            return redirect()->back()
                ->withInput()
                ->with('warning', '¡Complete todos los campos obligatorios!');
        }
    }

}
