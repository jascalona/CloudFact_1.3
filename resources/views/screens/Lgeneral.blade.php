@extends('layouts.structure')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">

                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group input-group-outline">
                                <label class="form-label">Type here...</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>


                        <button type="button" class="btn btn-dark position-relative" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            <i class='bx bxs-bell-ring'></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                99+
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </button>

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
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Opciones Avanzadas
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <h4>Descargar Plantillas</h4>
                                                        <p>Puede descargar la Plantilla de Importación <a href="#">Aquí</a>
                                                        </p>
                                                        <hr>

                                                        <h4>Carga Manual</h4>
                                                        <p>Realice la carga de lecturas manual <a href=""> aqui</a></p>
                                                        <hr>


                                                        <h4>Importar .CSV</h4>
                                                        <p>Realice la carga de lecturas através de un CSV.</p>

                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="file-input text-center d-flex ">
                                                                <input style="height: 40px; " type="file" accept=".csv"
                                                                    name="file" id="file-input" class="form-control w-60"
                                                                    required />
                                                                <label class="file-input__label" for="file-input">

                                                                    <div class="text-start">
                                                                        <button style="font-size: 17px; padding: auto;"
                                                                            type="submit" name="subir" id="btn_load"
                                                                            onclick="load_reading_general();"
                                                                            class="btn btn-success" value="submit">Cargar
                                                                            .CSV</button>
                                                                    </div>

                                                            </div>

                                                        </form>
                                                        <hr>

                                                        <h4>Exportar .XLS</h4>
                                                        <p>Exportar Lecturas Globales</p>

                                                        <div class="text-start mt-">
                                                            <form action="" method="POST">
                                                                <a href="../CONTROLLER/Export_data.php" name="export"
                                                                    id="export" class="" value="Submit">Exportar .XLS</a>
                                                            </form>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--BTN MODAL-->


                                    </div>
                                    <div class="card-body">
                                        Total de Clientes bajo contrato: 52 <i style="font-size: 18px"
                                            class="bx bx-group ms-auto text-dark" data-bs-toggle="tooltip"
                                            data-bs-placement="top"></i>
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


                        <form method="get" action="{{ route('showLoad.edit') }}">
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
                                                document.querySelector('form').addEventListener('submit', function (e) {
                                                    const selectedItem = document.querySelector('input[name="selected_item"]:checked');
                                                    if (!selectedItem) {
                                                        e.preventDefault();
                                                        alert('Por favor seleccione al menos un elemento');
                                                    }
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