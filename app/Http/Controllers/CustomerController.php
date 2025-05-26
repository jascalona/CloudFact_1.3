<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view("dashboar", compact('customers'));
    }


    /**CREATE CUSTOMER CONTACT */
    public function store(Request $request)
    {
        //Nueva Instancia

        if (!empty($_POST['btn-load'])) {

            if (!empty($_POST['name']) and !empty($_POST['rif']) and !empty($_POST['direct_f']) and !empty($_POST['city']) and !empty($_POST['estado']) and !empty($_POST['date'])
            and !empty($_POST['p_contact']) and !empty($_POST['p_email']) ) {

                /**Instancia de modelo */
                $contact = new Customer();

                $contact->name = $request->post('name');
                $contact->rif = $request->post('rif');
                $contact->direct_f = $request->post('direct_f');
                $contact->city = $request->post('city');
                $contact->estado = $request->post('estado');
                $contact->date_creation = $request->post('date');
                $contact->p_contact = $request->post('p_contact');
                $contact->p_email = $request->post('p_email');
                $contact->p_movil = $request->post(key: 'p_movil');

                $contact->save();

                /**retorno en caso de realizar las cargas */
                return redirect()->route('contact')->with('success', 'El contacto fue agregado con exito!');

            } else {
                return redirect()->route('new_contact')->with('error', '¡Ha Ocurrido un Error! Asegurese de llenar todos los Campos!');
            }


        } else {
           // return redirect()->route('')->with('error', 'Lo ');

        }




    }


}