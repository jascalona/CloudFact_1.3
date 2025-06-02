@extends('layouts.structure')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('images/x.png') }}">
    <title>CloudFact-Perfil</title>

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
                <div class="row mt-4">
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
                                                <a href="{{ route('new_user_show') }}" class="btn btn-info"><i class='bx bx-plus'></i> Agregar nuevo
                                                    usuario</a>
                                            </div>
                                        </li>

                                        <li class="list-group-item border-0 px-0">
                                            <div class="form-check form-switch ps-0">
                                                <button class="btn btn-info"><i class='bx bx-plus'></i> Importacion Masiva</button>
                                            </div>
                                        </li>


                                    </ul>

                                    <br>


                                </div>
                            </div>
                        </div>


                    </div>

                </div>

                <!--TABLE USERS-->

                <div class="col-md-15 mb-lg-0 mb-4">
                    <div class="card mt-4">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h4 class="mb-3 text-secondary font-weight-bolder opacity-7">Customer's:
                                        <small>Contracts</small>
                                    </h4>
                                </div>



                            </div>
                        </div>


                        <div class="main p-5">

                            <div class="content-table">
                                <table id="myTable" class="table align-items-center mb-0">
                                    <thead>
                                        <tr style="font-size: 13px;">
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                OPTION</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                Usuario/Email</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                Nombre</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                Apellido</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                DPT</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                Cargo</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                Localidad</th>

                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                N# Extension</th>
                                        </tr>
                                    </thead>


                                    <tbody>

                                        @foreach ($users as $row)
                                            <tr style="font-size: 12px;">

                                                <td class="text-center">
                                                    <input type="radio" name="selected_item" value="{{ $row->email }}">
                                                </td>

                                                <td
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    {{ $row->email }}
                                                </td>

                                                <td
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    {{ $row->name }}
                                                </td>
                                                <td
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    {{ $row->surname }}
                                                </td>
                                                <td
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    {{ $row->dpt }}
                                                </td>
                                                <td
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    {{ $row->cargo }}
                                                </td>
                                                <td
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    {{ $row->location }}
                                                </td>

                                                <td
                                                    class="text-uppercase text-secondary text-ce text-xxs font-weight-bolder opacity-">
                                                    {{ $row->n_extension }}
                                                </td>
                                            </tr>
                                        @endforeach

                                        <script>
                                            document.querySelector('form').addEventListener('submit', function (e) {
                                                const selectedItem = document.querySelector('input[name="selected_item"]:checked');
                                                if (!selectedItem) {
                                                    alert('Por favor seleccione al menos un contrato');
                                                }
                                            });
                                        </script>


                                    </tbody>
                                </table>
                            </div>
                        </div>



                    </div>
                </div>
                <!--TABLE USERS->


                </div>
            </div>



        </main>


    @endsection



</body>

</html>