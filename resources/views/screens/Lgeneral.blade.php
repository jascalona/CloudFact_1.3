@extends('layouts.structure')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/x.png') }}">
    <title>CloudFact-Lead-General</title>

    <!--STYLES-->
    <link rel="stylesheet" href="{{ asset('assets/table_responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/setting.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/card.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/table.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet"
        integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">

    <!--STYLES-->



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
        $(document).ready(function () {
            var table = $('#clientesTable').DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ entradas por página",
                    "zeroRecords": "No se encontraron registros",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                    "infoFiltered": "(filtrado de _MAX_ entradas totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "<i class='fas fa-chevron-right'></i>",
                        "previous": "<i class='fas fa-chevron-left'></i>"
                    }
                },
                "pageLength": 10,
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                "dom": '<"top"<"dataTables-header"lf>>rt<"bottom"<"dataTables-footer"ip>><"clear">',
                "initComplete": function () {
                    $('.dataTables_filter').hide();
                }
            });

            // Conectar nuestro buscador personalizado
            $('#customSearch').on('keyup', function () {
                table.search(this.value).draw();
            });


        });

        // Función de ejemplo que puedes implementar
        function miFuncionPersonalizada(datosRegistro) {
            console.log('Ejecutando acción personalizada para:', datosRegistro);
            // Implementa tu lógica aquí
        }
    </script>


</head>



