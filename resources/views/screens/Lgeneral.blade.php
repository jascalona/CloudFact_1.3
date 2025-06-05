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
    <!--STYLES-->

    <!--SCRIPTS-->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <!--SCRIPTS-->

</head>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable(
            {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
                }
            }
        );
    });
</script>

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
                                        <span class="avatar text-bg-primary avatar-lg fs-5">R</span>
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



            <div class="main p-5">

                <!--TABLE ORDEN-->
                <div class="col-md-15 mb-lg-0 mb-4">
                    <div class="card mt-4">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h4 class="mb-3 text-secondary font-weight-bolder opacity-7">Customer's:
                                        <small>Load</small>
                                    </h4>
                                </div>

                            </div>
                        </div>


                        <form method="get" class="form-validar" action="{{ route('showLoad.edit') }}">
                            @csrf

                            <div style="margin-right: 50px;" class="btns text-end mt-3">
                                <button name="submit-selected" id="submit-selected" class="btn btn-dark"
                                    name="procesarBtn">Editar</button>
                            </div>

                            <!--TABLE ORDEN-->
                            <div class="main p-5">

                                <div class="content-table">
                                    <table id="myTable" class="table align-items-center mb-0">
                                        <thead>
                                            <tr style="font-size: 13px;">
                                                <th class="text-center text-secondary text-xxs font-weight-bolder opacity-">
                                                    Opciones</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Cliente</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    RIF</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Serial</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Modelo</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    N# Contrato</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Activo</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Localidad</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Mes</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Date</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Cont. Anterior B/N</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Cont. Actual B/N</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Volum. B/N</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    AMCV_bn</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Cont. Anterior Color</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Cont. Actual Color</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Volum. Color</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    AMCV_color</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Cont. Anterior ScanImages</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Cont. Actual ScanImages</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Volum. Scan Images</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Cont. Anterior ScanJobs</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Cont. Actual ScanJobs</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Volum. Scan Jobs</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Lgenals as $row_Lgeneal)
                                                <tr style="font-size: 12px;">

                                                    <td class="text-center">
                                                        <input type="radio" name="selected_item" value="{{ $row_Lgeneal->id }}">
                                                    </td>

                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row_Lgeneal->cliente }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row_Lgeneal->rif }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row_Lgeneal->serial }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row_Lgeneal->model }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row_Lgeneal->n_contract }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row_Lgeneal->activo }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row_Lgeneal->location }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row_Lgeneal->mes }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row_Lgeneal->date }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row_Lgeneal->cont_ante_bn }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row_Lgeneal->cont_actu_bn }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row_Lgeneal->volum_bn }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row_Lgeneal->AMCV_bn }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row_Lgeneal->cont_ante_color }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row_Lgeneal->cont_actu_color }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row_Lgeneal->volum_color }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row_Lgeneal->AMCV_color }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row_Lgeneal->cont_ante_scan_images }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row_Lgeneal->cont_actu_scan_images }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row_Lgeneal->volum_scan_images }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row_Lgeneal->cont_ante_scan_jobs }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row_Lgeneal->cont_actu_scan_jobs }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row_Lgeneal->volum_scan_jobs }}
                                                    </td>

                                                </tr>
                                            @endforeach

                                            <script>
                                                document.querySelector('.form-validar').addEventListener('submit', function (e) {
                                                    const selectedItems = document.querySelectorAll('input[name="selected_items[]"]:checked');
                                                   // if (selectedItems.length === 0) {
                                                     //   e.preventDefault();
                                                       // alert('Seleccione al menos un elemento');
                                                    //}
                                                });                                           
                                            </script>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
                <!--TABLE ORDEN-->

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