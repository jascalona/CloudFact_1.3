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
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Perfil</li>
                        </ol>
                    </nav>



                    <button type="button" class="btn-comunidad" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i style="font-size: 25px" class='bx bx-group'></i>
                    </button>

                </div>

            </nav>
            <!-- End Navbar -->



            @if ($message_e = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h5 class="alert-heading"><i class='bx bx-error-circle'></i> Alerta!</h5>
                    {{ $message_e }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                            class='bx bx-x'></i></button>
                </div>
            @endif

            @if ($message_e = Session::get('alert_message'))
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


                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col-12 col-xl-4">
                                <div class="card card-plain h-100">
                                    <div class="card-header pb-0 p-3">
                                        <h6 class="mb-2">Información de Contacto</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <h6 class="text-uppercase text-body text-xs font-weight-bolder">Contacto</h6>
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <button class="btn btn-light"><i class='bx bx-envelope'></i></button>
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                        for="flexSwitchCheckDefault1">{{ Auth::user()->email }}</label>
                                                </div>
                                            </li>

                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <button class="btn btn-light"><i class='bx bxs-phone-call'></i></button>
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                        for="flexSwitchCheckDefault1">{{ Auth::user()->phone }}</label>
                                                </div>
                                            </li>

                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <button class="btn btn-light"><i class='bx bxs-extension'></i></button>
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                        for="flexSwitchCheckDefault">{{ Auth::user()->n_extension }}</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <button class="btn btn-light"><i class='bx bx-sitemap'></i></button>
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                        for="flexSwitchCheckDefault2">{{ Auth::user()->cargo }}</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <button class="btn btn-light"><i
                                                            class='bx bx-current-location'></i></button>
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                        for="flexSwitchCheckDefault2">{{ Auth::user()->location }}</label>
                                                </div>
                                            </li>
                                        </ul>

                                        <br>
                                        <hr>

                                        <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4">AJUSTES
                                        </h6>
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">

                                                    <button class="btn btn-light" data-bs-toggle="modal"
                                                        data-bs-target="#modalPersonal" data-bs-whatever="@getbootstrap"><i
                                                            class='bx bx-edit-alt'></i></button>

                                                    <div class="modal fade" id="modalPersonal" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                        <strong>Información Datos</strong>
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('perfil_update_info', Auth::user()->id) }}"
                                                                        method="post">
                                                                        @method('put')
                                                                        @csrf
                                                                        <div class="mb-3">
                                                                            <label for="recipient-name"
                                                                                class="col-form-label">Nombre:</label>
                                                                            <input style="border: solid 1px #e5e5e5"
                                                                                type="text" name="name"
                                                                                value="{{ Auth::user()->name }}"
                                                                                class="form-control w-100"
                                                                                id="recipient-name"
                                                                                placeholder="Por ejemplo, Jose">
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="recipient-name"
                                                                                class="col-form-label">Apellido:</label>
                                                                            <input style="border: solid 1px #e5e5e5"
                                                                                type="text" name="surname"
                                                                                value="{{ Auth::user()->surname }}"
                                                                                class="form-control w-100"
                                                                                id="recipient-name"
                                                                                placeholder="Por ejemplo, Escalona">
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="recipient-name"
                                                                                class="col-form-label">Cargo:</label>
                                                                            <input style="border: solid 1px #e5e5e5"
                                                                                type="text" name="cargo"
                                                                                value="{{ Auth::user()->cargo }}"
                                                                                class="form-control w-100"
                                                                                id="recipient-name"
                                                                                placeholder="Por ejemplo, Analista de Datos">
                                                                        </div>


                                                                        <div class="mb-3">
                                                                            <label for="recipient-name"
                                                                                class="col-form-label">DPT:</label>
                                                                            <input style="border: solid 1px #e5e5e5"
                                                                                type="text" name="dpt"
                                                                                value="{{ Auth::user()->dpt }}"
                                                                                class="form-control w-100"
                                                                                id="recipient-name"
                                                                                placeholder="Por ejemplo, Servicios">
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="recipient-name"
                                                                                class="col-form-label">Localidad:</label>
                                                                            <input style="border: solid 1px #e5e5e5"
                                                                                type="text" name="location"
                                                                                value="{{ Auth::user()->location }}"
                                                                                class="form-control w-100"
                                                                                id="recipient-name"
                                                                                placeholder="Por ejemplo, Torre Xerox, Caracas">
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="recipient-name"
                                                                                class="col-form-label">Numero de
                                                                                Movil:</label>
                                                                            <input style="border: solid 1px #e5e5e5"
                                                                                type="text" name="phone"
                                                                                value="{{ Auth::user()->phone }}"
                                                                                class="form-control w-100"
                                                                                id="recipient-name"
                                                                                placeholder="Por ejemplo, 04129568429">
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="recipient-name"
                                                                                class="col-form-label">Extension:</label>
                                                                            <input style="border: solid 1px #e5e5e5"
                                                                                type="text" name="n_extension"
                                                                                value="{{ Auth::user()->n_extension }}"
                                                                                class="form-control w-100"
                                                                                id="recipient-name"
                                                                                placeholder="Por ejemplo, 0102">
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="message-text"
                                                                                class="col-form-label">Sobre Mi:</label>
                                                                            <textarea class="form-control" id="message-text"
                                                                                name="about"
                                                                                value="{{ Auth::user()->about }}"
                                                                                placeholder="Por ejemplo:  Hello World! Soy José. Desarrollador Full Stack Junior estudiante de Ingeniería de Sistemas, con 2 año de experiencia en el diseño, desarrollo y gestión de sistemas, bases de datos y aplicaciones. Mi pasión es crear soluciones tecnológicas innovadoras y robustas, combinando creatividad, eficiencia y las mejores prácticas."></textarea>
                                                                        </div>

                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cerrar</button>
                                                                    <button type="submit" value="submit"
                                                                        name="actu_info_per"
                                                                        class="btn btn-primary">Actualizar</button>
                                                                </div>
                                                                </form>


                                                            </div>
                                                        </div>
                                                    </div>


                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                        for="flexSwitchCheckDefault3">Actualizar Información Personal
                                                    </label>
                                                </div>
                                            </li>

                                            <li class="list-group-item border-0 px-0 pb-0">
                                                <div class="form-check form-switch ps-0">
                                                    <button class="btn btn-light"><i class='bx bx-edit-alt'></i></button>
                                                    <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                        for="flexSwitchCheckDefault5">Cambiar Clave</label>
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
                                                <h6 class="mb-2">Información Personal</h6>
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


                                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">DPT
                                                    :</strong> &nbsp; {{ Auth::user()->dpt }}</li>

                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Localidad:</strong> &nbsp;
                                                {{ Auth::user()->location }}
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-4">
                                <div style="background-color: rgb(208, 218, 237, 0.296);" class="card card-plain h-100">
                                    <div class="card-header pb-0 p-3">
                                        <h6 class="mb-2">Comunidad</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <ul class="list-group">

                                            @foreach ($users as $user)
                                                <li
                                                    class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0 mt-3">
                                                    <div class="avatar me-3">
                                                        <img src="{{ asset('images/usuarioComunidad2.png') }}" alt="kal"
                                                            class="border-radius-lg shadow">
                                                    </div>
                                                    <div class="d-flex align-items-start flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $user->name . " " . $user->surname}}</h6>
                                                        <p class="mb-0 text-xs">{{ $user->cargo }}</p>
                                                    </div>

                                                </li>
                                            @endforeach

                                        </ul>
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