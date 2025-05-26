<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Alquilers;
use App\Models\Customer;
use App\Models\lgenals;

class AlquilerController extends Controller
{
    public function store()
    {
        $customers = Customer::all();

        return view("logic.Alquiler", compact("customers"));
    }


    /**FUNCTION DISABLED ELEMENT OBSOLETO
        public function edit($id)
        {
            $alquiler = Alquilers::findOrFail($id);
            return view("logic.edit_alquiler", compact("alquiler"));
        }
    */

    //FUNCION SHOW SHOW-ALQUILER-EDIT PARA EL ENVIO DE IDS A EDITAR (ALQUILERS)
    public function showAlquilerEdit(Request $request)
    {

        $itemContract = $request->input('selected_item'); //Obtine el ID seleccionado

        //Validamos que se haya seleccionado un item
        if (!$itemContract) {
            return redirect()->back()->with('alert_message', 'Debes seleccionar al menos un elemento');
        }

        //Buscar el id (n_contract) en la db
        $alquiler = alquilers::findOrFail($itemContract);

        //redirigimos a la vista formulario edit_alquiler
        return view('logic.edit_alquiler', compact('alquiler'));
    }


    public function update(Request $request, $id)
    {

        if (!empty($_POST['btn-edit'])) {

            #Vista 01
            if (
                !empty($_POST['cliente']) and !empty($_POST['date_init_contract'])
            ) {

                /**Modificacion */
                $alquilerU = Alquilers::findOrFail($id);

                #01
                $alquilerU->name_c = $request->name_c;
                $alquilerU->cliente = $request->cliente;
                $alquilerU->date_init_contract = $request->date_init_contract;
                $alquilerU->date_close_contract = $request->date_close_contract;

                #02 
                $alquilerU->P_CLICK_BN_USD = $request->P_CLICK_BN_USD;
                $alquilerU->P_CLICK_COLOR_USD = $request->P_CLICK_COLOR_USD;
                $alquilerU->copi_minimo_bn = $request->copi_minimo_bn;
                $alquilerU->copi_minimo_color = $request->copi_minimo_color;
                $alquilerU->PCM = $request->PCM;
                $alquilerU->label = $request->label;

                #03
                $alquilerU->rif = $request->rif;
                $alquilerU->n_contract = $request->n_contract;
                $alquilerU->d_contract = $request->d_contract;
                $alquilerU->cant_device = $request->cant_device;
                $alquilerU->tipo_c = $request->tipo_c;
                $alquilerU->vendedor = $request->vendedor;
                $alquilerU->administrador_01 = $request->administrador_01;

                #04
                $alquilerU->moneda = $request->moneda;
                $alquilerU->tipo_cambio = $request->tipo_cambio;
                $alquilerU->razones_consorcio = $request->razones_consorcio;

                /**SERVICIES */
                $alquilerU->info_all_i = $request->info_all_i;
                $alquilerU->info_all_ii = $request->info_all_ii;
                $alquilerU->info_all_iii = $request->info_all_iii;
                $alquilerU->info_all_iv = $request->info_all_iv;
                $alquilerU->info_all_v = $request->info_all_v;


                #05
                $alquilerU->indexacion_mutuo = $request->indexacion_mutuo;
                $alquilerU->indexacion_porcentaje = $request->indexacion_porcentaje;
                $alquilerU->indexacion_frecuencia = $request->indexacion_frecuencia;


                /**CANT LABORES */
                $alquilerU->n_admin = $request->n_admin;
                $alquilerU->n_asesor = $request->n_asesor;
                $alquilerU->n_operador = $request->n_operador;
                $alquilerU->n_analista = $request->n_analista;
                $alquilerU->n_supervisor = $request->n_supervisor;

                $alquilerU->save();

                return redirect()->route('contract')->with('success', 'El Contrato fue modificado con exito!');

            } else {
                return redirect()->route('showAlquiler.edit', $id)->with('warning', 'Los Campos primarios no pueden quedar vacios. ¡Por favor inserte los datos solicitados!');
            }

        } else {

            echo '<script>alert("Error!")</script>';
        }

    }

    /**Funtion create new contract */
    public function create(Request $request)
    {

        if (!empty($_POST['btn-a'])) {

            /**DATOS VALIDACION DATOS DE CLIENTE */
            if (
                !empty($_POST['name_c']) and !empty($_POST['cliente']) and !empty($_POST['date_init_contract']) and !empty($_POST['date_close_contract'])

                #02
                and !empty($_POST['rif']) and !empty($_POST['n_contract']) and !empty($_POST['d_contract']) and !empty($_POST['tipo_c']) and !empty($_POST['vendedor']) and !empty($_POST['administrador_01'])

                #PRECIOS
                and !empty($_POST['P_CLICK_BN_USD']) and !empty($_POST['P_CLICK_COLOR_USD'])

                /**VALIDACION INFORMACION DETALLADA */
                and !empty($_POST['moneda']) and !empty($_POST['tipo_cambio'])

            ) {
                /**Instancia Eloquent para alquiler */
                $contrato = new Alquilers();

                #01
                $contrato->name_c = $request->post('name_c');
                $contrato->cliente = $request->post('cliente');
                $contrato->date_init_contract = $request->post('date_init_contract');
                $contrato->date_close_contract = $request->post('date_close_contract');
                $contrato->P_CLICK_BN_USD = $request->post('P_CLICK_BN_USD');
                $contrato->P_CLICK_COLOR_USD = $request->post('P_CLICK_COLOR_USD');
                $contrato->copi_minimo_bn = $request->post('copi_minimo_bn');
                $contrato->copi_minimo_color = $request->post('copi_minimo_color');
                $contrato->PCM = $request->post('PCM');
                $contrato->label = $request->post('label');

                #02
                $contrato->rif = $request->post('rif');
                $contrato->n_contract = $request->post('n_contract');
                $contrato->d_contract = $request->post('d_contract');
                $contrato->tipo_c = $request->post('tipo_c');
                $contrato->vendedor = $request->post('vendedor');
                $contrato->administrador_01 = $request->post('administrador_01');

                #3
                $contrato->moneda = $request->post('moneda');
                $contrato->tipo_cambio = $request->post('tipo_cambio');
                $contrato->razones_consorcio = $request->post('razones_consorcio');

                /**Servicios Disponible */
                $contrato->info_all_i = $request->post('info_all_i');
                $contrato->info_all_ii = $request->post('info_all_ii');
                $contrato->info_all_iii = $request->post('info_all_iii');
                $contrato->info_all_iv = $request->post('info_all_iv');
                $contrato->info_all_v = $request->post('info_all_v');

                #4
                $contrato->indexacion_mutuo = $request->post('indexacion_mutuo');
                $contrato->indexacion_porcentaje = $request->post('indexacion_porcentaje');
                $contrato->indexacion_frecuencia = $request->post('indexacion_frecuencia');

                /**Cantidad de Labores */
                $contrato->n_admin = $request->post('n_admin');
                $contrato->n_asesor = $request->post('n_asesor');
                $contrato->n_operador = $request->post('n_operador');
                $contrato->n_analista = $request->post('n_analista');
                $contrato->n_supervisor = $request->post('n_supervisor');


                $contrato->save();

                /**retrno en caso de realizar la carga */
                return redirect()->route('contract')->with('success', 'El Contrato fue creado con Exito!');


            } else {
                return redirect()->route('Alquiler.store', )->with('warning', 'Los Campos primarios no pueden quedar vacios. ¡Por favor inserte los datos solicitados!');
            }



        } else {
            echo '<script>alert("Ha Ocurrido un Error al conectar con el servidor!")</script>';
        }

    }

}
