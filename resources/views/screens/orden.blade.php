<?php 
use Carbon\Carbon;

$DateActual = now()->format("y-m-d");

$fecha_actual = Carbon::now();
$mes_anio_actual = $fecha_actual->translatedFormat('F Y');


?>

@extends('layouts.structure')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/x.png') }}">
    <title>CloudFact-Orden</title>

    <!--STYLES-->
    <link rel="stylesheet" href="{{ asset('assets/table_responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/setting.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/card.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/table.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


    <script src="{{ asset('js/dehabilitarBtn.js') }}"></script>
    <script src="{{ asset('js/check.js') }}"></script>
    <script src="{{ asset('js/tab.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <!--STYLES-->

</head>

<!--TABLE LECTURAS PRINT-->
<script>
    $(document).ready(function () {
        $('#myTable').DataTable(
            {
                "language": {
                    "url": "cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
                }
            }
        );
    });
</script>
<!--TABLE LECTURAS PRINT-->


<!--TABLE LECTURAS SCAN-->
<script>
    $(document).ready(function () {
        $('#myTable_scan').DataTable(
            {
                "language": {
                    "url": "cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
                }
            }
        );
    });
</script>
<!--TABLE LECTURAS SCAN-->


<!--TABLE LECTURAS FACT-->
<script>
    $(document).ready(function () {
        $('#myTable_fact').DataTable(
            {
                "language": {
                    "url": "cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
                }
            }
        );
    });
</script>
<!--TABLE LECTURAS FACT-->



<!--CALCULATOR MONTO BN-->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const precioBn = document.getElementById('precioBn');
        const volumBn = document.getElementById('volumBn');
        const montoBn = document.getElementById('montoBn');
        
        let lastPrecio = '';
        let lastVolum = '';
        
        // Verificar cambios cada 300ms
        setInterval(function() {
            if (precioBn.value !== lastPrecio || volumBn.value !== lastVolum) {
                lastPrecio = precioBn.value;
                lastVolum = volumBn.value;
                
                const preci = parseFloat(precioBn.value) || 0;
                const volum = parseFloat(volumBn.value) || 0;
                montoBn.value = (preci * volum).toFixed(2);
            }
        }, 300);
    });
</script>
<!--CALCULATOR MONTO BN-->

<!--CALCULATOR MONTO COLOR-->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const PrecioColor = document.getElementById('precioColor');
        const VolumColor = document.getElementById('volumColor');
        const montoColor = document.getElementById('montoColor');
        
        let lastPrecio = '';
        let lastVolum = '';
        
        // Verificar cambios cada 300ms
        setInterval(function() {
            if (PrecioColor.value !== lastPrecio || VolumColor.value !== lastVolum) {
                lastPrecio = precioColor.value;
                lastVolum = volumColor.value;
                
                const preci = parseFloat(precioColor.value) || 0;
                const volum = parseFloat(volumColor.value) || 0;
                montoColor.value = (preci * volum).toFixed(2);
            }
        }, 300);
    });
</script>

<!--CALCULATOR MONTO COLOR-->


<!--CALCULATOR MONTO TOTAL-->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Elementos del DOM
        const MontoBn = document.getElementById('montoBn');
        const MontoColor = document.getElementById('montoColor');
        const CargoM = document.getElementById('cargoM');
        const Totalidad = document.getElementById('total');
        
        // Variables para rastrear cambios
        let lastValues = {
            montoBn: '',
            montoColor: '',
            cargoM: ''
        };
        
        // Función para actualizar el total
        function actualizarResultado() {
            const montoBn = parseFloat(MontoBn.value) || 0;
            const montoColor = parseFloat(MontoColor.value) || 0;
            const cargo = parseFloat(CargoM.value) || 0;
            
            Totalidad.value = (cargo + montoBn + montoColor).toFixed(2);
        }
        
        // Configuración del MutationObserver
        const observerConfig = {
            attributes: false,
            childList: false,
            characterData: true,
            subtree: true
        };
        
        // Crear observadores para cada campo
        const observer1 = new MutationObserver(checkChanges);
        observer1.observe(MontoBn, observerConfig);
        
        const observer2 = new MutationObserver(checkChanges);
        observer2.observe(MontoColor, observerConfig);
        
        const observer3 = new MutationObserver(checkChanges);
        observer3.observe(CargoM, observerConfig);
        
        // Función para verificar cambios
        function checkChanges() {
            if (MontoBn.value !== lastValues.montoBn || 
                MontoColor.value !== lastValues.montoColor || 
                CargoM.value !== lastValues.cargoM) {
                
                // Actualizar valores de referencia
                lastValues = {
                    montoBn: MontoBn.value,
                    montoColor: MontoColor.value,
                    cargoM: CargoM.value
                };
                
                // Calcular nuevo total
                actualizarResultado();
            }
        }
        
        // Intervalo de seguridad (verificación periódica)
        const verificationInterval = setInterval(checkChanges, 500);
        
        // También mantener los event listeners originales
        MontoBn.addEventListener('input', actualizarResultado);
        MontoColor.addEventListener('input', actualizarResultado);
        CargoM.addEventListener('input', actualizarResultado);
        
        // Ejecutar al inicio
        actualizarResultado();
    });
