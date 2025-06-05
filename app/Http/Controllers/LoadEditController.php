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



    public function LoadUpdate(Request $request, $id){

        /**ACTUALIZACION DE LECTURAS */
        $load = lgenals::findOrFail($id);

        $load->rif = $request->rif;
        $load->serial = $request->serial;
        $load->model = $request->model;
        $load->location = $request->location;


        $load->cont_ante_bn = $request->cont_ante_bn;
        $load->cont_actu_bn = $request->cont_actu_bn;
        $load->volum_bn = $request->volum_bn;
        $load->cont_ante_color = $request->cont_ante_color;
        $load->cont_actu_color = $request->cont_actu_color;
        $load->volum_color = $request->volum_color;
        $load->save();

        return redirect()->route('Lgeneral')->with('success', 'La lectura fue modificada con exito!');
    }

}
