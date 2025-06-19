@extends('layouts.structure')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/x.png') }}">
    <title>CloudFact-Lead</title>

    <!--STYLES-->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('assets/table_responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/setting.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/card.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/table.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


    <script src="{{ asset('js/calculator.js') }}"></script>
    <script src="{{ asset('js/scroller_tables.js') }}"></script>
    <script src="{{ asset('js/material-dashboard.js') }}"></script>
    <script src="{{ asset('js/material-dashboard.js.map') }}"></script>
    <script src="{{ asset('js/material-dashboard.min.js') }}"></script>
    <script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('js/plugins/Chart.extension.js') }}"></script>
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


<body style="background-color: rgba(208, 218, 237, 0.296);">

    @section('content')
        <main class="main-content position-relative">
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur"
                data-scroll="true">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm">Pages</li>
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Lecturas</li>
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

            @if ($message_e = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h5 class="alert-heading"><i class='bx bx-check'></i> Proceso completado con Exito!</h5>
                    {{ $message_e }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                            class='bx bx-x'></i></button>
                </div>
            @endif

            @if ($message_e = Session::get('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <h5 class="alert-heading"><i class='bx bx-error-circle'></i> Alerta!</h5>
                    {{ $message_e }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                            class='bx bx-x'></i></button>
                </div>
            @endif


            @if(session('alert_message'))
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        alert('{{ session('alert_message') }}');
                    });
                </script>
            @endif

            <div class="container-fluid py-2">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">

                            <div class="col-xl-6 mb-xl-0 mb-4">
                                <div class="card bg-transparent shadow-xl">
                                    <div class="overflow-hidden position-relative border-radius-xl">
                                        <span class="mask bg-gradient-dark opacity-10"></span>
                                        <div class="card-body position-relative z-index-1 p-3 text-white">
                                            <h4><strong>{{$clienteL->cliente}}</strong></h4>
                                            <h5 class="text-white mt-4 mb-5 pb-2">
                                                #{{$clienteL->n_contract}}
                                            </h5>
                                            <div class="d-flex">
                                                <div class="d-flex">
                                                    <div class="me-4">
                                                        <p class="text-white text-sm opacity-8 mb-0">RIF</p>
                                                        <h6 class="text-white mb-0">{{$clienteL->rif}} </h6>
                                                    </div>
                                                    <div>
                                                        <p class="text-white text-sm opacity-8 mb-0">Tipo de Contrato
                                                        </p>
                                                        <h6 class="text-white mb-0">{{$clienteL->tipo_c}}</h6>
                                                    </div>
                                                </div>
                                                <div class="ms-auto w-10 d-flex align-items-end justify-content-end">
                                                    <img class="w-60 mt-2" src="{{ asset('images/x.png') }}" alt="logo">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--PRECIO SCAN-->
                            <div class="col-xl-6">
                                <div class="row">
                                    <div class="col-md-6 col-6">
                                        <div class="card">
                                            <div class="card-header mx-4 p-3 text-center">
                                                <div
                                                    class="icon icon-shape icon-lg bg-gradient-dark shadow text-center border-radius-lg">
                                                    <i class='bx bx-coin-stack'></i>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0 p-3 text-center">
                                                <h6 class="text-center mb-0">Precio $</h6>
                                                <span class="text-xs">Precio Cargo Minimo.</span>
                                                <hr class="horizontal dark my-3">
                                                <h5 class="mb-0">{{ $clienteL->PCM }}</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-6">
                                        <div class="card">
                                            <div class="card-header mx-4 p-3 text-center">
                                                <div
                                                    class="icon icon-shape icon-lg bg-gradient-dark shadow text-center border-radius-lg">
                                                    <i class='bx bx-dollar'></i>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0 p-3 text-center">
                                                <h6 class="text-center mb-0">Precio $</h6>
                                                <span class="text-xs">Precio Label.</span>
                                                <hr class="horizontal dark my-3">
                                                <h5 class="mb-0">{{ $clienteL->label }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--PRECIO SCAN-->

                        </div>

                        <!--GRAFICOS-->
                        <div class="row">
                            <div class="col-lg-6 col-md-6 mt-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="mb-0 ">Carga de Contadores</h6>
                                        <p class="text-sm ">Rendimiento Mensual</p>
                                        <div class="pe-2">
                                            <div class="chart">
                                                <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                                            </div>
                                        </div>
                                        <hr class="dark horizontal">
                                        <div class="d-flex ">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 mt-6 mb-4">
                                <div class="card ">
                                    <div class="card-body">
                                        <h6 class="mb-0 ">Facturación</h6>
                                        <p class="text-sm ">Registro de cotización mensual. </p>
                                        <div class="pe-2">
                                            <div class="chart">
                                                <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                                            </div>
                                        </div>
                                        <hr class="dark horizontal">
                                        <div class="d-flex ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--GRAFICOS-->


                        </div>

                    </div>

                    <!--RESUMEN FACTURACION-->
                    <div class="col-lg-4">
                        <div class="card h-100">
                            <div class="card-header pb-0 p-3">
                                <div class="row">

                                    <div class="card-body p-3 pb-0">

                                        <ul class="nav nav-fill nav-tabs" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="fill-tab-0" data-bs-toggle="tab"
                                                    href="#fill-tabpanel-0" role="tab" aria-controls="fill-tabpanel-0"
                                                    aria-selected="true">Resumen de factura</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="fill-tab-1" data-bs-toggle="tab"
                                                    href="#fill-tabpanel-1" role="tab" aria-controls="fill-tabpanel-1"
                                                    aria-selected="false">Opciones Avanzadas</a>
                                            </li>

                                        </ul>

                                    </div>
                                </div>
                            </div>

                            <!--body resumen-->
                            <div class="tab-content pt-5 m-3" id="tab-content">

                                <div class="tab-pane active" id="fill-tabpanel-0" role="tabpanel"
                                    aria-labelledby="fill-tab-0">

                                    @foreach ($ordens as $ListOrden)

                                        <ul class="list-group">
                                            <li
                                                class="list-group-item border-1 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                <div class="d-flex flex-column p-2">
                                                    <h6 class="mb-1 text-dark font-weight-bold text-sm">
                                                        {{ $ListOrden->mes }}
                                                    </h6>
                                                    <span class="text-xs"># {{ $ListOrden->n_contract }}</span>
                                                </div>
                                                <div class="d-flex align-items-center text-sm">
                                                    {{ $ListOrden->base_imponible }} $
                                                    <a href="{{ route('orden.generateInvoices', $ListOrden->id) }}"
                                                        class="btn btn- text-dark text-sm mb-0 px-0 ms-4">
                                                        <i style="font-size: 16px" class='bx bxs-file-pdf'></i> PDF</a>

                                                    <button style="" href="" class="btn btn-link"><i
                                                            style="font-size: 20px; padding: 6px;" class='bx bx-edit'
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modal_fact_odoo"></i></button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modal_fact_odoo" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                        N# Factura (Odoo)</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <form action="{{ route('LCustomer.factOdoo') }}"
                                                                        method="get">
                                                                        @csrf
                                                                        <!-- Agrega un campo oculto con el ID de la orden -->
                                                                        <input type="hidden" name="orden_id"
                                                                            value="{{ $ListOrden->id }}">

                                                                        <div class="form-group">
                                                                            <input type="text" name="n_fact_odoo"
                                                                                class="form-control w-100"
                                                                                placeholder="Ingrese el N# de factura (Odoo)"
                                                                                aria-label="Username"
                                                                                aria-describedby="basic-addon1"
                                                                                value="{{ $ListOrden->factOdoo }}" required>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Cerrar</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Cargar</button>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </li>
                                        </ul>

                                    @endforeach
                                    <br>
                                    <!-- Mostrar los enlaces de paginación -->
                                    {{ $ordens->links('pagination::bootstrap-4') }}

                                </div>

                                <div class="tab-pane" id="fill-tabpanel-1" role="tabpanel" aria-labelledby="fill-tab-1">
                                    <!--GENERAR ORDEN-->
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">Generar Ordenes</h5>
                                            <span class="card-text">
                                                <a style="border: solid 1px;"
                                                    href="{{ route('orden.edit', $clienteL->n_contract) }}" type="submit"
                                                    value="submit" name="btn-load" class="btn btn-outline-default"
                                                    href="javascript:;">Nueva Orden</a>
                                            </span>
                                        </div>
                                    </div>
                                    <!--GENERAR ORDEN-->

                                    <!--LECTUAS-->
                                    <div class="accordion accordion-flush mt-3" id="accordionFlushExample">

                                        <div class="accordion">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                                        aria-expanded="false" aria-controls="flush-collapseTwo">
                                                        Lectura Masiva
                                                    </button>
                                                </h2>

                                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <div class="card-body">

                                                            <button style="border: solid 1px;"
                                                                class="btn btn-outline-default" data-bs-toggle="modal"
                                                                data-bs-target="#cargaMasiva" href="">Cargar ahora</button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="cargaMasiva" tabindex="-1"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5"
                                                                                id="exampleModalLabel">Carga de lectura
                                                                                masiva</h1>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <!--01 Downloads plantilla-->
                                                                            <h2 class="fs-5"><strong>1. Descargue "Planilla
                                                                                    Carga" de muestra(*.CSV)</strong></h2>

                                                                            <form id="exportForm"
                                                                                action="{{ route('export.csv') }}"
                                                                                method="POST">
                                                                                @csrf


                                                                                <label class="mt-4" for="">Lecturas
                                                                                    relacionadas N# Contrato</label>
                                                                                <input type="text" name="primary"
                                                                                    id="primary"
                                                                                    value="{{ $clienteL->n_contract }}"
                                                                                    readonly>

                                                                                <label class="mt-4" for="">Seleccione un
                                                                                    Rango de fechas</label>
                                                                                <div class="input-group mb-3">
                                                                                    <div class="form-floating m-2">
                                                                                        <input
                                                                                            style="border: solid 1px rgba(112, 112, 112, 0.54);"
                                                                                            type="date" class="form-control"
                                                                                            id="fecha_desde"
                                                                                            name="fecha_desde">
                                                                                        <label for="fecha_desde">Fecha
                                                                                            desde:</label>
                                                                                    </div>

                                                                                    <div class="form-floating m-2">
                                                                                        <input
                                                                                            style="border: solid 1px rgba(112, 112, 112, 0.54);"
                                                                                            type="date" class="form-control"
                                                                                            id="fecha_hasta"
                                                                                            name="fecha_hasta">
                                                                                        <label for="fecha_hasta">Fecha
                                                                                            hasta:</label>
                                                                                    </div>

                                                                                </div>

                                                                                <button type="submit" name="downloads_p"
                                                                                    class="btn btn-primary m-2">Descargar</button>


                                                                                <script>
                                                                                    document.addEventListener('DOMContentLoaded', function () {
                                                                                        const form = document.getElementById('exportForm');

                                                                                        if (form) {
                                                                                            form.addEventListener('submit', function (e) {
                                                                                                const fechaDesde = document.getElementById('fecha_desde').value;
                                                                                                const fechaHasta = document.getElementById('fecha_hasta').value;

                                                                                                // Validación de campos vacíos
                                                                                                if (!fechaDesde || !fechaHasta) {
                                                                                                    e.preventDefault();
                                                                                                    alert('Por favor seleccione ambas fechas');
                                                                                                    return;
                                                                                                }

                                                                                                // Convertir a objetos Date para comparación
                                                                                                const desde = new Date(fechaDesde);
                                                                                                const hasta = new Date(fechaHasta);

                                                                                                // Validación de rango incorrecto
                                                                                                if (hasta < desde) {
                                                                                                    e.preventDefault();
                                                                                                    alert('La fecha "hasta" no puede ser anterior a la fecha "desde"');
                                                                                                    return;
                                                                                                }

                                                                                                // Validación adicional: fecha futura
                                                                                                const hoy = new Date();
                                                                                                hoy.setHours(0, 0, 0, 0); // Normalizar a inicio del día

                                                                                                if (desde > hoy || hasta > hoy) {
                                                                                                    e.preventDefault();
                                                                                                    alert('No se pueden seleccionar fechas futuras ya que aun no existen registros associados');
                                                                                                    return;
                                                                                                }
                                                                                            });
                                                                                        }
                                                                                    });
                                                                                </script>

                                                                            </form>
                                                                            <!--01 Downloads plantilla-->


                                                                            <hr>

                                                                            <form action="" method="post">

                                                                                <!--02 Carga masiva-->
                                                                                <h2 class="fs-5"><strong>2. Seleccione
                                                                                        la
                                                                                        plantilla descargada
                                                                                        (*.CSV)</strong></h2>

                                                                                <div class="input-group mb-3">
                                                                                    <a href="{{ route('form') }}">Nueva
                                                                                        Lectura</a>
                                                                                </div>
                                                                                <!--02 Carga masiva-->

                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Cerrar</button>
                                                                            <button type="submit" name="load_customer"
                                                                                value="submit"
                                                                                class="btn btn-primary">Cargar
                                                                                Lecturas</button>
                                                                        </div>

                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div style="font-size: 13px; height: auto; padding: 10px;"
                                                            class="card-footer text-muted">
                                                            Ideal para equipos conectados (XRC,XDA)
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <br>

                                        <div class="accordion-item">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                                        aria-expanded="false" aria-controls="flush-collapseThree">
                                                        Lectura Manual
                                                    </button>
                                                </h2>

                                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">

                                                        <div class="card-body">

                                                            <!--MODAL CARGAS MANUALES-->
                                                            <button style="border: solid 1px;"
                                                                class="btn btn-outline-default" data-bs-toggle="modal"
                                                                data-bs-target="#LecturaManual" href="">Cargar
                                                                ahora</button>

                                                            <!--BODY MODAL CARGAS MANUALES-->
                                                            <div class="modal fade" id="LecturaManual"
                                                                data-bs-backdrop="static" data-bs-keyboard="false"
                                                                tabindex="-1" aria-labelledby="LecturaManual"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-scrollable">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5" id="LecturaManual">
                                                                                Carga de lectura manual</h1>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>

                                                                        <div class="modal-body">

                                                                            <form
                                                                                action="{{ route('LCustomer.lecturaManual.store') }}"
                                                                                method="post">
                                                                                @csrf


                                                                                <div class="mb-3">
                                                                                    <label for="recipient-name"
                                                                                        class="col-form-label">Cliente</label>
                                                                                    <input
                                                                                        style="border: solid 1px rgba(99, 97, 97, 0.6);"
                                                                                        type="text" name="cliente"
                                                                                        placeholder="Cliente"
                                                                                        class="form-control" id="cliente"
                                                                                        value="{{ $clienteL->cliente }}"
                                                                                        readonly required>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="recipient-name"
                                                                                        class="col-form-label">RIF</label>
                                                                                    <input
                                                                                        style="border: solid 1px rgba(99, 97, 97, 0.6);"
                                                                                        type="text" name="rif"
                                                                                        placeholder="Rif del Cliente"
                                                                                        class="form-control" id="rif"
                                                                                        value="{{ $clienteL->rif }}"
                                                                                        readonly required>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="recipient-name"
                                                                                        class="col-form-label">N#
                                                                                        Contrato</label>
                                                                                    <input
                                                                                        style="border: solid 1px rgba(99, 97, 97, 0.6);"
                                                                                        type="text" name="n_contract"
                                                                                        placeholder="N# Contrato"
                                                                                        class="form-control" id="n_contract"
                                                                                        value="{{ $clienteL->n_contract }}"
                                                                                        readonly>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="recipient-name"
                                                                                        class="col-form-label">Serial</label>
                                                                                    <select class="form-select"
                                                                                        aria-label="Default select example"
                                                                                        name="serial" id="device" required>
                                                                                        <option selected></option>
                                                                                        @foreach ($devicePark as $dev)
                                                                                            <option value="{{ $dev->serial }}"
                                                                                                data-model="{{ $dev->model }}">
                                                                                                {{ $dev->serial }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>


                                                                                <script>
                                                                                    $("#device").change(function () {
                                                                                        // Obtiene el valor del atributo data-model del option seleccionado
                                                                                        var model = $(this).find("option:selected").data("model");
                                                                                        $("#model").val(model);
                                                                                    });
                                                                                </script>

                                                                                <div class="mb-3">
                                                                                    <label for="recipient-name"
                                                                                        class="col-form-label">Modelo</label>
                                                                                    <input
                                                                                        style="border: solid 1px rgba(99, 97, 97, 0.6);"
                                                                                        type="text" name="model"
                                                                                        placeholder="Modelo del equipo"
                                                                                        class="form-control" id="model"
                                                                                        readonly required>
                                                                                </div>


                                                                                <div class="mb-3">
                                                                                    <label for="recipient-name"
                                                                                        class="col-form-label">Localidad</label>
                                                                                    <input
                                                                                        style="border: solid 1px rgba(99, 97, 97, 0.6);"
                                                                                        type="text" name="location"
                                                                                        placeholder="Localidad"
                                                                                        class="form-control" value=""
                                                                                        required>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="recipient-name"
                                                                                        class="col-form-label">Mes</label>
                                                                                    <input
                                                                                        style="border: solid 1px rgba(99, 97, 97, 0.6);"
                                                                                        type="text" name="mes"
                                                                                        placeholder="Mes de Carga"
                                                                                        class="form-control"
                                                                                        id="recipient-name"
                                                                                        value="{{ $mesLM }}" readonly
                                                                                        required>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="recipient-name"
                                                                                        class="col-form-label">Fecha</label>
                                                                                    <input
                                                                                        style="border: solid 1px rgba(99, 97, 97, 0.6);"
                                                                                        type="text" name="date"
                                                                                        placeholder="Fecha de carga"
                                                                                        class="form-control"
                                                                                        id="recipient-name"
                                                                                        value="{{ $dateLM->format('Y-m-d') }}"
                                                                                        readonly required>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="recipient-name"
                                                                                        class="col-form-label">Cont. Ante.
                                                                                        B/N</label>
                                                                                    <input
                                                                                        style="border: solid 1px rgba(99, 97, 97, 0.6);"
                                                                                        type="number"
                                                                                        placeholder="Por ejemplo: 2650"
                                                                                        name="cont_ante_bn"
                                                                                        class="form-control"
                                                                                        id="cont_ante_bn" value="0"
                                                                                        required>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="recipient-name"
                                                                                        class="col-form-label">Cont. Actu.
                                                                                        B/N</label>
                                                                                    <input
                                                                                        style="border: solid 1px rgba(99, 97, 97, 0.6);"
                                                                                        type="number"
                                                                                        placeholder="Por ejemplo: 3000"
                                                                                        name="cont_actu_bn"
                                                                                        class="form-control"
                                                                                        id="cont_actu_bn" value="0"
                                                                                        required>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="recipient-name"
                                                                                        class="col-form-label">Volum.
                                                                                        B/N</label>
                                                                                    <input
                                                                                        style="border: solid 1px rgba(99, 97, 97, 0.6);"
                                                                                        type="number" name="volum_bn"
                                                                                        placeholder="Calculo de volumen B/N"
                                                                                        class="form-control" id="volum_bn"
                                                                                        value="0" readonly required>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="recipient-name"
                                                                                        class="col-form-label">Cont. Ante.
                                                                                        Color</label>
                                                                                    <input
                                                                                        style="border: solid 1px rgba(99, 97, 97, 0.6);"
                                                                                        type="number"
                                                                                        placeholder="Por ejemplo: 600"
                                                                                        name="cont_ante_color"
                                                                                        class="form-control"
                                                                                        id="cont_ante_color" value="0"
                                                                                        required>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="recipient-name"
                                                                                        class="col-form-label">Cont. Actu.
                                                                                        Color</label>
                                                                                    <input
                                                                                        style="border: solid 1px rgba(99, 97, 97, 0.6);"
                                                                                        type="number"
                                                                                        placeholder="Por ejemplo: 750"
                                                                                        name="cont_actu_color"
                                                                                        class="form-control"
                                                                                        id="cont_actu_color" value="0"
                                                                                        required>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="recipient-name"
                                                                                        class="col-form-label">Volum.
                                                                                        Color</label>
                                                                                    <input
                                                                                        style="border: solid 1px rgba(99, 97, 97, 0.6);"
                                                                                        type="number"
                                                                                        placeholder="Calculo de volumen Color"
                                                                                        name="volum_color"
                                                                                        class="form-control"
                                                                                        id="volum_color" value="0" readonly
                                                                                        required>
                                                                                </div>


                                                                                <div class="mb-3">
                                                                                    <label for="recipient-name"
                                                                                        class="col-form-label">Cont. Ante.
                                                                                        Scaner</label>
                                                                                    <input
                                                                                        style="border: solid 1px rgba(99, 97, 97, 0.6);"
                                                                                        type="number"
                                                                                        placeholder="Por ejemplo: 300"
                                                                                        name="cont_ante_scan_images"
                                                                                        class="form-control"
                                                                                        id="cont_ante_scan_images" value="0"
                                                                                        required>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="recipient-name"
                                                                                        class="col-form-label">Cont. Actu.
                                                                                        Scaner</label>
                                                                                    <input
                                                                                        style="border: solid 1px rgba(99, 97, 97, 0.6);"
                                                                                        type="number"
                                                                                        placeholder="Por ejemplo: 350"
                                                                                        name="cont_actu_scan_images"
                                                                                        class="form-control"
                                                                                        id="cont_actu_scan_images" value="0"
                                                                                        required>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="recipient-name"
                                                                                        class="col-form-label">Volum
                                                                                        Scaner</label>
                                                                                    <input
                                                                                        style="border: solid 1px rgba(99, 97, 97, 0.6);"
                                                                                        type="number"
                                                                                        placeholder="Calculo de volumen Scaner"
                                                                                        name="volum_scan_images"
                                                                                        class="form-control"
                                                                                        id="volum_scan_images" value="0"
                                                                                        readonly required>
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="recipient-name"
                                                                                        class="col-form-label">Anexar
                                                                                        Comprobante</label>
                                                                                    <input
                                                                                        style="border: solid 1px rgba(99, 97, 97, 0.6);"
                                                                                        type="file" placeholder=""
                                                                                        name="comprobante"
                                                                                        class="form-control"
                                                                                        id="comprobante" value="">
                                                                                </div>


                                                                        </div>


                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Cerrar</button>
                                                                            <button type="submit" name="loadManual"
                                                                                value="submit"
                                                                                class="btn btn-primary">Cargar</button>
                                                                        </div>

                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--BODY MODAL CARGAS MANUALES-->
                                                            <!--MODAL CARGAS MANUALES-->


                                                        </div>

                                                        <div style="font-size: 13px; height: auto; padding: 10px;"
                                                            class="card-footer text-muted">
                                                            Ideal para equipos en localidades foráneas cuyo acceso sea
                                                            limitado
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <!--LECTURAS-->



                                </div>

                            </div>
                            <!--body resumen-->


                        </div>
                    </div>
                    <!--RESUMEN FACTURACION-->

                    <!--CARD FOR PRECIO-->
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mt-5 mb-4">
                        <div class="card">
                            <div class="card-header p-2 ps-3">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-sm mb-0 text-capitalize">Precion B/N $</p>
                                        <h4 class="mb-0">{{ $clienteL->P_CLICK_BN_USD }}</h4>
                                    </div>
                                    <div
                                        class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                        <i class='bx bxs-color-fill'></i>
                                    </div>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-2 ps-3">
                                <p class="mb-0 text-sm"><small>Precio por Click B/N .</small></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 mb-xl-0 mt-5 mb-4">
                        <div class="card">
                            <div class="card-header p-2 ps-3">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-sm mb-0 text-capitalize">Precion Color $</p>
                                        <h4 class="mb-0">{{ $clienteL->P_CLICK_COLOR_USD }}</h4>
                                    </div>
                                    <div
                                        class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                        <i class='bx bxs-color-fill'></i>
                                    </div>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-2 ps-3">
                                <p class="mb-0 text-sm"><small>Precio por Click B/N Bs.</small></p>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 mb-xl-0 mt-5 mb-4">
                        <div class="card">
                            <div class="card-header p-2 ps-3">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-sm mb-0 text-capitalize">Copiado Minimo B/N</p>
                                        <h4 class="mb-0">{{ $clienteL->copi_minimo_bn }}</h4>
                                    </div>
                                    <div
                                        class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                        <i class='bx bxs-color-fill' style='color:#0ae089'></i>
                                    </div>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-2 ps-3">
                                <p class="mb-0 text-sm"><small>Copiado Minimo B/N </small></p>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 mt-5">
                        <div class="card">
                            <div class="card-header p-2 ps-3">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-sm mb-0 text-capitalize">Copiado Minimo Color</p>
                                        <h4 class="mb-0">{{ $clienteL->copi_minimo_color }}</h4>
                                    </div>
                                    <div
                                        class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                        <i class='bx bxs-color-fill' style='color:#0ae089'></i>
                                    </div>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-2 ps-3">
                                <p class="mb-0 text-sm"><small>Copiado Minimo Color.</small></p>

                            </div>
                        </div>
                    </div>
                    <!--CARD FOR PRECIO-->


                </div>

                <!--TABLE ORDEN-->
                <div class="col-md-15 mb-lg-0 mb-4">
                    <div class="card mt-4">

                        <!--TABLE ORDEN-->
                        <div class="main p-5">
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
                                                                Localidad</th>

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
                                                                    {{ $row_load->serial }}
                                                                </td>
                                                                <td
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    {{ $row_load->model }}
                                                                </td>

                                                                <td
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    {{ $row_load->location }}
                                                                </td>

                                                                <td
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    {{ $row_load->mes }}
                                                                </td>
                                                                <td
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    {{ $row_load->date }}
                                                                </td>
                                                                <td
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    {{ $row_load->cont_ante_bn }}
                                                                </td>
                                                                <td
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    {{ $row_load->cont_actu_bn }}
                                                                </td>
                                                                <td
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    {{ $row_load->volum_bn }}
                                                                </td>
                                                                <td
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    {{ $row_load->cont_ante_color }}
                                                                </td>
                                                                <td
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    {{ $row_load->cont_actu_color }}
                                                                </td>
                                                                <td
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    {{ $row_load->volum_color }}
                                                                </td>
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
                                                                    {{ $row_load_scan->serial }}
                                                                </td>
                                                                <td
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    {{ $row_load_scan->model }}
                                                                </td>
                                                                <td
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    {{ $row_load_scan->mes }}
                                                                </td>
                                                                <td
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    {{ $row_load_scan->date }}
                                                                </td>
                                                                <td
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    {{ $row_load_scan->cont_ante_scan_images }}
                                                                </td>
                                                                <td
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    {{ $row_load_scan->cont_actu_scan_images }}
                                                                </td>
                                                                <td
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    {{ $row_load_scan->volum_scan_images }}
                                                                </td>
                                                                <td
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    {{ $row_load_scan->cont_ante_scan_jobs }}
                                                                </td>
                                                                <td
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    {{ $row_load_scan->cont_actu_scan_jobs }}
                                                                </td>
                                                                <td
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                    {{ $row_load_scan->volum_scan_jobs }}
                                                                </td>
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
                                                            N# Pre-Factura</th>
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
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                            N# Factura-Odoo</th>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                            Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($ordens as $row_ordens)
                                                        <tr>
                                                            <td
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                {{ $row_ordens->n_fact }}
                                                            </td>
                                                            <td
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                {{ $row_ordens->mes }}
                                                            </td>
                                                            <td
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                {{ $row_ordens->n_contract }}
                                                            </td>
                                                            <td
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                {{ $row_ordens->rif }}
                                                            </td>
                                                            <td
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                {{ $row_ordens->base_imponible }} $
                                                            </td>
                                                            <td
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                {{ $row_ordens->factOdoo }}
                                                            </td>
                                                            <td
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                                <form action="{{ route('ordens.destroy', $row_ordens->id) }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                                        onclick="return confirm('¿Estás seguro de eliminar este registro?')">
                                                                        Eliminar
                                                                    </button>
                                                                </form>
                                                            </td>
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

                    </div>
                </div>
                <!--TABLE ORDEN-->


            </div>

            </div>
            </div>
            </div>

            <footer class="footer py-4  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                © 2010-2025. CloudFact <i class="fa fa-heart"></i> by
                                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Xerox de
                                    Venezuela</a>
                            </div>
                        </div>

                    </div>
                </div>
            </footer>


        </main>

        <script>
            var ctx = document.getElementById("chart-bars").getContext("2d");

            new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ["M", "T", "W", "T", "F", "S", "S"],
                    datasets: [{
                        label: "Views",
                        tension: 0.4,
                        borderWidth: 0,
                        borderRadius: 4,
                        borderSkipped: false,
                        backgroundColor: "#43A047",
                        data: [50, 45, 22, 28, 50, 60, 76],
                        barThickness: 'flex'
                    },],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: false,
                                borderDash: [5, 5],
                                color: '#e5e5e5'
                            },
                            ticks: {
                                suggestedMin: 0,
                                suggestedMax: 500,
                                beginAtZero: true,
                                padding: 10,
                                font: {
                                    size: 14,
                                    lineHeight: 2
                                },
                                color: "#737373"
                            },
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                                borderDash: [5, 5]
                            },
                            ticks: {
                                display: true,
                                color: '#737373',
                                padding: 10,
                                font: {
                                    size: 14,
                                    lineHeight: 2
                                },
                            }
                        },
                    },
                },
            });


            var ctx2 = document.getElementById("chart-line").getContext("2d");

            new Chart(ctx2, {
                type: "line",
                data: {
                    labels: ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"],
                    datasets: [{
                        label: "Sales",
                        tension: 0,
                        borderWidth: 2,
                        pointRadius: 3,
                        pointBackgroundColor: "#43A047",
                        pointBorderColor: "transparent",
                        borderColor: "#43A047",
                        backgroundColor: "transparent",
                        fill: true,
                        data: [120, 230, 130, 440, 250, 360, 270, 180, 90, 300, 310, 220],
                        maxBarThickness: 6

                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        },
                        tooltip: {
                            callbacks: {
                                title: function (context) {
                                    const fullMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                                    return fullMonths[context[0].dataIndex];
                                }
                            }
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: false,
                                borderDash: [4, 4],
                                color: '#e5e5e5'
                            },
                            ticks: {
                                display: true,
                                color: '#737373',
                                padding: 10,
                                font: {
                                    size: 12,
                                    lineHeight: 2
                                },
                            }
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                                borderDash: [5, 5]
                            },
                            ticks: {
                                display: true,
                                color: '#737373',
                                padding: 10,
                                font: {
                                    size: 12,
                                    lineHeight: 2
                                },
                            }
                        },
                    },
                },
            });

            var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

            new Chart(ctx3, {
                type: "line",
                data: {
                    labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Tasks",
                        tension: 0,
                        borderWidth: 2,
                        pointRadius: 3,
                        pointBackgroundColor: "#43A047",
                        pointBorderColor: "transparent",
                        borderColor: "#43A047",
                        backgroundColor: "transparent",
                        fill: true,
                        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                        maxBarThickness: 6

                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: false,
                                borderDash: [4, 4],
                                color: '#e5e5e5'
                            },
                            ticks: {
                                display: true,
                                padding: 10,
                                color: '#737373',
                                font: {
                                    size: 14,
                                    lineHeight: 2
                                },
                            }
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                                borderDash: [4, 4]
                            },
                            ticks: {
                                display: true,
                                color: '#737373',
                                padding: 10,
                                font: {
                                    size: 14,
                                    lineHeight: 2
                                },
                            }
                        },
                    },
                },
            });
        </script>
    @endsection



</body>

</html>