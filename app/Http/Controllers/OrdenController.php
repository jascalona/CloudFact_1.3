<?php

namespace App\Http\Controllers;

use App\Models\lgenals;
use App\Models\Ordens;
use App\Models\parks;
use Illuminate\Http\Request;
use App\Models\Alquilers;
use Carbon\Carbon;

use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class OrdenController extends Controller
{
    public function edit($id)
    {
        $clienteL = alquilers::findOrFail($id);
        
                /**
         * Example SQL :
         * 
            * SELECT *
            * FROM lgenals
            * INNER JOIN alquilers ON lgenals.n_contract = alquilers.n_contract WHERE alquilers.n_contract = $id ;
         */
        
        $load = lgenals::with('alquilers')
            ->where('n_contract', $id)
            ->get();


        $ordens = ordens::orderBy('date_emi', 'desc')-> with('alquilers')
            ->where('n_contract', $id) 
            ->get();


        /**Select mes */
        $row_mes = lgenals::select('mes')->distinct()->get();


        return view("screens.orden", compact("clienteL", 'ordens', "load", "row_mes"));
    }

    public function create(Request $request, $id)
    {

        /**Nueva Instancia */
        $orden = new Ordens();

        $orden->n_contract = $request->post('n_contract');
        $orden->tipo_cambio = $request->post('tipo_cambio');
        $orden->name_c = $request->post('name_c');
        $orden->cliente = $request->post('cliente');
        $orden->rif = $request->post('rif');
        $orden->direct_f = $request->post('direct_f');
        $orden->city = $request->post('city');
        $orden->date_emi = $request->post('date_emi');
        $orden->mes = $request->post('mes');
        $orden->volum_bn = $request->post('volum_bn');
        $orden->volum_color = $request->post('volum_color');
        $orden->copi_minimo_bn = $request->post('copi_minimo_bn');
        $orden->copi_minimo_color = $request->post('copi_minimo_color');
        $orden->cargo_minimo = $request->post('cargo_minimo');
        $orden->mont_fact_bn = $request->post('mont_fact_bn');
        $orden->mont_fact_color = $request->post('mont_fact_color');
        $orden->base_imponible = $request->post('base_imponible');
        $orden->save();

        /**retorno en caso de que la vista funcione sin problemas */
        return redirect()->route('LCustomer', $id)->with('success', 'Su Orden fue generada con exito!');

    }


    public function generateInvoices(Ordens $ordens)
    {
        $client = new Party([
            'name' => $ordens->cliente,
            //'phone' => 'Por Definir',
            'custom_fields' => [
                'RIF' => $ordens->rif,
                'Dirección' => $ordens->direct_f,
                'Ciudad' => $ordens->city,
                'NC#' => $ordens->n_contract,
            ],
        ]);

        /** En caso de requerir Vendedor */
        $customer = new Party([
            'name' => 'Jose Escalona',
            'address' => 'Guatire, Venezuela',
            'code' => '#22663214',
            'custom_fields' => [
                'order number' => '> 654321 <',
            ],
        ]);


        //foreach($ordens->)

        //$subMonto = $ordens->mont_fact_bn + $ordens->mont_fact_color;

        $items = [
            /**ITEM 01 */
            InvoiceItem::make('Documentos a Facturar')
                ->description('Volum. B/N Realizado:' . " " . $ordens->volum_bn)
                ->units("")
               // ->quantity()
                ->pricePerUnit($ordens->mont_fact_bn)

                //cargoMinimo
                ->discount($ordens->cargo_minimo)

                ->subTotalPrice($ordens->mont_fact_bn),


            /**ITEM 02 */
            InvoiceItem::make("Documentos a Facturar")
                ->description('Volum. Color Realizado:' . " " . $ordens->volum_color)
                ->units("")
                ->quantity(quantity: 0)
                ->pricePerUnit($ordens->mont_fact_color)
                ->subTotalPrice($ordens->mont_fact_color),


            /**ISTEM 03 */
            InvoiceItem::make("Total Cargo Minimo") 
                ->description('Monto Neto USD: ')
                ->units("")
                ->quantity(quantity: 0)
                ->pricePerUnit($ordens->cargo_minimo)
                ->subTotalPrice($ordens->cargo_minimo)
            ,

            /*
            InvoiceItem::make('Service 2')->pricePerUnit(71.96)->quantity(2),
            InvoiceItem::make('Service 3')->pricePerUnit(4.56),
            InvoiceItem::make('Service 4')->pricePerUnit(87.51)->quantity(7)->discount(4)->units('kg'),
            InvoiceItem::make('Service 5')->pricePerUnit(71.09)->quantity(7)->discountByPercent(9),
            InvoiceItem::make('Service 6')->pricePerUnit(76.32)->quantity(9),
            InvoiceItem::make('Service 7')->pricePerUnit(58.18)->quantity(3)->discount(3),
            InvoiceItem::make('Service 8')->pricePerUnit(42.99)->quantity(4)->discountByPercent(3),
            InvoiceItem::make('Service 9')->pricePerUnit(33.24)->quantity(6)->units('m2'),
            InvoiceItem::make('Service 11')->pricePerUnit(97.45)->quantity(2),
            InvoiceItem::make('Service 12')->pricePerUnit(92.82),
            InvoiceItem::make('Service 13')->pricePerUnit(12.98),
            InvoiceItem::make('Service 14')->pricePerUnit(160)->units('hours'),
            InvoiceItem::make('Service 15')->pricePerUnit(62.21)->discountByPercent(5),
            InvoiceItem::make('Service 16')->pricePerUnit(2.80),
            InvoiceItem::make('Service 17')->pricePerUnit(56.21),
            InvoiceItem::make('Service 18')->pricePerUnit(66.81)->discountByPercent(8),
            InvoiceItem::make('Service 19')->pricePerUnit(76.37),
            InvoiceItem::make('Service 20')->pricePerUnit(55.80), */
        ];

        $notes = [
            '',
            'Tipo de Cambio:    ' . $ordens->tipo_cambio,
        ];
        $notes = implode("<br>", $notes);

        $invoice = Invoice::make('receipt')
            ->series('BIG')
            // ability to include translated invoice status
            // in case it was paid
            ->status(__('invoices::invoice.paid'))
            ->sequence(667)
            ->serialNumberFormat($ordens->n_fact)
            ->seller($client)
            ->buyer($customer)
          //  ->date(date: now()->subWeeks($ordens->date_emi))
            ->dateFormat($ordens->date_emi)
            ->payUntilDays(3)
            ->currencySymbol('$')
            ->currencyCode('USD')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($client->name . ' ' . $customer->name)
            ->addItems($items)
            ->notes($notes)
            ->logo(public_path('vendor/invoices/xdv.png'))
            // You can additionally save generated invoice to configured disk
            ->save('public');

        $link = $invoice->url();
        // Then send email to party with link

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
    }

    public function factOdoo(Request $request){

        //NUEVA INSTANCIA
        $fact_Odoo = new Ordens();

        $fact_Odoo->factOdoo = $request->get('factOdoo');
        $fact_Odoo->save();

        return redirect()->back()->with('success', 'Numero de factura (Odoo) Agregado!');

    }

}
