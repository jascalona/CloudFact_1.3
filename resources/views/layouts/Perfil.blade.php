@extends('layouts.structure')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CloudFact-Lead</title>

    <!--STYLES-->
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



<body style="background-color: rgba(208, 218, 237, 0.296);">

    @section('content')
        <main class="main-content position-relative">
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur"
                data-scroll="true">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm">Pages</li>
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">LCustomer</li>
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


            <div class="container-fluid px-2 px-md-4">
                <div class="page-header min-height-300 border-radius-xl mt-4"
                    style="background-image: url('https://images.pexels.com/photos/17484970/pexels-photo-17484970/free-photo-of-abstracto-resumen-investigacion-crecimiento.png?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');">
                    <span class="mask  bg-gradient-dark  opacity-6"></span>
                </div>
                <div class="card card-body mx-2 mx-md-2 mt-n6">
                    <div class="row gx-4 mb-2">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                                <img src="{{ asset('images/perfil.png') }}" alt="#"
                                    class="w-100 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    {{ Auth::user()->name . " " . Auth::user()->surname }}
                                </h5>
                                <p class="mb-0 font-weight-normal text-sm">
                                    Cargo / {{ Auth::user()->cargo }}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                            <div class="nav-wrapper position-relative end-0">
                                <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;"
                                            role="tab" aria-selected="true">
                                            <i class="material-symbols-rounded text-lg position-relative">home</i>
                                            <span class="ms-1">App</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;"
                                            role="tab" aria-selected="false">
                                            <i class="material-symbols-rounded text-lg position-relative">email</i>
                                            <span class="ms-1">Messages</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;"
                                            role="tab" aria-selected="false">
                                            <i class="material-symbols-rounded text-lg position-relative">settings</i>
                                            <span class="ms-1">Settings</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col-12 col-xl-4">
                                <div class="card card-plain h-100">
                                    <div class="card-header pb-0 p-3">
                                        <h6 class="mb-0">Información de Contacto</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <h6 class="text-uppercase text-body text-xs font-weight-bolder">Contacto</h6>
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <button class="btn btn-light"><i class='bx bx-edit-alt'></i></button>
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                        for="flexSwitchCheckDefault1">{{ Auth::user()->email }}</label>
                                                </div>
                                            </li>

                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <button class="btn btn-light"><i class='bx bx-edit-alt'></i></button>
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                        for="flexSwitchCheckDefault1">{{ Auth::user()->phone }}</label>
                                                </div>
                                            </li>

                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <button class="btn btn-light"><i class='bx bx-edit-alt'></i></button>
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                        for="flexSwitchCheckDefault">{{ Auth::user()->n_extension }}</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <button class="btn btn-light"><i class='bx bx-edit-alt'></i></button>
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                        for="flexSwitchCheckDefault2">{{ Auth::user()->cargo }}</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <button class="btn btn-light"><i class='bx bx-edit-alt'></i></button>
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                        for="flexSwitchCheckDefault2">{{ Auth::user()->location }}</label>
                                                </div>
                                            </li>


                                        </ul>
                                        <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4">Application
                                        </h6>
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <button class="btn btn-light"><i class='bx bx-edit-alt'></i></button>
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                        for="flexSwitchCheckDefault3">New launches and projects</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <input class="form-check-input ms-auto" type="checkbox"
                                                        id="flexSwitchCheckDefault4" checked>
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                        for="flexSwitchCheckDefault4">Monthly product updates</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item border-0 px-0 pb-0">
                                                <div class="form-check form-switch ps-0">
                                                    <input class="form-check-input ms-auto" type="checkbox"
                                                        id="flexSwitchCheckDefault5">
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                        for="flexSwitchCheckDefault5">Subscribe to newsletter</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-4">
                                <div class="card card-plain h-100">
                                    <div class="card-header pb-0 p-3">
                                        <div class="row">
                                            <div class="col-md-8 d-flex align-items-center">
                                                <h6 class="mb-0">Información Personal</h6>
                                            </div>
                                            <div class="col-md-4 text-end">
                                                <a href="javascript:;">
                                                    <i class="fas fa-user-edit text-secondary text-sm"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Edit Profile"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <label for="">Sobre Mi</label>
                                        <p class="text-sm">
                                            {{ Auth::user()->about }}
                                        </p>
                                        <hr class="horizontal gray-light my-4">
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                                    class="text-dark">Nombres:</strong> &nbsp;
                                                {{ Auth::user()->name . " " . Auth::user()->surname }}
                                            </li>

                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Email:</strong> &nbsp; {{ Auth::user()->email }}</li>

                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Cargo:</strong> &nbsp; {{ Auth::user()->cargo }}</li>


                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">DPT :</strong> &nbsp; {{ Auth::user()->dpt }}</li>

                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Localidad:</strong> &nbsp;
                                                {{ Auth::user()->location }}
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-4">
                                <div class="card card-plain h-100">
                                    <div class="card-header pb-0 p-3">
                                        <h6 class="mb-0">Conversations</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                                                <div class="avatar me-3">
                                                    <img src="../assets/img/kal-visuals-square.jpg" alt="kal"
                                                        class="border-radius-lg shadow">
                                                </div>
                                                <div class="d-flex align-items-start flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">Sophie B.</h6>
                                                    <p class="mb-0 text-xs">Hi! I need more information..</p>
                                                </div>
                                                <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                                    href="javascript:;">Reply</a>
                                            </li>
                                            <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                                <div class="avatar me-3">
                                                    <img src="../assets/img/marie.jpg" alt="kal"
                                                        class="border-radius-lg shadow">
                                                </div>
                                                <div class="d-flex align-items-start flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">Anne Marie</h6>
                                                    <p class="mb-0 text-xs">Awesome work, can you..</p>
                                                </div>
                                                <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                                    href="javascript:;">Reply</a>
                                            </li>
                                            <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                                <div class="avatar me-3">
                                                    <img src="../assets/img/ivana-square.jpg" alt="kal"
                                                        class="border-radius-lg shadow">
                                                </div>
                                                <div class="d-flex align-items-start flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">Ivanna</h6>
                                                    <p class="mb-0 text-xs">About files I can..</p>
                                                </div>
                                                <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                                    href="javascript:;">Reply</a>
                                            </li>
                                            <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                                <div class="avatar me-3">
                                                    <img src="../assets/img/team-4.jpg" alt="kal"
                                                        class="border-radius-lg shadow">
                                                </div>
                                                <div class="d-flex align-items-start flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">Peterson</h6>
                                                    <p class="mb-0 text-xs">Have a great afternoon..</p>
                                                </div>
                                                <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                                    href="javascript:;">Reply</a>
                                            </li>
                                            <li class="list-group-item border-0 d-flex align-items-center px-0">
                                                <div class="avatar me-3">
                                                    <img src="../assets/img/team-3.jpg" alt="kal"
                                                        class="border-radius-lg shadow">
                                                </div>
                                                <div class="d-flex align-items-start flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">Nick Daniel</h6>
                                                    <p class="mb-0 text-xs">Hi! I need more information..</p>
                                                </div>
                                                <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                                    href="javascript:;">Reply</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="mb-5 ps-3">
                                    <h6 class="mb-1">Projects</h6>
                                    <p class="text-sm">Architects design houses</p>
                                </div>
                                <div class="row">
                                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                        <div class="card card-blog card-plain">
                                            <div class="card-header p-0 m-2">
                                                <a class="d-block shadow-xl border-radius-xl">
                                                    <img src="../assets/img/home-decor-1.jpg" alt="img-blur-shadow"
                                                        class="img-fluid shadow border-radius-lg">
                                                </a>
                                            </div>
                                            <div class="card-body p-3">
                                                <p class="mb-0 text-sm">Project #2</p>
                                                <a href="javascript:;">
                                                    <h5>
                                                        Modern
                                                    </h5>
                                                </a>
                                                <p class="mb-4 text-sm">
                                                    As Uber works through a huge amount of internal management turmoil.
                                                </p>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <button type="button" class="btn btn-outline-primary btn-sm mb-0">View
                                                        Project</button>
                                                    <div class="avatar-group mt-2">
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Elena Morison">
                                                            <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                                                        </a>
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Ryan Milly">
                                                            <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                                                        </a>
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Nick Daniel">
                                                            <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                                        </a>
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Peterson">
                                                            <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                        <div class="card card-blog card-plain">
                                            <div class="card-header p-0 m-2">
                                                <a class="d-block shadow-xl border-radius-xl">
                                                    <img src="../assets/img/home-decor-2.jpg" alt="img-blur-shadow"
                                                        class="img-fluid shadow border-radius-lg">
                                                </a>
                                            </div>
                                            <div class="card-body p-3">
                                                <p class="mb-0 text-sm">Project #1</p>
                                                <a href="javascript:;">
                                                    <h5>
                                                        Scandinavian
                                                    </h5>
                                                </a>
                                                <p class="mb-4 text-sm">
                                                    Music is something that every person has his or her own specific opinion
                                                    about.
                                                </p>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <button type="button" class="btn btn-outline-primary btn-sm mb-0">View
                                                        Project</button>
                                                    <div class="avatar-group mt-2">
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Nick Daniel">
                                                            <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                                        </a>
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Peterson">
                                                            <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                                                        </a>
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Elena Morison">
                                                            <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                                                        </a>
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Ryan Milly">
                                                            <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                        <div class="card card-blog card-plain">
                                            <div class="card-header p-0 m-2">
                                                <a class="d-block shadow-xl border-radius-xl">
                                                    <img src="../assets/img/home-decor-3.jpg" alt="img-blur-shadow"
                                                        class="img-fluid shadow border-radius-lg">
                                                </a>
                                            </div>
                                            <div class="card-body p-3">
                                                <p class="mb-0 text-sm">Project #3</p>
                                                <a href="javascript:;">
                                                    <h5>
                                                        Minimalist
                                                    </h5>
                                                </a>
                                                <p class="mb-4 text-sm">
                                                    Different people have different taste, and various types of music. Music
                                                    is life.
                                                </p>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <button type="button" class="btn btn-outline-primary btn-sm mb-0">View
                                                        Project</button>
                                                    <div class="avatar-group mt-2">
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Peterson">
                                                            <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                                                        </a>
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Nick Daniel">
                                                            <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                                        </a>
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Ryan Milly">
                                                            <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                                                        </a>
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Elena Morison">
                                                            <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                        <div class="card card-blog card-plain">
                                            <div class="card-header p-0 m-2">
                                                <a class="d-block shadow-xl border-radius-xl">
                                                    <img src="https://images.unsplash.com/photo-1606744824163-985d376605aa?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                                        alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                                                </a>
                                            </div>
                                            <div class="card-body p-3">
                                                <p class="mb-0 text-sm">Project #4</p>
                                                <a href="javascript:;">
                                                    <h5>
                                                        Gothic
                                                    </h5>
                                                </a>
                                                <p class="mb-4 text-sm">
                                                    Why would anyone pick blue over pink? Pink is obviously a better color.
                                                </p>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <button type="button" class="btn btn-outline-primary btn-sm mb-0">View
                                                        Project</button>
                                                    <div class="avatar-group mt-2">
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Peterson">
                                                            <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                                                        </a>
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Nick Daniel">
                                                            <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                                        </a>
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Ryan Milly">
                                                            <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                                                        </a>
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Elena Morison">
                                                            <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </main>


    @endsection



</body>

</html>