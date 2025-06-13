<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class ContactosController extends Controller
{

    /**MOSTRAR DATOS PARA SU EDICION */
    public function showForm(Request $request)
    {
        $itemId = $request->input('selected_item'); // Obtenemos el ID seleccionado

        // Validamos que se haya seleccionado un ítem
        if (!$itemId) {
            return redirect()->back()->with('alert_message', 'Debes seleccionar un elemento');
        }

        // Buscamos el ítem en la base de datos
        $cliente = Customer::findOrFail($itemId);

        // Redirigimos a un formulario de edición con los datos
        return view('logic.VContact', compact('cliente'));
    }



    /**CREATE CONTACTO */
    public function create(Request $request)
    {
        if (!empty($_POST['create'])) {
            /**VALIDA CAMPOS  */
            if (!empty($_POST['name']) && !empty($_POST['rif']) && !empty($_POST['direct_f'])) {

                /**VALIDAR SI EL RIF YA EXISTE */
                $rifExistente = Customer::where('rif', $request->post('rif'))->first();

                if ($rifExistente) {
                    return redirect()->back()
                        ->withInput()
                        ->with('alert_message', 'Lo sentimos, el RIF que intenta agregar ya existe, por favor valide e intente de nuevo');
                }

                /**CREAR INSTANCIA DEL MODELO */
                $customers = new Customer();

                $customers->name = $request->post('name');
                $customers->rif = $request->post('rif');
                $customers->direct_f = $request->post('direct_f');
                $customers->city = $request->post('city');
                $customers->estado = $request->post('estado');
                $customers->date_creation = $request->post('date_creation');
                $customers->p_contact = $request->post('p_contact');
                $customers->p_email = $request->post('p_email');
                $customers->p_movil = $request->post('p_movil');

                $customers->save();

                return redirect()->route('contact')->with('success', 'Exito!!!');

            } else {
                return redirect()->back()
                    ->withInput()
                    ->with('alert_message', '¡Lo sentimos, no pudimos cargar tu registro! Asegúrese de llenar todos los Campos!');
            }
        }
    }

}
