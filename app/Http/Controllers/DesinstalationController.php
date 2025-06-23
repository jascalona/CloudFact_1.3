<?php

namespace App\Http\Controllers;

use App\Models\Desinstalation;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DesinstalationController extends Controller
{

    /**VISTA INDEX */
    public function indexDesinstalation()
    {



        /**DATOS ENVIADOS DESDE CANTIDAD DE EQUIPOS OPERATIVOS */


        /**DATOS ENVIADOS DESDE CANTIDAD DE EQUIPOS NO OPERATIVOS */


        /**VISTA DE TABLA DESINSTALACION */
        $desincor = Desinstalation::all()->map(function ($desincor) {
            if ($desincor->doc_path) {
                $desincor->pdf_url = Storage::url($desincor->doc_path); // 
            }
            return $desincor;
        });


        return view('screens.desinstalation', compact('desincor'));
    }


    /**FUNCION PARA CARGAR LAS DESINSTALACIONES */
    public function createDesinstalation()
    {

        $customers = customer::all();

        return view('screens.new_desin', compact('customers'));
    }


    public function storeDesinstalation(Request $request)
    {
        if (!empty($_POST['new_desin'])) {
            if (
                !empty($_POST['rif']) && !empty($_POST['serial']) && !empty($_POST['model']) &&
                !empty($_POST['location']) && !empty($_POST['city']) &&
                !empty($_POST['estado']) && !empty($_POST['p_contact']) &&
                !empty($_POST['p_movil']) && !empty($_POST['n_port'])
            ) {
                // Verificar si el serial ya existe
                $serialExistente = Desinstalation::where('serial', $request->post('serial'))->first();

                if ($serialExistente) {
                    return redirect()->back()
                        ->withInput()
                        ->with('warning', 'El serial que intenta agregar ya existe.');
                }

                // Validar el archivo PDF si se subió
                if ($request->hasFile('doc')) {
                    $request->validate([
                        'doc' => 'mimes:pdf|max:2048', // Máximo 2MB, solo PDF
                    ]);
                }

                // Guardar el archivo PDF si existe
                $pdfPath = null;
                if ($request->file('doc')) {
                    $pdfPath = $request->file('doc')->store('desinstalation', 'public'); // Guarda en storage/app/public/desinstalation
                }

                // Crear el registro en la base de datos
                $desinsta = new Desinstalation();

                $desinsta->cliente = $request->post('cliente');
                $desinsta->rif = $request->post('rif');
                $desinsta->serial = $request->post('serial');
                $desinsta->model = $request->post('model');
                $desinsta->activo = $request->post('activo');
                $desinsta->backup = $request->post('backup');
                $desinsta->location = $request->post('location');
                $desinsta->city = $request->post('city');
                $desinsta->estado = $request->post('estado');
                $desinsta->p_contact = $request->post('p_contact');
                $desinsta->cliente = $request->post('cliente');
                $desinsta->p_email = $request->post('p_email');
                $desinsta->p_movil = $request->post('p_movil');
                $desinsta->date_desinsta = $request->post('date_desinsta');
                $desinsta->n_port = $request->post('n_port');
                $desinsta->cont_desin_bn = $request->post('cont_desin_bn');
                $desinsta->cont_desin_color = $request->post('cont_desin_color');
                $desinsta->obser = $request->post('obser');
                $desinsta->doc_path = $pdfPath; // Guardar la ruta del PDF

                try {
                    $desinsta->save();
                    return redirect()->route('desinstalation')->with('success', 'Equipo y PDF agregados con éxito.');
                } catch (\Illuminate\Database\QueryException $e) {
                    if ($e->getCode() == 23000) {
                        return redirect()->back()
                            ->withInput()
                            ->with('alert_message', 'El serial que intenta desincorporar ya se encuentra desinstalado, por favor verifique he intente de nuevamente.');
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


}
