<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\lgenals;


class LoadEditController extends Controller
{
    public function edit($id){
        $editLoad = lgenals::findOrFail( $id );
        return view("logic.LoadEdit", compact("editLoad"));

    }

   //FUNCION SHOW SHOW-LOAD-EDIT PARA EL ENVIO DE IDS A EDITAR (LGENALS)
    public function showLoadEdit(Request $request){

        $itemId = $request->input('selected_item');

        //Validar que se haya seleccionado un item
        if (!$itemId) {
            return redirect()->back()->with('alert_message', 'Debes seleccionar un elemento');
        }

        //Buscamos el item en la DB
        $editLoad = lgenals::findOrFail($itemId);

        //REDIRIGIMOS A LA VISTA FORMULARIO "LoadEdit"
        return view('logic.LoadEdit', compact('editLoad'));        
    }



    public function update(Request $request, $id){
        
    }

}
