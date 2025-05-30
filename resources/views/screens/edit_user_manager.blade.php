@extends('layouts.structure')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CloudFact-Lead</title>

    <!--STYLES-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/user_manager.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Stepper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/table_responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/card.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/table.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!--STYLES-->

    <!--SCRIPT-->
    <script src="{{ asset('js/new_manager.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/cdb.min.js"></script>
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



    <script>
        // Initialization for ES Users
        import { Input, Ripple, initMDB } from "mdb-ui-kit";

        initMDB({ Input, Ripple });
    </script>


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


                  
                </div>



                <!-- Contenido de cada paso -->
                        <div id="step-1-content" class="step-content p-4 border rounded">
                            <h3>Paso 1: Información básica</h3>
                            <div class="container-formulario">
                                <form>

                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="form3Example1">Nombre</label>
                                                <input type="text" id="form3Example1" class="form-control"
                                                    placeholder="Por ejemplo, Jose" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="form3Example2">Apellido</label>
                                                <input type="text" id="form3Example2" class="form-control"
                                                    placeholder="Por ejemplo, Escalona" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="form3Example1">DPT(Area)</label>
                                                <input type="text" id="form3Example1" class="form-control"
                                                    placeholder="Por ejemplo, Servicios" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="form3Example2">Cargo</label>
                                                <input type="text" id="form3Example2" class="form-control"
                                                    placeholder="Por ejemplo, Analista de Datos" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="password_confirmation">Localidad</label>
                                        <input type="text" class="form-control" id="password_confirmation"
                                            name="password_confirmation" placeholder="Por ejemplo, Torre Xerox, Caracas">
                                    </div>

                                    <!-- Email input -->
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3">Email</label>
                                        <input type="email" id="form3Example3" class="form-control"
                                            placeholder="Por ejemplo, jose.escalona@grupoxven.com" />
                                    </div>


                                    <h5 class="mt-6 mb-6"><strong>Informacion de Contacto</strong></h5>
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="form3Example1">N# Movil</label>
                                                <input type="text" id="form3Example1" class="form-control"
                                                    placeholder="Por ejemplo, Jose" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div data-mdb-input-init class="form-outline">
                                                <label class="form-label" for="form3Example2">N# Extension</label>
                                                <input type="text" id="form3Example2" class="form-control"
                                                    placeholder="Por ejemplo, Escalona" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="validationTextarea" class="form-label">Sobre Mi (Opcional)</label>
                                        <textarea class="form-control w-95" id="validationTextarea"
                                            placeholder="Descripcion relevante del usuario (Opcional)"></textarea>
                                    </div>

                                </form>
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <button class="btn btn-secondary prev-step">Anterior</button>
                                <button class="btn btn-primary next-step">Siguiente</button>
                            </div>

                        </div>

dfdfh




            </div>
            </div>



        </main>


    @endsection



</body>

</html>