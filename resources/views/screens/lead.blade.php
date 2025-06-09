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
    <link rel="stylesheet" href="{{ asset('assets/setting.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/card.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/table.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <!--STYLES-->

</head>

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

                <!--SECTION GENERAL-->
                <div class="container-fluid py-2 mb-6">

                    <div class="card">
                        <div class="card-header d-flex align-items-center border-bottom">
                            <span class="avatar text-bg-primary avatar-lg fs-5"><i class='bx bx-pulse'></i></span>
                            <div class="ms-3">
                                <h6 class="mb-0 fs-sm mt-3">Lecturas de Cliente</h6>
                                <span class="text-muted fs-sm">{{ \Carbon\Carbon::now()->format('F d, Y') }}</span>
                            </div>
                            <a href="{{ route('Lgeneral') }}" class="btn text-muted ms-auto"><i
                                    class='bx bxs-book-open'></i></a>
                        </div>
                        <div class="card-body">
                            Total de Clientes bajo contrato: 52 <i style="font-size: 18px"
                                class="bx bx-group ms-auto text-dark" data-bs-toggle="tooltip" data-bs-placement="top"></i>
                        </div>
                    </div>

                </div>
                <!--SECTION GENERAL-->



                <div style="" class="container-card-lead">

                    @foreach ($customers as $row)
                        <!--CARDS-->
                        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                            <div style=" height: 190px; " class="card">
                                <div class="card-header p-2 ps-3">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="text-sm mb-0 text-capitalize">{{ $row->cliente }}</p>
                                            <h4 class="mb-0 mt-3">{{ $row->rif }}</h4>
                                        </div>
                                        <div
                                            class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                            <i class='bx bxs-bar-chart-alt-2'></i>
                                        </div>
                                    </div>
                                </div>
                                <hr class="dark horizontal my-0">
                                <div class="card-footer p-2 ps-3">
                                    <p class="mb-0 text-sm">Contrato: #<span
                                            class="text-success font-weight-bolder">{{ $row->n_contract }} </span></p>
                                    <span><a href="{{ route('LCustomer', $row->n_contract) }}">Detalles</a></span>
                                </div>
                            </div>
                        </div>

                        <!--CARDS-->
                    @endforeach
                </div>

            </div>

            </div>




        </main>

    @endsection

</body>

</html>