@extends('layouts.structure')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CloudFact-Contact</title>

    <!--STYLES-->
    <link rel="stylesheet" href="{{ asset('assets/table_responsive.css') }}">
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

                <!--section create contact-->
                @if ($message_e = Session::get('warning'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <h5 class="alert-heading"><i class='bx bx-error-circle'></i> Alerta!</h5>
                        {{ $message_e }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                                class='bx bx-x'></i></button>
                    </div>
                @endif

                <div class="col-md-12 mb-lg-0 mb-4">
                    <div class="card mt-4">
                        <div class="card-header pb-0 p-3">

                            <div class="row">
                                <div class="col- d-flex align-items-center">
                                </div>

                                <form action="{{ route('new_contact.store') }}" method="post">
                                    @csrf

                                    <div class="col-12 text-end mb-3">
                                        <button type="submit" value="submit" name="btn-load"
                                            class="btn bg-gradient-dark mb-0" href="javascript:;"><i
                                                class='bx bxs-save'></i>&nbsp;&nbsp;Guardar</button>
                                    </div>
                            </div>
                        </div>

                        <div class="card-body p-3">
                            <div class="row new-contact">
                                <div class="col-md-6 mb-md-0 mb-4">


                                    <div style="font-size: 28px" class="input-group mb-3">
                                        <input type="text" name="name" class="form-"
                                            placeholder="Por ejemplo, Xerox Corpotation" aria-label="Username"
                                            aria-describedby="basic-addon1">
                                    </div>

                                    <div class="col-md-">
                                        <div
                                            class="card card-body border card-plain border-radius-lg d-block align-items-center flex-row">

                                            <!--formulario-->
                                            <div class="input-group mb-4">
                                                <div class="form-text" id="basic-addon4">RIF</div>
                                                <input type="text" name="rif" class="form-"
                                                    placeholder="Por ejemplo, J000000006" aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                            </div>

                                            <div class="input-group mb-4">
                                                <div class="form-text" id="basic-addon4">Dirección Fiscal</div>
                                                <input type="text" name="direct_f" class="form-"
                                                    placeholder="Por ejemplo, Av Eugenio Mendoza Edif Torre La Castellana"
                                                    aria-label="Username" aria-describedby="basic-addon1">
                                            </div>

                                            <div class="input-group mb-4">
                                                <div class="form-text" id="basic-addon4">Ciudad</div>
                                                <input type="text" name="city" class="form-"
                                                    placeholder="Por ejemplo, Caracas" aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                            </div>

                                            <div class="input-group mb-5">
                                                <div class="form-text" id="basic-addon4">Estado</div>
                                                <input type="text" name="estado" class="form-"
                                                    placeholder="Por ejemplo, Distrito Capital" aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                            </div>

                                            <!--formulario-->
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <br><br><br><br>
                                    <div
                                        class="card card-body border card-plain border-radius-lg d-block align-items-center flex-row">

                                        <!--formulario-->
                                        <div class="form-text" id="basic-addon4">Emision de Contacto</div>
                                        <div class="input-group mb-3">
                                            <input type="date" name="date" class="form-" placeholder="Emision"
                                                aria-label="Username" aria-describedby="basic-addon1">
                                        </div>

                                        <div class="input-group mb-4">
                                            <div class="form-text" id="basic-addon4">Persona de Contacto</div>
                                            <input type="text" name="p_contact" class="form-"
                                                placeholder="Por ejemplo, Jose Escalona" aria-label="Username"
                                                aria-describedby="basic-addon1">
                                        </div>

                                        <div class="input-group mb-4">
                                            <div class="form-text" id="basic-addon4">Email</div>
                                            <input type="email" name="p_email" class="form-"
                                                placeholder="Por ejemplo, example@grupoxven.com" aria-label="Username"
                                                aria-describedby="basic-addon1">
                                        </div>

                                        <div class="input-group mb-2">
                                            <div class="form-text" name="p_movil" id="basic-addon4">Movil</div>
                                            <input type="tel" class="form-" placeholder="Por ejemplo 02123215477"
                                                aria-label="Username" aria-describedby="basic-addon1">
                                        </div><br>

                                        <!--formulario-->
                                    </div>
                                    <br>


                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--section create bill-->

            </div>

        </main>

    @endsection

</body>

</html>