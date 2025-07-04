@extends('layouts.structure')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/x.png') }}">
    <title>CloudFact-Contact</title>

    <!--STYLES-->
    <link rel="stylesheet" href="{{ asset('assets/data_table_moderno.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/setting.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/card.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/table.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


    <script>
        $(document).ready(function () {
            var table = $('#employeeTable').DataTable({
                "language": {
                    "search": "",
                    "searchPlaceholder": "Search employees...",
                    "lengthMenu": "Show _MENU_ entries",
                    "zeroRecords": "No matching records found",
                    "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                    "infoEmpty": "Showing 0 to 0 of 0 entries",
                    "infoFiltered": "(filtered from _MAX_ total entries)",
                    "paginate": {
                        "first": "First",
                        "last": "Last",
                        "next": "Next",
                        "previous": "Previous"
                    }
                },
                "dom": 't',
                "responsive": true,
                "pageLength": 10,
                "initComplete": function () {
                    $('.dataTables_filter input').addClass('form-control');
                }
            });

            // Integración personalizada del buscador
            $('#searchTable').on('keyup', function () {
                table.search(this.value).draw();
            });

            // Integración personalizada del selector de cantidad
            $('.dataTables_length select').on('change', function () {
                table.page.len(this.value).draw();
            });

            // Habilitar/deshabilitar botón de editar según selección
            $('input[name="selected_item"]').on('change', function () {
                $('#btnEdit').prop('disabled', !$(this).is(':checked'));
            });

            // Manejar clic en botón Nuevo
            /*
            $('#btnNew').click(function () {
                // Aquí tu lógica para crear nuevo registro
                alert('Nuevo registro');
                // window.location.href = '/customers/create'; // Ejemplo de redirección
            });
            */

            // Manejar clic en botón Editar
            /*
            $('#btnEdit').click(function () {
                var selectedId = $('input[name="selected_item"]:checked').val();
                if (selectedId) {
                    // Aquí tu lógica para editar
                    alert('Editar registro ID: ' + selectedId);
                    // window.location.href = '/customers/' + selectedId + '/edit'; // Ejemplo de redirección
                }
            });
            */
        });
    </script>

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
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Contacto</li>
                        </ol>
                    </nav>

                    <button type="button" class="btn-comunidad" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i style="font-size: 25px" class='bx bx-group'></i>
                    </button>

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

            @if(session('alert_message'))
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        alert('{{ session('alert_message') }}');
                    });
                </script>
            @endif


            <div class="main-container">
                <div class="dataTables_wrapper">
                    <div class="header">
                        <h1 class="title">Libreta de Clientes</h1>
                        <div class="header-actions">
                            <div class="dataTables_filter">
                                <label for="searchTable">
                                    <i class="fas fa-search"></i>
                                    <input type="search" id="searchTable" placeholder="Search employees...">
                                </label>
                            </div>

                        </div>
                    </div>


                    <form method="get" action="{{ route('items.form') }}">
                        @csrf
                        <div class="action-buttons">


                            @can ('create_records')
                                <a href="{{ route('new_contact') }}" id="btnNew" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Nuevo
                                </a>
                            @endcan

                            <button type="submit" id="btnEdit" class="btn btn-secondary">
                                <i class="fas fa-edit"></i> Ver
                            </button>
                        </div>

                        <div class="table-container">
                            <table id="employeeTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Option</th>
                                        <th>Cliente</th>
                                        <th>Rif</th>
                                        <th>Ciudad</th>
                                        <th>Estado</th>
                                        <th>Fecha de Creacion</th>
                                        <th>Observacion</th>
                                        <th>Direccion Fiscal</th>
                                        @can('delete_records')
                                            <th></th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $row_customer)
                                        <tr>
                                            <td>
                                                <input class="text-center" type="radio" name="selected_item"
                                                    value="{{ $row_customer->id }}">
                                            </td>
                                            <td>{{ $row_customer->name }}</td>
                                            <td>{{ $row_customer->rif }}</td>
                                            <td>{{ $row_customer->city }}</td>
                                            <td>{{ $row_customer->estado }}</td>
                                            <td>{{ $row_customer->date_creation }}</td>
                                            <td><span class="badge badge-success">{{ $row_customer->obser }}</span></td>
                                            <td>{{ $row_customer->direct_f }}</td>

                                            @can('delete_records')
                                                <td>
                                                    <form action="{{ route('contact.destroy', $row_customer->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('¿Estás seguro de eliminar este registro?')">
                                                            Eliminar
                                                        </button>
                                                    </form>
                                                </td>
                                            @endcan

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </form>

                </div>

                <div class="dataTables-bottom">
                    <div class="dataTables_length">
                        <label>
                            Show
                            <select>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> entries
                        </label>
                    </div>

                    <div class="dataTables_paginate"></div>
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