</script>
<!--CALCULATOR MONTO COLOR-->


<body>


    @section('content')

        <main class="main-content position-relative">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur"
                data-scroll="true">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm">Pages</li>
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Facturación</li>
                        </ol>
                    </nav>

                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class='bx bxs-bell-ring'></i>
                    </button>
                    <div class="modal fade" tabindex="-1" id="exampleModal" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><strong>Centro de Notificaciones</strong>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6>Hola 👋 {{ Auth::user()->name }}</h6>
                                    <br>
                                    <p>
                                        Nos emociona acompañarte en este viaje hacia la transformación digital de tu
                                        facturación. Con <strong>CloudFact</strong>, di adiós a los papeles, las
                                        calculadoras y
                                        los dolores de cabeza fiscales..."
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </nav>
            <!-- End Navbar -->

            <div class="container-fluid py-2">
                <div class="row">
                    <div class="ms-3">
                        <h3 class="mb-0 h4 font-weight-bolder">Bienvenid@ {{ Auth::user()->name }}</h3>
                        <p class="mb-4">
                            Monitorea metricas clave. Consulta Informes y analiza la informacion
                        </p>
                    </div>
                </div>

            </div>

            <!--VISTA-->
            <div class="tab-" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

                <div class="card-body p-3">
                    <div class="row new-contact card-lectura bg-white">


                        @if ($message_e = Session::get('warning'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <h5 class="alert-heading"><i class='bx bx-error-circle'></i> Alerta!</h5>
                                {{ $message_e }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                                        class='bx bx-x'></i></button>
                            </div>
                        @endif


                        <div class="viw-header">
                            <div class="logo">
                                <img src="{{ asset('images/cloud-regular-120.png') }}" alt="">
                                <h5>CloudFact<br>
                                    <span>Cloud Reading System</span>
                                </h5>
                            </div>
                        </div>


                        <div class="input-group mt-5 mb-4">
                            <div class="form-text" id="basic-addon4">Nombre del Contrato:</div>
                            <input style="font-size: 38px" type="text" class="form-" placeholder="Por ejemplo: 0916"
                                aria-label="Username" aria-describedby="basic-addon1" name="name_c"
                                value="{{ $clienteL->name_c }}">
                        </div>


                        <ul class="nav nav-tabs mt-5" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="disabled-tab-0" data-bs-toggle="tab"
                                    href="#disabled-tabpanel-0" role="tab" aria-controls="disabled-tabpanel-0"
                                    aria-selected="true">Datos del Cliente</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="disabled-tab-1" data-bs-toggle="tab" href="#disabled-tabpanel-1"
                                    role="tab" aria-controls="disabled-tabpanel-1" aria-selected="false">Información
                                    Detallada</a>
                            </li>

                        </ul>

                        <div class="tab-content pt-5" id="tab-content">

                            <!--vista 01-->
                            <div class="tab-pane active" id="disabled-tabpanel-0" role="tabpanel"
                                aria-labelledby="disabled-tab-0">

                                <h4 class="mb-4"><strong>Datos del Cliente</strong></h4>

                                <!--vsita 01 se debe ajustar el responsivo-->
                                <div class="viw-i d-flex">
                                    <div class="col-md-6 mb-md-0 mb-4">
                                        <div class="col-md-">
                                            <div
                                                class="card card-body lectura card-plain border-radius-lg d-block align-items-center flex-row">
                                                <!--form auto completado-->

                                                <div class="form-text" id="basic-addon4">Cliente</div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form" placeholder="Cliente"
                                                        aria-label="Username" aria-describedby="basic-addon1"
                                                        value="{{ $clienteL->cliente }}">
                                                </div>

                                                <div class="">

                                                    <div class="form-text mt-4" id="basic-addon4">Direccion Fiscal</div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form"
                                                            placeholder="Por ejemplo: Av Eugenio Mendoza Edif Torre La Castellana P8 Ofc 8 - La Castellana"
                                                            aria-label="Username" aria-describedby="basic-addon1"
                                                            value="{{ $clienteL->direct_f }}" readonly>
                                                    </div>

                                                    <div class="form-text mt-4" id="basic-addon4">Ciudad</div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form" placeholder="Por ejemplo: Caracas"
                                                            aria-label="Username" aria-describedby="basic-addon1" readonly
                                                            value="{{ $clienteL->city }}">
                                                    </div>

                                                    <div class="input-group mb-4">
                                                        <div class="form-text" id="basic-addon4">RIF - Cliente</div>
                                                        <input type="text" class="form-" name="rif"
                                                            placeholder="Por ejemplo, J000000006" id="rif"
                                                            aria-label="Username" aria-describedby="basic-addon1" readonly
                                                            value="{{ $clienteL->rif }}" readonly>
                                                    </div>

                                                </div>

                                                <!--form auto completado-->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div
                                            class="card card-body lectura card-plain border-radius-lg d-block align-items-center flex-row">
                                            <!--form auto completado-->

                                            <div class="mt-3">

                                                <div class="form-text" id="basic-addon4">Numero de Contrado</div>
                                                <div class="input-group mb-3">
                                                    <input style="font-size: 20px; font-weight: 600;" type="text"
                                                        class="form" placeholder="Por ejemplo: 056JE22K"
                                                        aria-label="Username" aria-describedby="basic-addon1"
                                                        value="{{ $clienteL->n_contract }}" readonly>
                                                </div>

                                                <div class="form-text" id="basic-addon4">Emision de Factura</div>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form" placeholder="por ejemplo: 07/05/25"
                                                        aria-label="Username" aria-describedby="basic-addon1"
                                                        value="{{ $DateActual }}" readonly>
                                                </div>


                                                <div class="form-text" id="basic-addon4">Precio global por click B/N USD
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="number" step="0.01" class="form" placeholder="0.00"
                                                        aria-label="Username" aria-describedby="basic-addon1"
                                                        value="{{ $clienteL->P_CLICK_BN_USD }}" readonly>
                                                </div>

                                                <div class="form-text" id="basic-addon4">Precio global por click Color USD
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="number" step="0.01" class="form" placeholder="0.00"
                                                        aria-label="Username" aria-describedby="basic-addon1"
                                                        value="{{ $clienteL->P_CLICK_COLOR_USD }}" readonly>
                                                </div>

                                            </div>

                                            <!--form auto completado-->
                                        </div>

                                    </div>
                                </div>

                                <!--vsita 01 se debe ajustar el responsivo-->
                                <div class="col-md-12 mb-md-0 mb-4">
                                    <div class="col-md-">

                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab"
                                                    href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0"
                                                    aria-selected="true">Historial de Volumen Printer</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab"
                                                    href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1"
                                                    aria-selected="false">Historial de Volumen digitization</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab"
                                                    href="#simple-tabpanel-2" role="tab" aria-controls="simple-tabpanel-1"
                                                    aria-selected="false">Resumen de Facturas</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content pt-5" id="tab-content">

                                            <!--vista printer-->
                                            <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel"
                                                aria-labelledby="simple-tab-0">

                                                <div class="content-table">
                                                    <h4 class="mb-4">Lecturas Copiado</h4>
                                                    <table id="myTable" class="table align-items-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    Serial</th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    Modelo</th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    Mes</th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    Fecha</th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    Cont. Anterior B/N</th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    Cont. Actual B/N</th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    Volum B/N</th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    Cont. Anterior Color</th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    Cont. Actual Color</th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    Volum Color</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach ($load as $row_load)

                                                                <tr>
                                                                    <td
                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                        {{ $row_load->serial }}</td>
                                                                    <td
                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                        {{ $row_load->model }}</td>
                                                                    <td
                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                        {{ $row_load->mes }}</td>
                                                                    <td
                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                        {{ $row_load->date }}</td>
                                                                    <td
                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                        {{ $row_load->cont_ante_bn }}</td>
                                                                    <td
                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                        {{ $row_load->cont_actu_bn }}</td>
                                                                    <td
                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                        {{ $row_load->volum_bn }}</td>
                                                                    <td
                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                        {{ $row_load->cont_ante_color }}</td>
                                                                    <td
                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                        {{ $row_load->cont_actu_color }}</td>
                                                                    <td
                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                        {{ $row_load->volum_color }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                            <!--vista printer-->


                                            <!--vista digitalizacion-->
                                            <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel"
                                                aria-labelledby="simple-tab-1">

                                                <div class="content-table">
                                                    <h4 class="mb-4">Lecturas Digitalización</h4>


                                                    <table id="myTable_scan" class="table align-items-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    Serial</th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    Modelo</th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    Mes</th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    Fecha</th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    Cont. Ant. ScanImages</th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    Cont. Act. ScanImages</th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    Volum ScanImages</th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    Cont. Ante. ScanJobs</th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    Cont. Actu. ScanJobs</th>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    Volum ScanJobs</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach ($load as $row_load_scan)

                                                                <tr>
                                                                    <td
                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                        {{ $row_load_scan->serial }}</td>
                                                                    <td
                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                        {{ $row_load_scan->model }}</td>
                                                                    <td
                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                        {{ $row_load_scan->mes }}</td>
                                                                    <td
                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                        {{ $row_load_scan->date }}</td>
                                                                    <td
                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                        {{ $row_load_scan->cont_ante_scan_images }}</td>
                                                                    <td
                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                        {{ $row_load_scan->cont_actu_scan_images }}</td>
                                                                    <td
                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                        {{ $row_load_scan->volum_scan_images }}</td>
                                                                    <td
                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                        {{ $row_load_scan->cont_ante_scan_jobs }}</td>
                                                                    <td
                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                        {{ $row_load_scan->cont_actu_scan_jobs }}</td>
                                                                    <td
                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                        {{ $row_load_scan->volum_scan_jobs }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--vista digitalizacion-->

                                            <!--vista cotizacion-->
                                            <div class="tab-pane" id="simple-tabpanel-2" role="tabpanel"
                                                aria-labelledby="simple-tab-2">

                                                <table id="myTable_fact" class="table align-items-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                N# Factura</th>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                Mes</th>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                N# Contrato</th>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                RIF</th>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                Total Facturado</th>
                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                    @foreach ($ordens as $row_ordens)
                                                        <tr>
                                                            <td
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                {{ $row_ordens->n_fact }}</td>
                                                            <td
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                {{ $row_ordens->mes }}</td>
                                                            <td
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                {{ $row_ordens->n_contract }}</td>
                                                            <td
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                {{ $row_ordens->rif }}</td>
                                                            <td
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                {{ $row_ordens->base_imponible }} $</td>

                                                        </tr>
                                                     @endforeach


                                                    </tbody>
                                                </table>

                                            </div>
                                            <!--vista cotizacion-->
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <!--vista 01-->



                            <!--vista 02-->
                            <div class="tab-pane" id="disabled-tabpanel-1" role="tabpanel" aria-labelledby="disabled-tab-1">
                              

                            <div class="calculadora-volumen">
                            <h4 class="mb-4"><strong>Mes a Facturar</strong></h4>
                                @csrf

                                <div class="viw-i d-flex">
                                    <div class="col-md-5 mb-md-0 mb-4 mt-3">
                                        
                                    <div class="form-group">
                                        <label for="fecha">Seleccione fecha:</label>
                                        <input type="text" class="form-" id="fecha" placeholder="Por ejemplo, junio 2025" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" class="form-" id="n_contract" value="{{ $clienteL->n_contract }}" placeholder="Por ejemplo, junio 2025" required>
                                    </div>
                                    
                                    <div class="form-group mt-3">
                                        <label for="resultado">Total volum Print B/N:</label>
                                        <input type="text" name="sum_volum_bn" class="form-" id="resultado" readonly >
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="resultado2">Total volum Print Color:</label>
                                        <input type="text" class="form-" id="resultado2" readonly>
                                    </div>
                                    
                                    <br>
                                    <button id="btnCalcular" class="btn btn-primary">Calcular Volumen</button>
                                
                                    </div>

                                    
                                    <div style="margin-left: 50px" class="col-md-6 ">
                                        <div class="card card-body card-plain border-radius-lg d-block align-items-center flex-row">

                                        
                                        <div class="form-group mt-7">
                                            <label for="resultado">Total volum ScanImage:</label>
                                            <input type="text" class="form-" id="resultado3" readonly>
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="resultado2">Total volum ScanJobs:</label>
                                            <input type="text" class="form-" id="resultado4" readonly>
                                        </div>

                                        </div>
                                    </div>

                                </div>
                                
                            </div>


                            <script>
                                document.getElementById('btnCalcular').addEventListener('click', function() {
                                    const fecha = document.getElementById('fecha').value;
                                    const n_contract = document.getElementById('n_contract').value;
                                    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
                                    
                                    if (!fecha) {
                                        alert('Por favor seleccione una fecha');
                                        return;
                                    }
                                    
                                    if (!n_contract) {
                                        alert('El número de contrato es requerido');
                                        return;
                                    }
                                    
                                    fetch("{{ route('sumar.volumen') }}", {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': csrfToken
                                        },
                                        body: JSON.stringify({
                                            fecha: fecha,
                                            n_contract: n_contract
                                        })
                                    })
                                    .then(response => {
                                        if (!response.ok) {
                                            return response.json().then(err => { throw err; });
                                        }
                                        return response.json();
                                    })
                                    .then(data => {
                                        document.getElementById('resultado').value = data.suma;
                                        document.getElementById('resultado2').value = data.suma_color;
                                        document.getElementById('resultado3').value = data.suma_scanI;
                                        document.getElementById('resultado4').value = data.suma_scanJ;
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        alert(error.error || 'Ocurrió un error al calcular');
                                    });
                                });
                            </script>

                            

                            <!-- FORMULA DE COPIADO MINIMO VOLUMEN BN -->
                            <input type="hidden" id="volumen" placeholder="Volumen" value=""   oninput="calcularResultado()">
                           
                            <script>
                                // Función para calcular el resultado en tiempo real (números enteros)
                                function calcularResultado() {
                                    // Usamos parseInt para forzar números enteros
                                    const volumen = parseInt(document.getElementById('volumen').value) || 0;
                                    const copiMinimo = parseInt(document.getElementById('copi_minimo_bn').value) || 0;
                                    const resultadoInput = document.getElementById('volumBn');

                                    if (volumen <= copiMinimo) {
                                        resultadoInput.value = 0;
                                    } else {
                                        // Resultado en enteros (sin decimales)
                                        resultadoInput.value = volumen - copiMinimo;
                                    }
                                }

                                // Actualización en tiempo real del campo volumen
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Escuchar cambios en los inputs relevantes
                                    document.getElementById('volumen').addEventListener('input', calcularResultado);
                                    document.getElementById('copi_minimo_bn').addEventListener('input', calcularResultado);
                                    
                                    // Ejecutar al cargar por si hay valores predefinidos
                                    calcularResultado();
                                });

                                // Función para el botón calcular (ajustada para filtros por fecha y contrato)
                                document.getElementById('btnCalcular').addEventListener('click', function() {
                                    const fecha = document.getElementById('fecha').value;
                                    const n_contract = document.getElementById('n_contract').value;
                                    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
                                    
                                    
                                    // Petición fetch con ambos parámetros
                                    fetch("{{ route('sumar.volumen') }}", {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': csrfToken
                                        },
                                        body: JSON.stringify({
                                            fecha: fecha,
                                            n_contract: n_contract
                                        })
                                    })
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error('Error en la respuesta del servidor');
                                        }
                                        return response.json();
                                    })
                                    .then(data => {
                                        // Actualizar todos los resultados (convertidos a enteros)
                                        document.getElementById('resultado').value = parseInt(data.suma) || 0;
                                        document.getElementById('resultado2').value = parseInt(data.suma_color) || 0;
                                        document.getElementById('resultado3').value = parseInt(data.suma_scanI) || 0;
                                        document.getElementById('resultado4').value = parseInt(data.suma_scanJ) || 0;
                                        
                                        // Actualizar el campo volumen y disparar el cálculo automático
                                        const volumenInput = document.getElementById('volumen');
                                        volumenInput.value = parseInt(data.suma) || 0;
                                        
                                        // Forzar el cálculo automático
                                        volumenInput.dispatchEvent(new Event('input'));
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        alert(error.message || 'Ocurrió un error al calcular');
                                    });
                                });
                            </script>
                            <!-- FORMULA DE COPIADO MINIMO VOLUMEN BN -->
                               


                            <!-- FORMULA DE COPIADO MINIMO VOLUMEN COLOR -->
                            <input type="hidden" id="volumen_color" placeholder="Volumen" value=""   oninput="calcularResultado_color()">
                           
                            <script>
                                // Función para calcular el resultado en tiempo real (números enteros) - COLOR
                                function calcularResultado_color() {
                                    // Usamos parseInt para forzar números enteros
                                    const volumen_color = parseInt(document.getElementById('volumen_color').value) || 0;
                                    const copiMinimo = parseInt(document.getElementById('copi_minimo_color').value) || 0;
                                    const resultadoInput = document.getElementById('volumColor');

                                    if (volumen_color <= copiMinimo) {
                                        resultadoInput.value = 0;
                                    } else {
                                        // Resultado en enteros (sin decimales)
                                        resultadoInput.value = volumen_color - copiMinimo;
                                    }
                                }

                                // Actualización en tiempo real del campo volumen_color
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Escuchar cambios en los inputs relevantes para color
                                    document.getElementById('volumen_color').addEventListener('input', calcularResultado_color);
                                    document.getElementById('copi_minimo_color').addEventListener('input', calcularResultado_color);
                                    
                                    // Ejecutar al cargar por si hay valores predefinidos
                                    calcularResultado_color();
                                });

                                // Función unificada para el botón calcular (para B/N y Color)
                                document.getElementById('btnCalcular').addEventListener('click', function() {
                                    const fecha = document.getElementById('fecha').value;
                                    const n_contract = document.getElementById('n_contract').value;
                                    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
                       
                                    
                                    // Petición fetch con ambos parámetros
                                    fetch("{{ route('sumar.volumen') }}", {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': csrfToken
                                        },
                                        body: JSON.stringify({
                                            fecha: fecha,
                                            n_contract: n_contract
                                        })
                                    })
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error('Error en la respuesta del servidor');
                                        }
                                        return response.json();
                                    })
                                    .then(data => {
                                        // Actualizar todos los resultados (convertidos a enteros)
                                        document.getElementById('resultado').value = parseInt(data.suma) || 0;          // B/N
                                        document.getElementById('resultado2').value = parseInt(data.suma_color) || 0;   // Color
                                        
                                        // Actualizar campos adicionales si existen
                                        if (document.getElementById('resultado3')) {
                                            document.getElementById('resultado3').value = parseInt(data.suma_scanI) || 0;
                                        }
                                        if (document.getElementById('resultado4')) {
                                            document.getElementById('resultado4').value = parseInt(data.suma_scanJ) || 0;
                                        }
                                        
                                        // Actualizar el campo volumen B/N y disparar cálculo automático
                                        const volumenBnInput = document.getElementById('volumen');
                                        if (volumenBnInput) {
                                            volumenBnInput.value = parseInt(data.suma) || 0;
                                            volumenBnInput.dispatchEvent(new Event('input'));
                                        }
                                        
                                        // Actualizar el campo volumen Color y disparar cálculo automático
                                        const volumenColorInput = document.getElementById('volumen_color');
                                        if (volumenColorInput) {
                                            volumenColorInput.value = parseInt(data.suma_color) || 0;
                                            volumenColorInput.dispatchEvent(new Event('input'));
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        alert(error.message || 'Ocurrió un error al calcular');
                                    });
                                });
                            </script>
                            <!-- FORMULA DE COPIADO MINIMO VOLUMEN COLOR -->

                            <hr>
                            
                                <h4 class="mb-4"><strong>Información Detallada</strong></h4>

                                <form action="{{ route('orden.create', $clienteL->n_contract) }}" method="POST">
                                    @csrf

                                    <div style="display: none;" class="input-group mt-5 mb-4">
                                        <input type="hidden" class="form-" placeholder="Por ejemplo: 0916"
                                            aria-label="Username" aria-describedby="basic-addon1" name="name_c"
                                            value="{{ $clienteL->name_c }}">
                                    </div>

                                    <!--vsita 012se debe ajustar el responsivo-->
                                    <!--vsita 01 se debe ajustar el responsivo-->
                                    <div class="viw-i d-flex">
                                        <div class="col-md-6 mb-md-0 mb-4">
                                            <div class="col-md-">
                                                <div
                                                    class="card card-body lectura card-plain border-radius-lg d-block align-items-center flex-row">
                                                    <!--form auto completado-->

                                                    <div class="form-text" id="basic-addon4">Cliente</div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form" placeholder="Cliente"
                                                            aria-label="Username" aria-describedby="basic-addon1"
                                                            name="cliente" value="{{ $clienteL->cliente }}">
                                                    </div>

                                                    <div class="">

                                                        <div class="form-text mt-4" id="basic-addon4">Direccion Fiscal</div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form"
                                                                placeholder="Por ejemplo: Av Eugenio Mendoza Edif Torre La Castellana P8 Ofc 8 - La Castellana"
                                                                aria-label="Username" aria-describedby="basic-addon1"
                                                                name="direct_f" value="{{ $clienteL->direct_f }}" readonly>
                                                        </div>

                                                        <div class="form-text mt-4" id="basic-addon4">Ciudad</div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form"
                                                                placeholder="Por ejemplo: Caracas" aria-label="Username"
                                                                aria-describedby="basic-addon1" name="city"
                                                                value="{{ $clienteL->city }}" readonly>
                                                        </div>

                                                        <div class="input-group mb-4">
                                                            <div class="form-text" id="basic-addon4">RIF - Cliente</div>
                                                            <input type="text" class="form-" name="rif"
                                                                placeholder="Por ejemplo, J000000006" id="rif"
                                                                aria-label="Username" aria-describedby="basic-addon1"
                                                                readonly name="rif" value="{{ $clienteL->rif }}" readonly>
                                                        </div>

                                                        <div class="form-text mt-4" id="basic-addon4">Tipo de Cambio</div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form"
                                                                placeholder="Por ejemplo: Paralelo" aria-label="Username"
                                                                aria-describedby="basic-addon1" name="tipo_cambio"
                                                                value="{{ $clienteL->tipo_cambio }}">
                                                        </div>

                                                    </div>

                                                    <!--form auto completado-->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div
                                                class="card card-body lectura card-plain border-radius-lg d-block align-items-center flex-row">
                                                <!--form auto completado-->

                                                <div class="mt-2">

                                                    <div class="form-text" id="basic-addon4">Numero de Contrado</div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form" placeholder="Por ejemplo: 056JE22K"
                                                            aria-label="Username" aria-describedby="basic-addon1"
                                                            name="n_contract" value="{{ $clienteL->n_contract }}" readonly>
                                                    </div>

                                                    <div class="form-text" id="basic-addon4">Emision de Factura</div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form" placeholder="por ejemplo: 07/05/25"
                                                            aria-label="Username" aria-describedby="basic-addon1"
                                                            name="date_emi" value="{{ $DateActual }}" readonly>
                                                    </div>

                                                    <div class="form-text" id="basic-addon4">Mes</div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form" placeholder="por ejemplo: 07/05/25"
                                                            aria-label="Username" aria-describedby="basic-addon1" name="mes"
                                                            value="{{ $mes_anio_actual }}" readonly>
                                                    </div>



                                                    <div class="form-text" id="basic-addon4">Precio global por click B/N USD
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="number" step="0.01" class="form" placeholder="0.00"
                                                            aria-label="Username" id="precioBn"
                                                            aria-describedby="basic-addon1"
                                                            value="{{ $clienteL->P_CLICK_BN_USD }}" readonly>
                                                    </div>

                                                    <div class="form-text" id="basic-addon4">Precio global por click Color
                                                        USD</div>
                                                    <div class="input-group mb-3">
                                                        <input type="number" step="0.01" class="form" placeholder="0.00"
                                                            aria-label="Username" id="precioColor"
                                                            aria-describedby="basic-addon1"
                                                            value="{{ $clienteL->P_CLICK_COLOR_USD }}" readonly>
                                                    </div>

                                                </div>

                                                <!--form auto completado-->
                                            </div>

                                        </div>
                                    </div>


                                    <hr>


                                    <div class="viw-i d-flex mt-5" id="volumP">
                                        <div class="col-md-6 mb-md-0 mb-4">

                                            <h4 class="mt-4 mb-4"><strong>Concepto o Descripción</strong></h4>

                                            <!--Calculo Automatico-->
                                            <div style="display: none;" class="volum_bn">
                                                {{ $VOLUM_BN = 0 }}
                                                @foreach ($load as $dato)
                                                    {{ $VOLUM_BN += $dato->volum_bn }}
                                                @endforeach
                                            </div>

                                            <div style="display: none;" class="volum_color">
                                                {{ $VOLUM_COLOR = 0 }}
                                                @foreach ($load as $dato)
                                                    {{ $VOLUM_COLOR += $dato->volum_color }}
                                                @endforeach
                                            </div>
                                            <!--Calculo Automatico-->

                                        <script>

                                        /**INPUT VOLUM BN */
                                        $("#resultado").change(function () {
                                            var volumBn = $(this).val();
                                            $("#volumBn").val(volumBn);
                                        });

                                        </script>

                                            <div class="content-fact">
                                                <div class="mb-3 row">
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <i style="font-size: 45px; margin-left: 12px;"
                                                                class='bx bxs-circle'></i>
                                                            <div class="ms-3">
                                                                <p class="fw-bold mb-1">Volumen Diferencial B/N</p>
                                                                <input type="number" class="form-control-plaintext"
                                                                    id="volumBn" name="volum_bn" value=""
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </div>
                                            </div>


                                            <div class="content-fact">
                                                <div class="mb-3 row">
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <i style="font-size: 45px; margin-left: 12px; color:#0feae3;"
                                                                class='bx bxs-circle'></i>
                                                            <div class="ms-3">
                                                                <p class="fw-bold mb-1">Volumen a Diferencial Color</p>
                                                                <input type="text" class="form-control-plaintext"
                                                                    id="volumColor" name="volum_color"
                                                                    value="{{$VOLUM_COLOR}}" required>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </div>
                                            </div>

                                            <h4 class="mb-4 mt-6"><strong>Copiado Minimo Contratado</strong></h4>
                                            <div class="content-fact">
                                                <div class="mb-3 row">
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <i style="font-size: 45px; margin-left: 12px;"
                                                                class='bx bxs-circle'></i>
                                                            <div class="ms-3">
                                                                <p class="fw-bold mb-1">Copiado Minimo B/N</p>
                                                                <input type="number" class="form-control-plaintext w-100"
                                                                    id="copi_minimo_bn" name="copi_minimo_bn"
                                                                    value="{{ $clienteL->copi_minimo_bn }}" required readonly >
                                                            </div>
                                                        </div>
                                                    </li>
                                                </div>
                                            </div>


                                            <div class="content-fact">
                                                <div class="mb-3 row">
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <i style="font-size: 45px; margin-left: 12px; color:#0feae3;"
                                                                class='bx bxs-circle'></i>
                                                            <div class="ms-3">
                                                                <p class="fw-bold mb-1">Copiado Minimo Color</p>
                                                                <input type="text" class="form-control-plaintext" id="copi_minimo_color"
                                                                    name="copi_minimo_color"
                                                                    value="{{ $clienteL->copi_minimo_color }}" required readonly>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </div>
                                            </div>

                                            <h4 class="mb-4 mt-6"><strong>Cargo Minimo</strong></h4>
                                            <div class="content-fact">
                                                <div class="mb-3 row">
                                                    <label for="staticEmail" class="col-sm- col-form-label">Monto Cargo
                                                        minimo</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control-plaintext" id="cargoM"
                                                            name="cargo_minimo" value="{{ $clienteL->PCM }}" required readonly>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6 mb-md-0 mb-">

                                            

                                            <h4 class="mb-4 mt-3"><strong>Montos a Facturar</strong></h4>
                                            <div class="content-fact">
                                                <div class="mb-3 row">
                                                    <label for="staticEmail" class="col-sm- col-form-label">Monto B/N
                                                        USD</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control-plaintext" id="montoBn"
                                                            name="mont_fact_bn" value="" required>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="content-fact">
                                                <div class="mb-3 row">
                                                    <label for="staticEmail" class="col-sm- col-form-label">Monto Color
                                                        USD</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control-plaintext" id="montoColor"
                                                            name="mont_fact_color" value="" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <h4 class="mb-4 mt-6"><strong>Base Imponible USD</strong></h4>
                                            <div class="content-fact">
                                                <div class="mb-3 row">
                                                    <label for="staticEmail" class="col-sm- col-form-label">Monto
                                                        USD</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control-plaintext" id="total"
                                                            name="base_imponible" value="" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" value="submit" name="GOrden"
                                                class="btn btn-dark mt-3">Generar Orden</button>

                                        </div>

                                    </div>


                                </form>

                            </div>
                            <!--vista 02-->



                        </div>
                        <!--VISTA-->



        </main>

    @endsection

</body>

</html>