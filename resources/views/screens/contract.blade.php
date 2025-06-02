@extends('layouts.structure')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/x.png') }}">
    <title>CloudFact-Contrato</title>

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
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Contrato</li>
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


                @if ($message_e = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h5 class="alert-heading"><i class='bx bx-check'></i> Proceso completado con Exito!</h5>
                        {{ $message_e }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                                class='bx bx-x'></i></button>
                    </div>
                @endif

                <!--TABLE ORDEN-->
                <div class="col-md-15 mb-lg-0 mb-4">
                    <div class="card mt-4">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h4 class="mb-3 text-secondary font-weight-bolder opacity-7">Customer's:
                                        <small>Contracts</small>
                                    </h4>
                                </div>

                                <div class="col-6 text-end mb-3">
                                    <a class="btn bg-gradient-dark mb-0" href="{{ route('Alquiler.store') }}"><i
                                            class='bx bx-plus'></i>&nbsp;&nbsp;Nuevo</a>
                                </div>
                            </div>
                        </div>

                        <form method="get" action="{{ route('showAlquiler.edit') }}">
                            @csrf

                            <div style="margin-right: 50px;" class="btns text-end mt-3">
                                <button name="submit-selected" id="submit-selected" class="btn btn-dark"
                                    name="procesarBtn">Editar</button>
                            </div>

                            <div class="main p-5">

                                <div class="content-table">
                                    <table id="myTable" class="table align-items-center mb-0">
                                        <thead>
                                            <tr style="font-size: 13px;">
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Opciones</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    N# Contrato</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Nombre</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Cliente</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    RIF</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Vendedor</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Administrador</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                    Fecha de Inicio</th>
                                            </tr>
                                        </thead>


                                        <tbody>

                                            @foreach ($alquilers as $row)
                                                <tr style="font-size: 12px;">

                                                    <td class="text-center">
                                                        <input type="radio" name="selected_item" value="{{ $row->n_contract }}">
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row->n_contract }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row->name_c }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row->cliente }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row->rif }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row->vendedor }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row->administrador }}
                                                    </td>
                                                    <td
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        {{ $row->date_init_contract }}
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

                        </form>

                    </div>
                </div>
                <!--TABLE ORDEN-->



            </div>

        </main>

    @endsection

</body>

</html>