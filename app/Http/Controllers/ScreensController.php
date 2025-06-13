<?php

namespace App\Http\Controllers;

use App\Models\links;
use App\Models\parks;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Ordens;
use App\Models\Customer;
use App\Models\Park;
use App\Models\Lgenal;
use App\Models\Contact;
use App\Models\lgenals;
use App\Models\Alquilers;
use PhpParser\Node\Expr\AssignOp\Concat;
use App\Http\Controllers\CustomerRequest;


use DB;

class ScreensController extends Controller
{
    /**
     * CRATION ROUTES SCREENS
     */

    public function Park()
    {
        $parks = Park::all();

        //return  $parks;
        return view("screens.park", compact("parks"));
    }

    public function lead()
    {
        $customers = alquilers::all();
        return view("screens.lead", compact("customers"));
    }

    public function Lgeneral()
    {
        //$table = "load_reading";
        $Lgenals = Lgenal::orderBy('date', 'desc')->get();
        return view("screens.Lgeneral", compact("Lgenals"));
    }


    public function show($id)
    {
        $clienteL = alquilers::findOrFail($id);

        /**
         * Example SQL :
         * 
         * SELECT *
         * FROM lgenals
         * INNER JOIN alquilers ON lgenals.n_contract = alquilers.n_contract WHERE alquilers.n_contract = $id ;
         */


        /**RELACION TABLE LGENALS */
        $load = lgenals::with('alquilers')
            ->where('n_contract', $id)
            ->get();


        /**RELACION TABLE ORDENS */
        $ordens = ordens::orderBy('date_emi', 'desc')->with('alquilers')
            ->where('n_contract', $id)
            ->paginate(5);


        /**RELACION TABLE PARKS */
        $devicePark = parks::with('alquilers')
            ->where('n_contract', $id)
            ->get();


        /**SECTION DATETIMES SERVER */
        $dateLM = Carbon::now();

        $mesLM = $dateLM->translatedFormat('F Y');


        //$ordens = Ordens::orderBy('date_emi', 'desc')->cursorPaginate(6);

        return view("layouts.LCustomer", compact("clienteL", "load", "ordens", "devicePark", "dateLM", "mesLM"));
    }



    public function bill()
    {
        $customers = Customer::all();
        return view("screens.bill", compact("customers"));
    }

    public function install()
    {
        $customers = Customer::all();
        $AlquilerContrato = Alquilers::all();
        return view("screens.install", compact("customers", 'AlquilerContrato'));
    }

    public function contact()
    {
        $customers = Customer::all();
        return view("screens.contact", compact("customers"));
    }

    public function new_contact()
    {
        return view("logic.new_contact");
    }

    public function contract()
    {
        $customers = Customer::all();
        $alquilers = Alquilers::all();
        return view("screens.contract", compact("customers", "alquilers"));
    }


    /**Method Edit */
    public function edit($id)
    {
        $cliente = Customer::findOrFail($id);
        return view("logic.VContact", compact("cliente"));
    }

    /**Method Update */
    public function update(Request $request, $id)
    {
        if (!empty($_POST['modificar'])) {
            if (
                !empty($_POST['rif']) and !empty($_POST['direct_f']) and !empty($_POST['city']) and !empty($_POST['estado'])
                and !empty($_POST['date_creation']) and !empty($_POST['p_contact']) and !empty($_POST['p_email']) and !empty($_POST['p_movil'])
            ) {

                /**Modificar */
                $contact = Customer::findOrFail($id);
                $contact->rif = $request->rif;
                $contact->direct_f = $request->direct_f;
                $contact->city = $request->city;
                $contact->estado = $request->estado;
                $contact->date_creation = $request->date_creation;
                $contact->p_contact = $request->p_contact;
                $contact->p_email = $request->p_email;
                $contact->p_movil = $request->p_movil;
                $contact->save();

                return redirect()->route('contact')->with('success', 'El fue modificado con exito!');

            } else {
                return redirect()->back()->with('alert_message', 'Por favor asegurese de llenar todos los campos!');

            }


        } else {
            echo '<script>alert("Error")</script>';
        }
    }



    /**VISTA DE MANTENIMIENTO */
    public function mantenimiento()
    {
        return view('layouts.mantenimiento');
    }

}
