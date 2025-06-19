<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $invoice->name }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">

    <style type="text/css" media="screen">
        html {
            font-family: sans-serif;
            line-height: 1.15;
            margin: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff;
            font-size: 10px;
            margin: 36pt;
        }

        h4 {
            margin-top: 0;
            margin-bottom: 0.5rem;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        strong {
            font-weight: bolder;
        }

        img {
            vertical-align: middle;
            border-style: none;
        }

        table {
            border-collapse: collapse;
        }

        th {
            text-align: inherit;
        }

        h4,
        .h4 {
            margin-bottom: 0.5rem;
            font-weight: 500;
            line-height: 1.2;
        }

        h4,
        .h4 {
            font-size: 1.5rem;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
        }

        .table.table-items td {
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .pr-0,
        .px-0 {
            padding-right: 0 !important;
        }

        .pl-0,
        .px-0 {
            padding-left: 0 !important;
        }

        .text-right {
            text-align: right !important;
        }

        .text-center {
            text-align: center !important;
        }

        .text-uppercase {
            text-transform: uppercase !important;
        }

        * {
            font-family: "DejaVu Sans";
        }

        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        table,
        th,
        tr,
        td,
        p,
        div {
            line-height: 1.1;
        }

        .party-header {
            font-size: 1.5rem;
            font-weight: 400;
        }

        .total-amount {
            font-size: 12px;
            font-weight: 700;
        }

        .border-0 {
            border: none !important;
        }

        .cool-gray {
            color: #6B7280;
        }

        .linear {
            margin-top: 5px;
            border: solid 0.5px #f3f3f3;
            width: 100%;
        }
    </style>
</head>

<body>
    {{-- Header --}}
    @if($invoice->logo)
        <img style="float: right;" src="{{ $invoice->getLogo() }}" alt="logo" height="35">
    @endif
    <table class="table ">
        <tbody>
            <tr style="">
                <td class="border-0 pl-0" width="70%">
                    <h1 style="margin-top: -18px;" class="text-uppercase">
                        <strong>CORPORACION XDV, C.A.</strong>
                    </h1>
                    <br>
                    <span>RIF: J-00361006-2</span>
                    <br>
                    <small>Av. Final Avenida Libertador, cruce con Calle Ávila, Edif. Edificio XEROX, Piso 2, Of: A-1,
                        <br>
                        Urb. Bello Campo, Caracas (CHACAO), Miranda, Zona Postal 1060.</small>
                    <br>
                    <small>Teléfono: (0212) 279.4407/279.4700</small>
                </td>

            </tr>

        </tbody>
    </table>

    <div style="float: right; " class="container-pre">
        @if($invoice->status)
            <h2 style="" class="text-uppercase cool-gray">
                Procesada
            </h2>
        @endif
        <p>N° Pre-factura <strong>{{ $invoice->getSerialNumber() }}</strong></p>
        <p>{{ __('invoices::invoice.date') }}: <strong>{{ $invoice->getDate() }}</strong></p>
    </div>

    <br><br><br><br><br><br><br><br>

    <hr class="linear">

    {{-- Seller - Buyer --}}
    <table style="margin-top: 10px;" class="table">
        <thead>
            <tr>
                <th class="border-0 pl-0 party-header" width="48.5%">
                    <strong>{{ $invoice->seller->name }}</strong>
                </th>
                <th class="border-0" width="3%"></th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-0">

                    @if($invoice->seller->address)
                        <p class="seller-address">
                            {{ __('invoices::invoice.address') }}: {{ $invoice->seller->address }}
                        </p>
                    @endif

                    @if($invoice->seller->code)
                        <p class="seller-code">
                            {{ __('invoices::invoice.code') }}: {{ $invoice->seller->code }}
                        </p>
                    @endif

                    @if($invoice->seller->vat)
                        <p class="seller-vat">
                            {{ __('invoices::invoice.vat') }}: {{ $invoice->seller->vat }}
                        </p>
                    @endif

                    @if($invoice->seller->phone)
                        <p class="seller-phone">
                            {{ __('invoices::invoice.phone') }}: {{ $invoice->seller->phone }}
                        </p>
                    @endif

                    @foreach($invoice->seller->custom_fields as $key => $value)
                        <p class="seller-custom-field">
                            {{ ucfirst($key) }}: {{ $value }}
                        </p>
                    @endforeach
                </td>
                <td class="border-0"></td>

            </tr>
        </tbody>
    </table>

    {{-- Table --}}
    <table class="table table-items">
        <thead>
            <tr>
                <th scope="col" class="border-0 pl-0">{{ __('invoices::invoice.description') }}</th>

                @if($invoice->hasItemUnits)
                    <th scope="col" class="text-center border-0"></th>
                @endif

                @if($invoice->hasItemDiscount)
                    <th scope="col" class="text-right border-0"></th>
                @endif


                <th scope="col" class="text-center border-0"></th>

                <th scope="col" class="text-right border-0">Mont. Volum</th>


                @if($invoice->hasItemTax)
                    <th scope="col" class="text-right border-0">{{ __('invoices::invoice.tax') }}</th>
                @endif
                <th scope="col" class="text-right border-0 pr-0">{{ __('invoices::invoice.sub_total') }}</th>
            </tr>
        </thead>
        <tbody>
            {{-- Items --}}
            @foreach($invoice->items as $item)
                <tr>
                    <td class="pl-0">
                        {{ $item->title }}

                        @if($item->description)
                            <p class="cool-gray">{{ $item->description }}</p>
                        @endif
                    </td>

                    @if($invoice->hasItemUnits)
                        <td class="text-center">{{ $item->units }}</td>
                    @endif

                    @if($invoice->hasItemDiscount)
                        <td class="text-right"></td>
                    @endif

                    <!--Dejar como valor nulo-->
                    <td class="text-center"></td>
                    <!--Dejar como valor nulo-->

                    <td class="text-right">
                        {{ $invoice->formatCurrency($item->price_per_unit) }}
                    </td>

                    @if($invoice->hasItemTax)
                        <td class="text-right">
                            {{ $invoice->formatCurrency($item->tax) }}
                        </td>
                    @endif

                    <td class="text-right pr-0">
                        {{ $invoice->formatCurrency($item->sub_total_price) }}
                    </td>
                </tr>
            @endforeach
            {{-- Summary --}}
            @if($invoice->hasItemOrInvoiceDiscount())
            @endif
            @if($invoice->taxable_amount)
                <tr>
                    <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
                    <td class="text-right pl-0">{{ __('invoices::invoice.taxable_amount') }}</td>
                    <td class="text-right pr-0">
                        {{ $invoice->formatCurrency($invoice->taxable_amount) }}
                    </td>
                </tr>
            @endif
            @if($invoice->tax_rate)
                <tr>
                    <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
                    <td class="text-right pl-0">{{ __('invoices::invoice.tax_rate') }}</td>
                    <td class="text-right pr-0">
                        {{ $invoice->tax_rate }}%
                    </td>
                </tr>
            @endif
            @if($invoice->hasItemOrInvoiceTax())
                <tr>
                    <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
                    <td class="text-right pl-0">{{ __('invoices::invoice.total_taxes') }}</td>
                    <td class="text-right pr-0">
                        {{ $invoice->formatCurrency($invoice->total_taxes) }}
                    </td>
                </tr>
            @endif
            @if($invoice->shipping_amount)
                <tr>
                    <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
                    <td class="text-right pl-0">{{ __('invoices::invoice.shipping') }}</td>
                    <td class="text-right pr-0">
                        {{ $invoice->formatCurrency($invoice->shipping_amount) }}
                    </td>
                </tr>
            @endif
            <tr>
                <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
                <td class="text-right pl-0"><strong>Base Imponible</strong></td>
                <td class="text-right pr-0 total-amount">
                    {{ $invoice->formatCurrency($invoice->total_amount) }}
                </td>
            </tr>
        </tbody>
    </table>

    <br><br><br><br><br>

    @if($invoice->notes)
        <p>
            {{ __('invoices::invoice.notes') }}: {!! $invoice->notes !!}
        </p>
    @endif

    <p>
        Cualquier requerimiento o información adicional comuniquese al correo <span
            style="color: blue;">coordinacion.cxc@grupoxven.com</>
    </p>


    <script type="text/php">
            if (isset($pdf) && $PAGE_COUNT > 1) {
                $text = "{{ __('invoices::invoice.page') }} {PAGE_NUM} / {PAGE_COUNT}";
                $size = 10;
                $font = $fontMetrics->getFont("Verdana");
                $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                $x = ($pdf->get_width() - $width);
                $y = $pdf->get_height() - 35;
                $pdf->page_text($x, $y, $text, $font, $size);
            }
        </script>
</body>

</html>