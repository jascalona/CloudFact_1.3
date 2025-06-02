@extends('layouts.structure')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/x.png') }}">
    <title>CloudFact-Alquiler</title>

    <!--STYLES-->
    <link rel="stylesheet" href="{{ asset('assets/table_responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/setting.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/card.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/table.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


    <script src="{{ asset('js/check.js') }}"></script>
    <script src="{{ asset('js/tab.js') }}"></script>
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
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Alquiler</li>
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

            </div>

            @if ($message_e = Session::get('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <h5 class="alert-heading"><i class='bx bx-error-circle'></i> Alerta!</h5>
                    {{ $message_e }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                            class='bx bx-x'></i></button>
                </div>
            @endif

            <!--VISTA-->
            <div class="tab-" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

                <div class="card-body p-3">
                    <div class="row new-contact card-lectura bg-white">

                        <div class="viw-header">
                            <div class="logo">
                                <img src="{{ asset('images/cloud-regular-120.png') }}" alt="">
                                <h5>CloudFact<br>
                                    <span>Cloud Reading System</span>
                                </h5>
                            </div>
                        </div>

                        <form class="mb-5" action="{{ route('edit_alquiler.update', $alquiler->n_contract) }}"
                            method="post">
                            @method('put')
                            @csrf

                            <div class="input-group mt-5 mb-4">
                                <div class="form-text" id="basic-addon4">Nombre del Contrato:</div>
                                <input style="font-size: 38px" type="text" class="form-"
                                    placeholder="Por ejemplo: 056JE22K Xerox Corporation, C.A" aria-label="Username"
                                    aria-describedby="basic-addon1" name="name_c" value="{{ $alquiler->name_c }}" required>
                            </div>

                            <div class="col-12 text-end">
                                <button type="submit" value="submit" name="btn-edit" class="btn bg-gradient-dark mb-0"
                                    href="javascript:;"><i class='bx bxs-save'></i>&nbsp;&nbsp;Guardar</button>
                            </div>


                            <ul class="nav nav-tabs mt-5" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="disabled-tab-0" data-bs-toggle="tab"
                                        href="#disabled-tabpanel-0" role="tab" aria-controls="disabled-tabpanel-0"
                                        aria-selected="true">Datos del Cliente</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="disabled-tab-1" data-bs-toggle="tab" href="#disabled-tabpanel-1"
                                        role="tab" aria-controls="disabled-tabpanel-1" aria-selected="false">Información
                                        General</a>
                                </li>

                            </ul>

                            <div class="tab-content pt-5" id="tab-content">

                                <!--vista 01-->
                                <div class="tab-pane active" id="disabled-tabpanel-0" role="tabpanel"
                                    aria-labelledby="disabled-tab-0">

                                    <h4 class="mb-4"><strong>Datos del Cliente</strong></h4>

                                    <!--vsita 01 se debe ajustar el responsivo-->
                                    <div class="viw-i d-flex">
                                        <div class="col-md-6 mb-md-0 mb-4">
                                            <div class="col-md-">
                                                <div
                                                    class="card card-body lectura card-plain border-radius-lg d-block align-items-center flex-row">
                                                    <!--form auto completado-->

                                                    <div class="alquiler">

                                                        <div class="form-text" id="basic-addon4">Seleccione un Cliente</div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form"
                                                                placeholder="Por ejemplo: Xerox Corporation"
                                                                aria-label="Username" aria-describedby="basic-addon1"
                                                                name="cliente" value="{{ $alquiler->cliente }}" required>
                                                        </div>

                                                        <div class="form-text mt-4" id="basic-addon4">Fecha de Inicio</div>
                                                        <div class="input-group mb-3">
                                                            <input type="date" class="form" placeholder="Emision"
                                                                aria-label="Username" aria-describedby="basic-addon1"
                                                                name="date_init_contract"
                                                                value="{{ $alquiler->date_init_contract }}" required>
                                                        </div>

                                                        <div class="form-text mt-4" id="basic-addon4">Fecha de Final</div>
                                                        <div class="input-group mb-3">
                                                            <input type="date" class="form" placeholder="Emision"
                                                                aria-label="Username" aria-describedby="basic-addon1"
                                                                name="date_close_contract"
                                                                value="{{  $alquiler->date_close_contract}}" required>
                                                        </div>

                                                        <ul class="nav nav-fill nav-tabs w-90 mt-6" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <a class="nav-link active" id="fill-tab-0"
                                                                    data-bs-toggle="tab" href="#fill-tabpanel-0" role="tab"
                                                                    aria-controls="fill-tabpanel-0"
                                                                    aria-selected="true">Precio
                                                                    por
                                                                    click global</a>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <a class="nav-link" id="fill-tab-1" data-bs-toggle="tab"
                                                                    href="#fill-tabpanel-1" role="tab"
                                                                    aria-controls="fill-tabpanel-1"
                                                                    aria-selected="false">Precio
                                                                    por
                                                                    click individual</a>
                                                            </li>

                                                        </ul>
                                                        <div class="tab-content pt-5" id="tab-content">

                                                            <!--Vista 01-->
                                                            <div class="tab-pane active w-100" id="fill-tabpanel-0"
                                                                role="tabpanel" aria-labelledby="fill-tab-0">
                                                                <!--show click Global-->
                                                                <div class="cont" id="show_global">
                                                                    <div class="form-text" id="basic-addon4">Precio global
                                                                        por
                                                                        click
                                                                        B/N USD
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form" placeholder="0.00"
                                                                            aria-label="Username"
                                                                            aria-describedby="basic-addon1"
                                                                            name="P_CLICK_BN_USD"
                                                                            value="{{ $alquiler->P_CLICK_BN_USD }}"
                                                                            required>
                                                                    </div>

                                                                    <div class="form-text" id="basic-addon4">Precio global
                                                                        por
                                                                        click
                                                                        Color USD
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form" placeholder="0.00"
                                                                            aria-label="Username"
                                                                            aria-describedby="basic-addon1"
                                                                            name="P_CLICK_COLOR_USD"
                                                                            value="{{ $alquiler->P_CLICK_COLOR_USD }}"
                                                                            required>
                                                                    </div>

                                                                    <div class="form-text" id="basic-addon4">Copiado Minimo
                                                                        Contratado B/N</div>
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form" placeholder="2500"
                                                                            aria-label="Username"
                                                                            aria-describedby="basic-addon1"
                                                                            name="copi_minimo_bn"
                                                                            value="{{ $alquiler->copi_minimo_bn }}"
                                                                            required>
                                                                    </div>

                                                                    <div class="form-text" id="basic-addon4">Copiado Minimo
                                                                        Contratado Color</div>
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form" placeholder="2500"
                                                                            aria-label="Username"
                                                                            aria-describedby="basic-addon1"
                                                                            name="copi_minimo_color"
                                                                            value="{{ $alquiler->copi_minimo_color }}"
                                                                            required>
                                                                    </div>

                                                                    <div class="form-text" id="basic-addon4">Precio Cargo
                                                                        Minimo
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form"
                                                                            placeholder="1.000,84" aria-label="Username"
                                                                            aria-describedby="basic-addon1" name="PCM"
                                                                            value="{{ $alquiler->PCM }}" required>
                                                                    </div>

                                                                    <div class="form-text" id="basic-addon4">Label</div>
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form" placeholder="450,00"
                                                                            aria-label="Username"
                                                                            aria-describedby="basic-addon1" name="label"
                                                                            value="{{ $alquiler->label }}" required>
                                                                    </div>

                                                                </div>
                                                                <!--show click Global-->
                                                            </div>

                                                            <div class="tab-pane" id="fill-tabpanel-1" role="tabpanel"
                                                                aria-labelledby="fill-tab-1">Definir con el cliente</div>
                                                        </div>

                                                    </div>

                                                    <!--form auto completado-->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div
                                                class="card card-body lectura card-plain border-radius-lg d-block align-items-center flex-row">
                                                <!--form auto completado-->

                                                <div class="alquiler">

                                                    <div class="input-group mb-4">
                                                        <div class="form-text" id="basic-addon4">RIF - Cliente</div>
                                                        <input type="text" class="form-" name="rif"
                                                            placeholder="Por ejemplo, J000000006" id="rif"
                                                            aria-label="Username" aria-describedby="basic-addon1" readonly
                                                            value="{{ $alquiler->rif }}">
                                                    </div>

                                                    <div class="form-text mt-4" id="basic-addon4">Numero de Contrado
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form" placeholder="Por ejemplo: 056JE22K"
                                                            aria-label="Username" aria-describedby="basic-addon1"
                                                            name="n_contract" value="{{ $alquiler->n_contract }}" required>
                                                    </div>


                                                    <div class="form-text mt-4" id="basic-addon4">Duracion del Contrato
                                                        (Numero)
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="number" class="form" placeholder="Por ejemplo: 12"
                                                            aria-label="Username" aria-describedby="basic-addon1"
                                                            name="d_contract" value="{{ $alquiler->d_contract }}" required>
                                                    </div>

                                                    <div class="form-text mt-4" id="basic-addon4">Cantidad de equipos
                                                        contratados (Numero)
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="number" class="form" placeholder="Por ejemplo: 35"
                                                            aria-label="Username" aria-describedby="basic-addon1"
                                                            name="cant_device" value="{{ $alquiler->cant_device }}"
                                                            required>
                                                    </div>

                                                    <div class="form-text mt-4" id="basic-addon4">Tipo de Contrato</div>
                                                    <select class="form-select bb form-select-sm mb- mt-3"
                                                        aria-label="Large select example" name="tipo_c" required>
                                                        <option value="{{ $alquiler->tipo_c }}" selected>
                                                            {{ $alquiler->tipo_c }}
                                                        </option>
                                                        <option value="FSMA">FSMA</option>
                                                        <option value="Renta - TCO">Renta - TCO</option>
                                                        <option value="Renta - Plataforma">Renta - Plataforma</option>
                                                        <option value="Copiado minimo">Copiado minimo</option>
                                                        <option value="SMA">SMA</option>
                                                        <option value="Mixto (FSMA + Renta)">Mixto (FSMA + Renta)</option>
                                                    </select>

                                                    <div class="form-text mt-4" id="basic-addon4">Vendedor Eje.</div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form"
                                                            placeholder="Por ejemplo: Jose Escalona" aria-label="Username"
                                                            aria-describedby="basic-addon1" name="vendedor" value="{{ $alquiler->vendedor }}"
                                                            required>
                                                    </div>

                                                    <div class="form-text mt-4" id="basic-addon4">Administrador</div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form"
                                                            placeholder="Por ejemplo: Jose Escalona" aria-label="Username"
                                                            aria-describedby="basic-addon1" name="administrador_01" value="{{ $alquiler->administrador_01 }}"
                                                            required>
                                                    </div>


                                                </div>
                                                <!--form auto completado-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--vsita 01 se debe ajustar el responsivo-->

                                </div>
                                <!--vista 01-->


                                <!--vista 02-->
                                <div class="tab-pane" id="disabled-tabpanel-1" role="tabpanel"
                                    aria-labelledby="disabled-tab-1">
                                    <h4 class="mb-4"><strong>Información General</strong></h4>
                                    <!--vsita 012se debe ajustar el responsivo-->
                                    <div class="viw-i d-flex">
                                        <div class="col-md-6 mb-md-0 mb-4">
                                            <div class="col-md-">
                                                <div
                                                    class="card card-body lectura card-plain border-radius-lg d-block align-items-center flex-row">
                                                    <!--form auto completado-->

                                                    <div class="form-text mt-2" id="basic-addon4">Información Monetarea
                                                    </div>
                                                    <select class="form-select bb form-select-sm mb-4 mt-3 w-50"
                                                        aria-label="Large select example" name="moneda" required>
                                                        <option value="{{ $alquiler->moneda }}" selected>
                                                            {{ $alquiler->moneda }}
                                                        </option>
                                                        <option value="Bolivares">Bolivares</option>
                                                        <option value="Dolares">Dolares</option>
                                                    </select>

                                                    <div class="alquiler">

                                                        <div class="form-text mt-4" id="basic-addon4">Tipo de Cambio</div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form"
                                                                placeholder="Por ejemplo: Paralelo" aria-label="Username"
                                                                aria-describedby="basic-addon1"
                                                                value="{{ $alquiler->tipo_cambio }}" name="tipo_cambio"
                                                                required>
                                                        </div>

                                                        <div class="form-text mt-4" id="basic-addon4">Razones de Consorcio
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form"
                                                                placeholder="Razones de Consorcio" aria-label="Username"
                                                                aria-describedby="basic-addon1" name="razones_consorcio"
                                                                value="{{ $alquiler->razones_consorcio }}">
                                                        </div>

                                                        <div class="form-text mb-3 mt-5  id=">Info All In
                                                        </div>
                                                        <div class="grop">
                                                            <div class="group-check">
                                                                <label for="Equipos">Equipos</label>
                                                                <input type="checkbox" value="Equipos" name="info_all_i"
                                                                    id="Equipos">
                                                            </div>

                                                            <div class="group-check">
                                                                <label for="Suministros">Suministros</label>
                                                                <input type="checkbox" value="Suministros"
                                                                    name="info_all_ii" id="Suministros">
                                                            </div>

                                                            <div class="group-check">
                                                                <label for="Partes">Partes</label>
                                                                <input type="checkbox" value="Partes" name="info_all_iii"
                                                                    id="Partes">
                                                            </div>

                                                            <div class="group-check">
                                                                <label for="Servicios">Servicios</label>
                                                                <input type="checkbox" value="Servicios" name="info_all_iv"
                                                                    id="Servicios">
                                                            </div>


                                                            <div class="group-check">
                                                                <label for="Papel">Papel</label>
                                                                <input type="checkbox" value="Papel" name="info_all_v"
                                                                    id="Papel">
                                                            </div>
                                                        </div>

                                                        <hr class="w-90">


                                                        <h4 class="mt-5 mb-4"><strong>Labores</strong></h4>
                                                        <div class="grop">
                                                            <div class="group-check">
                                                                <label for="admin">Administrador</label>
                                                                <input type="checkbox" value="Administrador" id="admin">
                                                            </div>

                                                            <div class="group-check">
                                                                <label for="asesor">Asesor Tecnológico</label>
                                                                <input type="checkbox" value="asesor" id="asesor">
                                                            </div>

                                                            <div class="group-check">
                                                                <label for="operador">Operador</label>
                                                                <input type="checkbox" value="Operador" id="operador">
                                                            </div>

                                                            <div class="group-check">
                                                                <label for="analista">Analista</label>
                                                                <input type="checkbox" value="Analista" id="analista">
                                                            </div>


                                                            <div class="group-check">
                                                                <label for="supervisor">Supervisor</label>
                                                                <input type="checkbox" value="Supervisor" id="supervisor">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <!--form auto completado-->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div
                                                class="card card-body lectura card-plain border-radius-lg d-block align-items-center flex-row">
                                                <!--form auto completado-->

                                                <div class="alquiler">

                                                    <h4 class="mt-"><strong>Indexaciones</strong></h4>
                                                    <div class="input-group mb-4">
                                                        <div class="form-text" id="basic-addon4">Indexacion Mutuo Acuerdo
                                                        </div>
                                                        <input type="text" class="form-" name="indexacion_mutuo"
                                                            placeholder="Dedinir con el cliente" aria-label="Username"
                                                            aria-describedby="basic-addon1"
                                                            value="{{ $alquiler->indexacion_mutuo }}">
                                                    </div>

                                                    <div class="form-text" id="basic-addon4">Indexacion Porcentaje
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="number" class="form" placeholder="%"
                                                            value="{{ $alquiler->indexacion_porcentaje }}"
                                                            aria-label="Username" name="indexacion_porcentaje"
                                                            aria-describedby="basic-addon1">
                                                    </div>


                                                    <div class="form-text" id="basic-addon4">Indexacion Frecuencia</div>
                                                    <select class="form-select bb form-select-sm mb-3 mt-3"
                                                        aria-label="Large select example" name="indexacion_frecuencia">
                                                        <option value="{{ $alquiler->indexacion_frecuencia }}" selected>
                                                            {{ $alquiler->indexacion_frecuencia }}
                                                        </option>
                                                        <option value="Mensual">Mensual</option>
                                                        <option value="Trimestre">Trimestre</option>
                                                        <option value="Semestre">Semestre</option>
                                                        <option value="Anual">Anual</option>
                                                    </select>


                                                    <!--inputs show-->
                                                    <div id="InputAdministrador" class="input-hidden mt-5">
                                                        <div class="form-text mt-4">Candidad
                                                            Administrador (Opcional)</div>
                                                        <div class="input-group mb-3">
                                                            <input type="Number" class="form"
                                                                placeholder="Unidades Administrador" aria-label="Username"
                                                                aria-describedby="basic-addon1" name="n_admin" value="1">
                                                        </div>
                                                    </div>
                                                    <!--inputs show-->

                                                    <!--inputs show-->
                                                    <div id="InputAsesor" class="input-hidden">
                                                        <div class="form-text mt-4">Candidad Asesor (Opcional)</div>
                                                        <div class="input-group mb-3">
                                                            <input type="Number" class="form"
                                                                placeholder="Unidades Administrador" aria-label="Username"
                                                                aria-describedby="basic-addon1" name="n_asesor" value="0">
                                                        </div>
                                                    </div>
                                                    <!--inputs show-->

                                                    <!--inputs show-->
                                                    <div id="InputOperador" class="input-hidden">
                                                        <div class="form-text mt-4">Candidad Operador (Opcional)</div>
                                                        <div class="input-group mb-3">
                                                            <input type="Number" class="form"
                                                                placeholder="Unidades Operador" aria-label="Username"
                                                                aria-describedby="basic-addon1" name="n_operador" value="0">
                                                        </div>
                                                    </div>
                                                    <!--inputs show-->


                                                    <!--inputs show-->
                                                    <div id="InputAnalista" class="input-hidden">
                                                        <div class="form-text mt-4">Candidad Analista (Opcional)</div>
                                                        <div class="input-group mb-3">
                                                            <input type="Number" class="form"
                                                                placeholder="Unidades Analista" aria-label="Username"
                                                                aria-describedby="basic-addon1" name="n_analista" value="0">
                                                        </div>
                                                    </div>
                                                    <!--inputs show-->

                                                    <!--inputs show-->
                                                    <div id="InputSupervisor" class="input-hidden">
                                                        <div class="form-text mt-4">Candidad Supervisor (Opcional)</div>
                                                        <div class="input-group mb-3">
                                                            <input type="Number" class="form"
                                                                placeholder="Unidades Supervisor" aria-label="Username"
                                                                aria-describedby="basic-addon1" name="n_supervisor"
                                                                value="0">
                                                        </div>
                                                    </div>
                                                    <!--inputs show-->


                                                    <!--form auto completado-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--vsita 01 se debe ajustar el responsivo-->
                                    </div>
                                </div>
                                <!--vista 02-->





                                <div class="tab-pane" id="disabled-tabpanel-2" role="tabpanel"
                                    aria-labelledby="disabled-tab-2">
                                    Tab 3 dfd</div>

                            </div>


                        </form>


                    </div>
                </div>

            </div>
            <!--VISTA-->



        </main>

    @endsection

</body>

</html>