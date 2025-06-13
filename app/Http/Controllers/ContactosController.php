<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class ContactosController extends Controller
{
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

}
