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

                            
                            @can('edit_records')
                            <div class="col-12 text-end">
                                <button type="submit" value="submit" name="btn-edit" class="btn bg-gradient-dark mb-0"
                                    href="javascript:;"><i class='bx bxs-save'></i>&nbsp;&nbsp;Guardar</button>
                            </div>
                            @endcan



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
                                                    <select class="form-select bb form-select-sm mb-5 mt-3 w-90"
                                                        aria-label="Large select example" required id="customer"
                                                        name="cliente">
                                                        
                                                        <option value="{{ $alquiler->cliente }}">{{ $alquiler->cliente }}</option>

                                                        @foreach ($customers as $select)
                                                            <option value="{{ $select->name }}" data-rif="{{ $select->rif }}"
                                                                data-location="{{ $select->direct_f }}"
                                                                data-city="{{ $select->city }}">
                                                                {{ $select->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    <script>
                                                        $("#customer").change(function () {
                                                            var selectedOption = $(this).find("option:selected");
                                                            // Obtener todos los datos del option seleccionado
                                                            var rif = selectedOption.data("rif");
                                                            var location = selectedOption.data("location");
                                                            var city = selectedOption.data("city");

                                                            // Actualizar todos los campos
                                                            $("#rif").val(rif);
                                                            $("#direct_f").val(location);
                                                            $("#city").val(city);
                                                        });
                                                    </script>

                                                       <div class="form-text mt-4">Fecha de Inicio</div>
                                                        <div class="input-group mb-3">
                                                            <input type="date" class="form" id="date_init_contract"
                                                                name="date_init_contract" required value="{{ $alquiler->date_init_contract }}"
                                                                onchange="calculateEndDate()">
                                                        </div>

                                                        <div class="form-text mt-4">Fecha de Final</div>
                                                        <div class="input-group mb-3">
                                                            <input type="date" class="form" id="date_close_contract"
                                                                name="date_close_contract" required value="{{ $alquiler->date_close_contract }}">
                                                            <!-- readonly para que no se edite manualmente -->
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
                                                                        <input type="text" class="form float-input"
                                                                            placeholder="0.00" aria-label="Username"
                                                                            aria-describedby="basic-addon1" value="{{ $alquiler->P_CLICK_BN_USD }}"
                                                                            name="P_CLICK_BN_USD" pattern="^\d*\.?\d+$"
                                                                            title="Solo números y punto decimal (no comas)"
                                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                    </div>

                                                                    <div class="form-text" id="basic-addon4">Precio global
                                                                        por
                                                                        click
                                                                        Color USD
                                                                    </div>
                                                                   <div class="input-group mb-3">
                                                                        <input type="text" class="form float-input"
                                                                            placeholder="0.00" aria-label="Username"
                                                                            aria-describedby="basic-addon1" value="{{ $alquiler->P_CLICK_COLOR_USD }}"
                                                                            name="P_CLICK_COLOR_USD" required
                                                                            pattern="^\d*\.?\d+$"
                                                                            title="Solo números y punto decimal (no comas)"
                                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                    </div>

                                                                    <div class="form-text" id="basic-addon4">Copiado Minimo
                                                                        Contratado B/N</div>
                                                                     <div class="input-group mb-3">
                                                                        <input type="text" class="form float-input"
                                                                            placeholder="2500" aria-label="Username"
                                                                            aria-describedby="basic-addon1" value="{{ $alquiler->copi_minimo_bn }}"
                                                                            name="copi_minimo_bn" required
                                                                            pattern="^\d*\.?\d+$"
                                                                            title="Solo números y punto decimal (no comas)"
                                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                    </div>

                                                                    <div class="form-text" id="basic-addon4">Copiado Minimo
                                                                        Contratado Color</div>
                                                                   <div class="input-group mb-3">
                                                                        <input type="text" class="form float-input"
                                                                            placeholder="2500" aria-label="Username"
                                                                            aria-describedby="basic-addon1" value="{{ $alquiler->copi_minimo_color }}"
                                                                            name="copi_minimo_color" required
                                                                            pattern="^\d*\.?\d+$"
                                                                            title="Solo números y punto decimal (no comas)"
                                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                    </div>

                                                                    <div class="form-text" id="basic-addon4">Precio Cargo
                                                                        Minimo
                                                                    </div>
                                                                     <div class="input-group mb-3">
                                                                        <input type="text" class="form float-input"
                                                                            placeholder="1000.84" aria-label="Username"
                                                                            aria-describedby="basic-addon1" value="{{ $alquiler->PCM }}"
                                                                            name="PCM" required pattern="^\d*\.?\d+$"
                                                                            title="Solo números y punto decimal (no comas)"
                                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                    </div>

                                                                    <div class="form-text" id="basic-addon4">Label</div>
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form float-input"
                                                                            placeholder="450.00" aria-label="Username"
                                                                            aria-describedby="basic-addon1" value="{{ $alquiler->label }}"
                                                                            name="label" required pattern="^\d*\.?\d+$"
                                                                            title="Solo números y punto decimal (no comas)"
                                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                    </div>

                                                                </div>
                                                                <!--show click Global-->
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

                                                   <div class="input-group mb-4">
                                                        <div class="form-text" id="basic-addon4">RIF - Cliente</div>
                                                        <input type="text" class="form-"
                                                            placeholder="Por ejemplo, J000000006" id="rif"
                                                            aria-label="Username" aria-describedby="basic-addon1" readonly
                                                            value="{{ $alquiler->rif }}" name="rif">
                                                    </div>

                                                    <div class="input-group mb-4">
                                                        <div class="form-text" id="basic-addon4">Direccion Fiscal</div>
                                                        <input type="text" class="form-"
                                                            placeholder="Por ejemplo, Guiatire, Carretera Nacional"
                                                            id="direct_f" aria-label="Username"
                                                            aria-describedby="basic-addon1" readonly value="{{ $alquiler->direct_f }}"
                                                            name="direct_f">
                                                    </div>

                                                    <div class="input-group mb-4">
                                                        <div class="form-text" id="basic-addon4">Ciudad Destino</div>
                                                        <input type="text" class="form-" placeholder="Por ejemplo, Guiatire"
                                                            id="city" aria-label="Username" aria-describedby="basic-addon1"
                                                            readonly value="{{ $alquiler->city }}" name="city">
                                                    </div>

                                                    <div class="form-text mt-4" id="basic-addon4">Numero de Contrado
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form" placeholder="Por ejemplo: 056JE22K"
                                                            aria-label="Username" aria-describedby="basic-addon1"
                                                            name="n_contract" value="{{ $alquiler->n_contract }}" readonly required>
                                                    </div>


                                                    <div class="form-text">Duración del Contrato Expresado en meses (Numero)</div>
                                                    <div class="input-group mb-3">
                                                        <input type="number" class="form" id="d_contract" name="d_contract"
                                                            min="1" value="{{ $alquiler->d_contract }}" required onchange="calculateEndDate()">
                                                    </div>

                                                    <script>
                                                        function calculateEndDate() {
                                                            const startDateInput = document.getElementById('date_init_contract');
                                                            const monthsInput = document.getElementById('d_contract');
                                                            const endDateInput = document.getElementById('date_close_contract');

                                                            // Solo calcular si ambos campos tienen valor y la duración es mayor a 0
                                                            if (startDateInput.value && monthsInput.value && parseInt(monthsInput.value) > 0) {
                                                                const startDate = new Date(startDateInput.value);
                                                                const months = parseInt(monthsInput.value);

                                                                // Obtenemos el día original para mantenerlo igual
                                                                const originalDay = startDate.getDate();

                                                                // Calculamos la nueva fecha sumando los meses
                                                                const endDate = new Date(startDate);
                                                                endDate.setMonth(endDate.getMonth() + months);

                                                                // Ajustamos el día en caso de que el mes resultante no tenga ese día (ej. 31 en febrero)
                                                                const lastDayOfMonth = new Date(endDate.getFullYear(), endDate.getMonth() + 1, 0).getDate();
                                                                const adjustedDay = Math.min(originalDay, lastDayOfMonth);

                                                                // Establecemos el día ajustado (sin alterar el mes o año)
                                                                endDate.setDate(adjustedDay);

                                                                // Formateamos la fecha a YYYY-MM-DD (formato de input date)
                                                                const year = endDate.getFullYear();
                                                                const month = String(endDate.getMonth() + 1).padStart(2, '0');
                                                                const day = String(endDate.getDate()).padStart(2, '0');

                                                                endDateInput.value = `${year}-${month}-${day}`;
                                                            } else {
                                                                endDateInput.value = ""; // Limpiar si no hay duración definida
                                                            }
                                                        }
                                                    </script>

                                                    <div class="form-text mt-4" id="basic-addon4">Cantidad de equipos
                                                        contratados (Numero)
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="number" class="form" placeholder="Por ejemplo: 35"
                                                            aria-label="Username" aria-describedby="basic-addon1"
                                                            name="cant_device" value="{{ $alquiler->cant_device }}"
                                                            required>
                                                    </div>

                                                    <div class="form-text mt-7" id="basic-addon4">Tipo de Contrato</div>
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

                                                        <div class="form-text mb-3 mt-5  id=">Info All In
                                                        </div>

                                                        <div class="grop">
                                                            <div class="group-check">
                                                                <label for="Equipos">Equipos</label>
                                                                <input type="checkbox" value="Equipos" name="info_all_i"
                                                                    id="Equipos" {{ $alquiler->info_all_i ? 'checked' : '' }}>
                                                            </div>

                                                            <div class="group-check">
                                                                <label for="Suministros">Suministros</label>
                                                                <input type="checkbox" value="Suministros"
                                                                    name="info_all_ii" id="Suministros" {{ $alquiler->info_all_ii ? 'checked' : '' }}>
                                                            </div>

                                                            <div class="group-check">
                                                                <label for="Partes">Partes</label>
                                                                <input type="checkbox" value="Partes" 
                                                                    name="info_all_iii" id="Partes" {{ $alquiler->info_all_iii ? 'checked' : '' }}>
                                                            </div>

                                                            <div class="group-check">
                                                                <label for="Servicios">Servicios</label>
                                                                <input type="checkbox" value="Servicios" 
                                                                    name="info_all_iv" id="Servicios" {{ $alquiler->info_all_iv ? 'checked' : '' }}>
                                                            </div>

                                                            <div class="group-check">
                                                                <label for="Papel">Papel</label>
                                                                <input type="checkbox" value="Papel" 
                                                                    name="info_all_v" id="Papel" {{ $alquiler->info_all_v ? 'checked' : '' }}>
                                                            </div>
                                                        </div>
                                                        <hr class="w-90">


                                                        

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