<body>

    @section('content')

        <main class="main-content position-relative">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl mt-2" id="navbarBlur"
                data-scroll="true">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm">Pages</li>
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Lectura General</li>
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

            @if ($message_e = Session::get('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <h5 class="alert-heading"><i class='bx bx-error-circle'></i> Alerta!</h5>
                    {{ $message_e }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                            class='bx bx-x'></i></button>
                </div>
            @endif


            @if ($message_e = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h5 class="alert-heading"><i class='bx bx-check'></i> Proceso completado con Exito!</h5>
                    {{ $message_e }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                            class='bx bx-x'></i></button>
                </div>
            @endif


            <!--SECTION GENERAL-->
            <div class="container-fluid py-2 mb-">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">

                            <div class="col-md-12 mb-lg-0 mb-4">

                                <div class="card">
                                    <div class="card-header d-flex align-items-center border-bottom">
                                        <span class="avatar text-bg-primary avatar-lg fs-5"><i
                                                class='bx bx-pulse'></i></span>
                                        <div class="ms-3">
                                            <h6 class="mb-0 fs-sm">Informe detallado Global</h6>
                                            <span class="text-muted fs-sm">September 14, 2022</span>
                                        </div>

                                        <!--BTN MODAL-->
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                            class="btn text-muted ms-auto"><i class='bx bx-dots-vertical-rounded'></i>
                                        </button>

                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">


                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Opciones Avanzadas
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <!--01 Downloads plantilla-->
                                                        <h2 class="fs-5"><strong>1. Descargue "Planilla
                                                                Carga" de muestra(*.CSV)</strong></h2>

                                                        <form id="exportForm" action="{{ route('export_general.csv') }}"
                                                            method="POST">
                                                            @csrf

                                                            <span><small>NOTA: En esta interfaz podra descargar una muestra
                                                                    de las lecturas globales para su posterior
                                                                    carga</small></span>

                                                            <label class="mt-4" for="">Seleccione un
                                                                Rango de fechas</label>
                                                            <div class="input-group mb-3">
                                                                <div class="form-floating m-2">
                                                                    <input
                                                                        style="border: solid 1px rgba(112, 112, 112, 0.54);"
                                                                        type="date" class="form-control" id="fecha_desde"
                                                                        name="fecha_desde">
                                                                    <label for="fecha_desde">Fecha
                                                                        desde:</label>
                                                                </div>

                                                                <div class="form-floating m-2">
                                                                    <input
                                                                        style="border: solid 1px rgba(112, 112, 112, 0.54);"
                                                                        type="date" class="form-control" id="fecha_hasta"
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
                                                        <button type="submit" name="load_customer" value="submit"
                                                            class="btn btn-primary">Cargar
                                                            Lecturas</button>
                                                    </div>

                                                    </form>



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--BTN MODAL-->


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!--SECTION GENERAL-->



            <style>
                :root {
                    --primary-color: #4361ee;
                    --secondary-color: #3f37c9;
                    --accent-color: #4895ef;
                    --light-color: #f8f9fa;
                    --dark-color: #212529;
                    --success-color: #4cc9f0;
                    --warning-color: #f72585;
                    --border-radius: 8px;
                    --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                }

                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }

                body {
                    font-family: 'Roboto', sans-serif;
                    background-color: #f5f7fa;
                    color: var(--dark-color);
                    line-height: 1.6;
                    padding: 0;
                }

                .container {
                    width: 100%;
                    max-width: 100%;
                    margin: 0;
                    padding: 20px;
                }

                .card {
                    background-color: white;
                    border-radius: var(--border-radius);
                    box-shadow: var(--box-shadow);
                    padding: 25px;
                    margin-bottom: 30px;
                    width: 100%;
                }

                .card-header {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-bottom: 20px;
                    padding-bottom: 15px;
                    border-bottom: 1px solid #e9ecef;
                    flex-wrap: wrap;
                    gap: 15px;
                }

                .card-header-actions {
                    display: flex;
                    gap: 10px;
                    flex-wrap: wrap;
                }

                h2 {
                    color: var(--primary-color);
                    font-size: 20px;
                    font-weight: 500;
                }

                .btn {
                    display: inline-flex;
                    align-items: center;
                    padding: 10px 20px;
                    color: white;
                    border: none;
                    border-radius: var(--border-radius);
                    cursor: pointer;
                    font-weight: 500;
                    transition: all 0.3s ease;
                    box-shadow: var(--box-shadow);
                }

                .btn-primary {
                    background-color: var(--primary-color);
                }

                .btn-primary:hover {
                    background-color: var(--secondary-color);
                    transform: translateY(-2px);
                }

                .btn-success {
                    background-color: var(--success-color);
                }

                .btn-success:hover {
                    background-color: #3aa8d8;
                    transform: translateY(-2px);
                }

                .btn i {
                    margin-right: 8px;
                }

                .search-container {
                    position: relative;
                    width: 300px;
                    max-width: 100%;
                }

                .search-container input {
                    width: 100%;
                    padding: 10px 15px 10px 40px;
                    border: 1px solid #ddd;
                    border-radius: var(--border-radius);
                    font-size: 14px;
                    transition: all 0.3s;
                }

                .search-container input:focus {
                    outline: none;
                    border-color: var(--accent-color);
                    box-shadow: 0 0 0 2px rgba(67, 97, 238, 0.2);
                }

                .search-container i {
                    position: absolute;
                    left: 15px;
                    top: 50%;
                    transform: translateY(-50%);
                    color: #6c757d;
                }

                .table-container {
                    width: 100%;
                    overflow-x: auto;
                    margin-bottom: 20px;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                    min-width: 1000px;
                }

                th {
                    background-color: var(--primary-color);
                    color: white;
                    text-align: left;
                    padding: 12px 15px;
                    font-weight: 500;
                    position: sticky;
                    top: 0;
                    white-space: nowrap;
                }

                th:first-child {
                    border-top-left-radius: var(--border-radius);
                }

                th:last-child {
                    border-top-right-radius: var(--border-radius);
                }

                td {
                    padding: 12px 15px;
                    border-bottom: 1px solid #e9ecef;
                    white-space: nowrap;
                }

                tr:hover {
                    background-color: rgba(67, 97, 238, 0.05);
                }

                .option-cell {
                    text-align: center;
                    width: 50px;
                }

                .option-radio {
                    appearance: none;
                    width: 18px;
                    height: 18px;
                    border: 2px solid #ddd;
                    border-radius: 50%;
                    outline: none;
                    cursor: pointer;
                    position: relative;
                    transition: all 0.2s;
                }

                .option-radio:checked {
                    border-color: var(--primary-color);
                    background-color: var(--primary-color);
                }

                .option-radio:checked::after {
                    content: '';
                    position: absolute;
                    width: 8px;
                    height: 8px;
                    background-color: white;
                    border-radius: 50%;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                }

                .badge {
                    display: inline-block;
                    padding: 4px 8px;
                    border-radius: 12px;
                    font-size: 12px;
                    font-weight: 500;
                    background-color: var(--success-color);
                    color: white;
                }

                /* Estilos personalizados para DataTables */
                .dataTables_wrapper .dataTables_paginate .paginate_button {
                    min-width: 35px;
                    height: 35px;
                    padding: 0;
                    margin: 0 3px;
                    border-radius: 50% !important;
                    border: 1px solid transparent !important;
                    display: inline-flex !important;
                    align-items: center;
                    justify-content: center;
                    transition: all 0.3s;
                }

                .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
                    background: rgba(67, 97, 238, 0.1) !important;
                    border: 1px solid var(--primary-color) !important;
                    color: var(--primary-color) !important;
                }

                .dataTables_wrapper .dataTables_paginate .paginate_button.current,
                .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
                    background: var(--primary-color) !important;
                    color: white !important;
                    border: 1px solid var(--primary-color) !important;
                }

                .dataTables_wrapper .dataTables_length select {
                    padding: 5px 10px;
                    border: 1px solid #ddd;
                    border-radius: var(--border-radius);
                    background-color: white;
                }

                .dataTables_wrapper .dataTables_info {
                    color: #6c757d;
                    font-size: 14px;
                    padding-top: 15px !important;
                }

                .dataTables_wrapper .dataTables_filter input {
                    padding: 8px 15px;
                    border: 1px solid #ddd;
                    border-radius: var(--border-radius);
                    transition: all 0.3s;
                }

                .dataTables_wrapper .dataTables_filter input:focus {
                    outline: none;
                    border-color: var(--accent-color);
                    box-shadow: 0 0 0 2px rgba(67, 97, 238, 0.2);
                }

                /* Estilos para el scroll horizontal en dispositivos pequeños */
                @media (max-width: 1200px) {
                    .table-container {
                        overflow-x: auto;
                        -webkit-overflow-scrolling: touch;
                    }

                    .card-header {
                        flex-direction: column;
                        align-items: flex-start;
                    }

                    .search-container {
                        width: 100%;
                    }

                    .card-header-actions {
                        width: 100%;
                        margin-top: 15px;
                    }
                }


                .card-header {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-bottom: 20px;
                    padding-bottom: 15px;
                    border-bottom: 1px solid #e9ecef;
                    flex-wrap: wrap;
                    gap: 15px;
                }

                .card-header-title {
                    flex: 1;
                    min-width: 200px;
                }

                .card-header-actions {
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    flex-wrap: wrap;
                }

                .buttons-group {
                    display: flex;
                    gap: 10px;
                    flex-wrap: wrap;
                }

                .search-container {
                    position: relative;
                    min-width: 250px;
                    flex: 1;
                }

                /* Ajustes para responsive */
                @media (max-width: 768px) {
                    .card-header {
                        flex-direction: column;
                        align-items: stretch;
                    }

                    .card-header-actions {
                        flex-direction: column;
                        gap: 10px;
                    }

                    .buttons-group {
                        width: 100%;
                        justify-content: space-between;
                    }

                    .search-container {
                        width: 100%;
                    }
                }
            </style>

            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h2><strong>Listado de Contratos</strong></h2>



                        <div class="card-header-actions">
                            <div class="search-container">
                                <input type="text" id="customSearch" placeholder="Buscar cliente...">
                            </div>
                        </div>
                    </div>

                    <form method="get" action="{{ route('showLoad.edit') }}">
                        @csrf

                        <button id="btnCrear" class="btn btn-primary"><a style="color: #fff; text-decoration: none;"
                                href="{{ route('Alquiler.store') }}">
                                <i class="fas fa-plus"></i> Nuevo Contrato</a>
                        </button>

                        <button id="btnAccion" type="submit" value="submit" class="btn btn-success">
                             Editar
                        </button>

                        <div class="table-container">
                            <table id="clientesTable" class="display">
                                <thead style="background: blue;">
                                    <tr>
                                        <th class="option-cell">OPTION</th>
                                        <th>Cliente</th>
                                        <th>RIF</th>
                                        <th>Serial</th>
                                        <th>Modelo</th>
                                        <th>N# Contrato</th>
                                        <th>Activo</th>
                                        <th>Localidad</th>
                                        <th>Mes</th>
                                        <th>Fecha</th>
                                        <th>Cont. Anterior B/N</th>
                                        <th>Cont. Actual B/N</th>
                                        <th>Volum B/N</th>
                                        <th>AMCV_bn</th>

                                        <th>Cont. Anterior Color</th>
                                        <th>Cont. Actual Color</th>
                                        <th>Volum Color</th>
                                        <th>AMCV_bn</th>

                                        <th>Cont. Anterior ScanImages</th>
                                        <th>Cont. Actual ScanImages</th>
                                        <th>Volum ScanImages</th>

                                        <th>Cont. Anterior ScanJobs</th>
                                        <th>Cont. Actual ScanJobs</th>
                                        <th>Volum ScanJobs</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Lgenals as $row_Lgeneal)
                                        <tr>
                                            <td class="option-cell"><input type="radio" name="selected_item"
                                                    value="{{ $row_Lgeneal->id }}" class=" option-radio"></td>
                                            <td>{{ $row_Lgeneal->cliente }}</td>
                                            <td>{{ $row_Lgeneal->rif }}</td>
                                            <td>{{ $row_Lgeneal->serial }}</td>
                                            <td>{{ $row_Lgeneal->model }}</td>
                                            <td>{{ $row_Lgeneal->n_contract }}</td>
                                            <td><span class="badge">{{ $row_Lgeneal->activo }}</span></td>

                                            <td>{{ $row_Lgeneal->location }}</td>
                                            <td>{{ $row_Lgeneal->mes }}</td>
                                            <td>{{ $row_Lgeneal->date }}</td>

                                            <td>{{ $row_Lgeneal->cont_ante_bn }}</td>
                                            <td>{{ $row_Lgeneal->cont_actu_bn }}</td>
                                            <td>{{ $row_Lgeneal->volum_bn }}</td>
                                            <td>{{ $row_Lgeneal->AMCV_bn }}</td>


                                            <td>{{ $row_Lgeneal->cont_ante_color }}</td>
                                            <td>{{ $row_Lgeneal->cont_actu_color }}</td>
                                            <td>{{ $row_Lgeneal->volum_color }}</td>
                                            <td>{{ $row_Lgeneal->AMCV_color }}</td>

                                            <td>{{ $row_Lgeneal->cont_ante_scan_images }}</td>
                                            <td>{{ $row_Lgeneal->cont_actu_scan_images }}</td>
                                            <td>{{ $row_Lgeneal->volum_scan_images }}</td>

                                            <td>{{ $row_Lgeneal->cont_ante_scan_jobs }}</td>
                                            <td>{{ $row_Lgeneal->cont_actu_scan_jobs }}</td>
                                            <td>{{ $row_Lgeneal->volum_scan_jobs }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
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

    @endsection

</body>

</html>