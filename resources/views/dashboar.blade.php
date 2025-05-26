@extends('layouts.structure')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CloudFact-Dashboard</title>

    <!--STYLES-->
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/card.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/material-dashboard.css.map') }}">
    <link rel="stylesheet" href="{{ asset('assets/material-dashboard.min.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
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
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
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

                    <!--CARDS-->
                    <!--EStadisticas-->
                    <div class="main-content">
                        <div class="header pb-8 pt-5 pt-md-8">
                            <div class="container-fluid">
                                <div class="header-body">
                                    <div class="row">

                                        <div class="col-xl-3 col-lg-6">
                                            <div class="card card-stats mb-4 mb-xl-0">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5 class="card-title text-uppercase text-muted mb-0">Ventas
                                                            </h5>
                                                            <span class="h2 font-weight-bold mb-0">350,897</span>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div
                                                                class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                                                <i class='bx bx-line-chart'></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="mt-3 mb-0 text-muted text-sm">
                                                        <span class="text-success mr-2"><i
                                                                class="fa fa-arrow-up"></i></span>
                                                        <span class="text-nowrap">Ventas realizadas</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-6">
                                            <div class="card card-stats mb-4 mb-xl-0">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5 class="card-title text-uppercase text-muted mb-0">SGD</h5>
                                                            <span class="h2 font-weight-bold mb-0">350</span>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div
                                                                class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                                <i class='bx bxs-group'></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="mt-3 mb-0 text-muted text-sm">
                                                        <span class="text-danger mr-2"><i
                                                                class="fas fa-arrow-down"></i></span>
                                                        <span class="text-nowrap">Contrato SGD</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-6">
                                            <div class="card card-stats mb-4 mb-xl-0">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5 class="card-title text-uppercase text-muted mb-0">Equipos
                                                            </h5>
                                                            <span class="h2 font-weight-bold mb-0">924</span>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div
                                                                class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                                                <i class='bx bxs-printer'></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="mt-3 mb-0 text-muted text-sm">
                                                        <span class="text-warning mr-2"><i
                                                                class="fas fa-arrow-down"></i></span>
                                                        <span class="text-nowrap">Equipos en cliente</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-6">
                                            <div class="card card-stats mb-4 mb-xl-0">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5 class="card-title text-uppercase text-muted mb-0">
                                                                Inventario</h5>
                                                            <span class="h2 font-weight-bold mb-0">49,6%</span>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div
                                                                class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                                <i class='bx bxs-package'></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="mt-3 mb-0 text-muted text-sm">
                                                        <span class="text-success mr-2"><i
                                                                class="fas fa-arrow-up"></i></span>
                                                        <span class="text-nowrap">Equipos disponibles</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page content -->
                    </div>
                    <!--EStadisticas-->

                    <!--CARDS-->
                </div>


                <div class="row mb-4">
                    <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="row">
                                    <div class="col-lg-6 col-7">
                                        <h6>Customer's</h6>
                                        <p class="text-sm mb-0">
                                            <i class="fa fa-check text-info" aria-hidden="true"></i>
                                            <span class="font-weight-bold ms-1">Total de Registros: </span>18
                                        </p>
                                    </div>
                                    <div class="col-lg-6 col-5 my-auto text-end">
                                        <div class="dropdown float-lg-end pe-4">
                                            <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fa fa-ellipsis-v text-secondary"></i>
                                            </a>
                                            <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
                                                aria-labelledby="dropdownTable">
                                                <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a>
                                                </li>
                                                <li><a class="dropdown-item border-radius-md" href="javascript:;">Another
                                                        action</a></li>
                                                <li><a class="dropdown-item border-radius-md" href="javascript:;">Something
                                                        else here</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive">    

                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Cliente</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    RIF</th>
                                                <th
                                                    class="text- text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-6 ps-6">
                                                    TIPO</th>
                                                <th
                                                    class="text- text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-6">
                                                    Cant. Equipos</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($customers as $customer_row)
                                            <tr>

                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <h6 class="mb-0 text-sm">{{ $customer_row->name }}</h6>
                                                    </div>

                                                </td>


                                                <td>
                                                    <div class="d-flex px- py-1">
                                                        <h6 class="mb-0 text-sm">{{ $customer_row->rif }}</h6>
                                                    </div>
                                                </td>


                                                <td>
                                                    <div class="d-flex px-6 py-1">
                                                        <h6 class="mb-0 text-sm">{{ $customer_row->tipo_c }}</h6>
                                                    </div>
                                                </td>


                                                <td>
                                                    <div class="d-flex px-6 py-1">
                                                        <h6 class="mb-0 text-sm">{{ $customer_row->cant_device }}</h6>
                                                    </div>
                                                </td>

                                            </tr>
                                            @endforeach

                                            
                                        </tbody>

                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="card-header pb-0">
                                <h6>Descripcion General</h6>
                                <p class="text-sm">
                                    <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                                    <span class="font-weight-bold">Fecha: </span> 10-10-10
                                </p>
                            </div>
                            <div class="card-body p-3">
                                <div class="timeline timeline-one-side">
                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                            <i class='bx bx-dollar'></i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">Dolar BCV: 79,78</h6>
                                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                                        </div>
                                    </div>

                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                            <i class='bx bx-dollar'></i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">Dolar Promedio: 90,08</h6>
                                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p>
                                        </div>
                                    </div>

                                    <div class="timeline-block">
                                        <span class="timeline-step">
                                            <i class='bx bx-euro'></i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">Euro: 92,09</h6>
                                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
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


    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/material-dashboard.js') }}"></script>
    <script src="{{ asset('js/material-dashboard.js.map') }}"></script>
    <script src="{{ asset('js/material-dashboard.min.js') }}"></script>

    <script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
    <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/world.js') }}"></script>




</body>

</html>