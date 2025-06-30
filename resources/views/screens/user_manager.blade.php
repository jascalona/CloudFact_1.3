@extends('layouts.structure')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/x.png') }}">
    <title>CloudFact-Perfil</title>

    <!--STYLES-->
    <link rel="stylesheet" href="{{ asset('assets/data_table_moderno.css') }}">

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


   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
        $(document).ready(function () {
            var table = $('#clientesTable').DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ entradas por página",
                    "zeroRecords": "No se encontraron registros",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                    "infoFiltered": "(filtrado de _MAX_ entradas totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "<i class='fas fa-chevron-right'></i>",
                        "previous": "<i class='fas fa-chevron-left'></i>"
                    }
                },
                "pageLength": 10,
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                "dom": '<"top"<"dataTables-header"lf>>rt<"bottom"<"dataTables-footer"ip>><"clear">',
                "initComplete": function () {
                    $('.dataTables_filter').hide();
                }
            });

            // Conectar nuestro buscador personalizado
            $('#customSearch').on('keyup', function () {
                table.search(this.value).draw();
            });


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


                <!--TABLE USERS-->

                <style>
                    :root {
                        --primary-color: #4361ee;
                        --secondary-color: #3f37c9;
                        --accent-color: #4895ef;
                        --light-color: #f8f9fa;
                        --dark-color: rgb(0, 0, 1);
                        --success-color: #4cc9f0;
                        --warning-color: #f72585;
                        --border-radius: 8px;
                        --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    }

                    * {
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                    }

                    body {
                        font-family: 'Roboto', sans-serif;
                        background-color: #f5f7fa;
                        color: var(--dark-color);
                        line-height: 1.6;
                        padding: 0;
                    }

                    .container {
                        width: 100%;
                        max-width: 100%;
                        margin: 0;
                        padding: 20px;
                    }

                    .card {
                        background-color: white;
                        border-radius: var(--border-radius);
                        box-shadow: var(--box-shadow);
                        padding: 25px;
                        margin-bottom: 30px;
                        width: 100%;
                    }

                    .card-header {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        margin-bottom: 20px;
                        padding-bottom: 15px;
                        border-bottom: 1px solid #e9ecef;
                        flex-wrap: wrap;
                        gap: 15px;
                    }

                    .card-header-actions {
                        display: flex;
                        gap: 10px;
                        flex-wrap: wrap;
                    }

                    h2 {
                        color: var(--primary-color);
                        font-size: 20px;
                        font-weight: 500;
                    }

                    .btn {
                        display: inline-flex;
                        align-items: center;
                        padding: 10px 20px;
                        color: white;
                        border: none;
                        border-radius: var(--border-radius);
                        cursor: pointer;
                        font-weight: 500;
                        transition: all 0.3s ease;
                        box-shadow: var(--box-shadow);
                    }

                    .btn-primary {
                        background-color: var(--primary-color);
                    }

                    .btn-primary:hover {
                        background-color: var(--secondary-color);
                        transform: translateY(-2px);
                    }

                    .btn-success {
                        background-color: var(--success-color);
                    }

                    .btn-success:hover {
                        background-color: #3aa8d8;
                        transform: translateY(-2px);
                    }

                    .btn i {
                        margin-right: 8px;
                    }

                    .search-container {
                        position: relative;
                        width: 300px;
                        max-width: 100%;
                    }

                    .search-container input {
                        width: 100%;
                        padding: 10px 15px 10px 40px;
                        border: 1px solid #ddd;
                        border-radius: var(--border-radius);
                        font-size: 14px;
                        transition: all 0.3s;
                    }

                    .search-container input:focus {
                        outline: none;
                        border-color: var(--accent-color);
                        box-shadow: 0 0 0 2px rgba(67, 97, 238, 0.2);
                    }

                    .search-container i {
                        position: absolute;
                        left: 15px;
                        top: 50%;
                        transform: translateY(-50%);
                        color: #6c757d;
                    }

                    .table-container {
                        width: 100%;
                        overflow-x: auto;
                        margin-bottom: 20px;
                    }

                    table {
                        width: 100%;
                        border-collapse: collapse;
                        min-width: 1000px;
                    }

                    th {
                        background-color: var(--primary-color);
                        color: white;
                        text-align: left;
                        padding: 12px 15px;
                        font-weight: 500;
                        position: sticky;
                        top: 0;
                        white-space: nowrap;
                    }

                    th:first-child {
                        border-top-left-radius: var(--border-radius);
                    }

                    th:last-child {
                        border-top-right-radius: var(--border-radius);
                    }

                    td {
                        padding: 12px 15px;
                        border-bottom: 1px solid #e9ecef;
                        white-space: nowrap;
                    }

                    tr:hover {
                        background-color: rgba(67, 97, 238, 0.05);
                    }

                    .option-cell {
                        text-align: center;
                        width: 50px;
                    }

                    .option-radio {
                        appearance: none;
                        width: 18px;
                        height: 18px;
                        border: 2px solid #ddd;
                        border-radius: 50%;
                        outline: none;
                        cursor: pointer;
                        position: relative;
                        transition: all 0.2s;
                    }

                    .option-radio:checked {
                        border-color: var(--primary-color);
                        background-color: var(--primary-color);
                    }

                    .option-radio:checked::after {
                        content: '';
                        position: absolute;
                        width: 8px;
                        height: 8px;
                        background-color: white;
                        border-radius: 50%;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                    }

                    .badge {
                        display: inline-block;
                        padding: 4px 8px;
                        border-radius: 12px;
                        font-size: 12px;
                        font-weight: 500;
                        background-color: var(--success-color);
                        color: white;
                    }

                    /* Estilos personalizados para DataTables */
                    .dataTables_wrapper .dataTables_paginate .paginate_button {
                        min-width: 35px;
                        height: 35px;
                        padding: 0;
                        margin: 0 3px;
                        border-radius: 50% !important;
                        border: 1px solid transparent !important;
                        display: inline-flex !important;
                        align-items: center;
                        justify-content: center;
                        transition: all 0.3s;
                    }

                    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
                        background: rgba(67, 97, 238, 0.1) !important;
                        border: 1px solid var(--primary-color) !important;
                        color: var(--primary-color) !important;
                    }

                    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
                    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
                        background: var(--primary-color) !important;
                        color: white !important;
                        border: 1px solid var(--primary-color) !important;
                    }

                    .dataTables_wrapper .dataTables_length select {
                        padding: 5px 10px;
                        border: 1px solid #ddd;
                        border-radius: var(--border-radius);
                        background-color: white;
                    }

                    .dataTables_wrapper .dataTables_info {
                        color: #6c757d;
                        font-size: 14px;
                        padding-top: 15px !important;
                    }

                    .dataTables_wrapper .dataTables_filter input {
                        padding: 8px 15px;
                        border: 1px solid #ddd;
                        border-radius: var(--border-radius);
                        transition: all 0.3s;
                    }

                    .dataTables_wrapper .dataTables_filter input:focus {
                        outline: none;
                        border-color: var(--accent-color);
                        box-shadow: 0 0 0 2px rgba(67, 97, 238, 0.2);
                    }

                    /* Estilos para el scroll horizontal en dispositivos pequeños */
                    @media (max-width: 1200px) {
                        .table-container {
                            overflow-x: auto;
                            -webkit-overflow-scrolling: touch;
                        }

                        .card-header {
                            flex-direction: column;
                            align-items: flex-start;
                        }

                        .search-container {
                            width: 100%;
                        }

                        .card-header-actions {
                            width: 100%;
                            margin-top: 15px;
                        }
                    }


                    .card-header {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        margin-bottom: 20px;
                        padding-bottom: 15px;
                        border-bottom: 1px solid #e9ecef;
                        flex-wrap: wrap;
                        gap: 15px;
                    }

                    .card-header-title {
                        flex: 1;
                        min-width: 200px;
                    }

                    .card-header-actions {
                        display: flex;
                        align-items: center;
                        gap: 10px;
                        flex-wrap: wrap;
                    }

                    .buttons-group {
                        display: flex;
                        gap: 10px;
                        flex-wrap: wrap;
                    }

                    .search-container {
                        position: relative;
                        min-width: 250px;
                        flex: 1;
                    }

                    /* Ajustes para responsive */
                    @media (max-width: 768px) {
                        .card-header {
                            flex-direction: column;
                            align-items: stretch;
                        }

                        .card-header-actions {
                            flex-direction: column;
                            gap: 10px;
                        }

                        .buttons-group {
                            width: 100%;
                            justify-content: space-between;
                        }

                        .search-container {
                            width: 100%;
                        }
                    }

                    .badge-warning {
                        background: #FFCC00;
                        color: #fff;
                        border-radius: 8px;
                        padding: 1px 6px;
                        font-size: 15px;
                    }
                </style>

                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h2><strong>Listado de Equipos</strong></h2>



                            <div class="card-header-actions">
                                <div class="search-container">
                                    <input type="text" id="customSearch" placeholder="Buscar cliente...">
                                </div>
                            </div>
                        </div>

                        <form method="get" action="">
                            @csrf

                            <a href="{{ route('new_user_show') }}" id="btnNew" class="btn btn-primary">
                                <i class='bx bx-plus'></i> Agregar Usuario
                            </a>

                            <button id="btnAccion" type="submit" value="submit" class="btn btn-success">
                                Editar
                            </button>

                            <div class="table-container">
                                <table id="clientesTable" class="display">
                                    <thead style="background-color: blue;">
                                        <tr>
                                            <th class="option-cell">OPTION</th>
                                            <th>Nombre</th>
                                            <th>Email/Usuario</th>
                                            <th>DPT</th>
                                            <th>Cargo</th>
                                            <th>Localidad</th>
                                            <th>Permisos</th>
                                            <th>Extension</th>
                                            <th>DROP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $row_park)
                                            <tr>
                                                <td class="option-cell"><input type="radio" name="selected_item"
                                                        value="{{ $row_park->id }}" class="option-"></td>
                                                <td>{{ $row_park->name . " " . $row_park->surname }}</td>
                                                <td>{{ $row_park->email }}</td>
                                                <td>{{ $row_park->dpt }}</td>
                                                <td>{{ $row_park->cargo }}</td>
                                                <td>{{ $row_park->location }}</td>
                                                <td>{{ $row_park->role }}</td>
                                                <td><span class="badge">{{ $row_park->n_extension }}</span></td>

                                                <td>
                                                    <a class="btn btn-danger"><i class='bx bxs-trash-alt'></i></a>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
                <!--TABLE USERS->


                </div>
            </div>



        </main>


    @endsection



</body>

</html>