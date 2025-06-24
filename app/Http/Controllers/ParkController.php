<?php

namespace App\Http\Controllers;

use App\Models\Alquilers;
use App\Models\Park;
use App\Models\Customer;
use App\Models\parks;
use App\Models\Desinstalation;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ParkController extends Controller
{

    /**NEW DEVICE IN PARK */
    public function storePark(Request $request)
    {
        if (!empty($_POST['new_device'])) {
            if (
                !empty($_POST['rif']) && !empty($_POST['serial']) && !empty($_POST['model']) &&
                !empty($_POST['n_contract']) && !empty($_POST['location']) && !empty($_POST['city']) &&
                !empty($_POST['estado']) && !empty($_POST['p_contact']) && !empty($_POST['p_email']) &&
                !empty($_POST['p_movil']) && !empty($_POST['date_insta']) && !empty($_POST['n_port'])
            ) {
                // Verificar si el serial ya existe
                $serialExistente = Park::where('serial', $request->post('serial'))->first();

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
                    $pdfPath = $request->file('doc')->store('pdfs', 'public'); // Guarda en storage/app/public/pdfs
                }

                // Crear el registro en la base de datos
                $install = new Park();
                $install->cliente = $request->post('cliente');
                $install->rif = $request->post('rif');
                $install->serial = $request->post('serial');
                $install->model = $request->post('model');
                $install->n_contract = $request->post('n_contract');
                $install->activo = $request->post('activo');
                $install->location = $request->post('location');
                $install->city = $request->post('city');
                $install->estado = $request->post('estado');
                $install->p_contact = $request->post('p_contact');
                $install->p_email = $request->post('p_email');
                $install->p_movil = $request->post('p_movil');
                $install->date_insta = $request->post('date_insta');
                $install->n_port = $request->post('n_port');
                $install->cont_insta_bn = $request->post('cont_insta_bn');
                $install->cont_insta_color = $request->post('cont_insta_color');
                $install->obser = $request->post('obser');
                $install->doc_path = $pdfPath; // Guardar la ruta del PDF

                try {
                    $install->save();
                    return redirect()->route('.park')->with('success', 'Su registro fue agregados con éxito.');
                } catch (\Illuminate\Database\QueryException $e) {
                    if ($e->getCode() == 23000) {
                        return redirect()->back()
                            ->withInput()
                            ->with('alert_message', 'El serial ya existe en la base de datos.');
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


    //FUNCION SHOW SHOW-FORM PARA EL ENVIO DE IDS A EDITAR (PARKS)
    public function showForm(Request $request)
    {
        $itemId = $request->input('selected_item'); // Obtenemos el ID seleccionado

        // Validamos que se haya seleccionado un ítem
        if (!$itemId) {
            return redirect()->back()->with('alert_message', 'Debes seleccionar un elemento');
        }

        // Buscamos el ítem en la base de datos
        $device = parks::findOrFail($itemId);

        $AlquilerContrato = alquilers::all();

        // Redirigimos a un formulario de edición con los datos
        return view('logic.Upark', compact('device', 'AlquilerContrato'));
    }


    // CONTROLADOR DE SELECCION ATRAVEZ DE INPUT SIN AJAX
    public function processSingle(Request $request)
    {

        //dd($request->selected_id); // Debe mostrar el ID seleccionado

        logger()->info('Datos recibidos:', $request->all());
        dd($request->all()); // Esto detendrá la ejecución y mostrará todos los datos recibidos

        // ... resto del código


        /*
            // Verificar si se envió el formulario (botón presionado)
            if ($request->has('procesarBtn')) {

                // Validar el campo selected_id
                $request->validate([
                    'selected_id' => 'required|integer|exists:parks,id'
                ]);

                // Obtener el item completo
                $device = parks::findOrFail($request->selected_id);
                $AlquilerContrato = alquilers::all();

                // Pasar a la vista
                return view('logic.Upark', compact('device', 'AlquilerContrato'));
            } else {
                return redirect()->route('.park')->with('alert_message', 'Debes seleccionar al menos un elemento!');
            }
        */
    }


    /**Metodo show-edit 
       public function edit($id)
       {
          $device = parks::findOrFail($id);
          $AlquilerContrato = Alquilers::all();

          return view("logic.Upark", compact("device", "AlquilerContrato"));
       }
    */

    /**Metodo Update */
    public function update(Request $request, $id)
    {

        if (!empty($_POST['edit_park'])) {

            if (
                !empty($_POST['rif']) and !empty($_POST['serial']) and !empty($_POST['model']) and !empty($_POST['n_contract']) and !empty($_POST['location'])
                and !empty($_POST['city']) and !empty($_POST['estado']) and !empty($_POST['date_insta'])
            ) {

                /**Modificacion */
                $device = parks::findOrFail($id);

                $device->rif = $request->rif;
                $device->serial = $request->serial;
                $device->model = $request->model;
                $device->activo = $request->activo;
                $device->n_contract = $request->n_contract;
                $device->location = $request->location;
                $device->city = $request->city;
                $device->estado = $request->estado;
                $device->date_insta = $request->date_insta;
                $device->p_contact = $request->p_contact;
                $device->p_email = $request->p_email;
                $device->p_movil = $request->p_movil;
                $device->n_port = $request->n_port;
                $device->cont_insta_bn = $request->cont_insta_bn;
                $device->cont_insta_color = $request->cont_insta_color;
                $device->obser = $request->obser;


                // Manejo del PDF
                if ($request->hasFile('doc')) {
                    // Elimina el PDF anterior si existe
                    if ($device->doc_path) {
                        Storage::disk('public')->delete($device->doc_path);
                    }

                    // Guarda el nuevo PDF
                    $pdfPath = $request->file('doc')->store('pdfs', 'public');
                    $device->doc_path = $pdfPath;
                }

                $device->save();
                return redirect()->route('.park')->with('success', 'El Registro fue modificado con exito!');


            } else {
                return redirect()->back()->with('warning', 'Los Campos primarios no pueden quedar vacios. ¡Por favor inserte los datos solicitados!');
            }

        } else {
            echo '<script>alert("error")</script>';

        }

    }


    /**FUNCION PARA MOVER REGISTROS TABLA PARKS -> TABLA DESINSTALATIONS */
 
}