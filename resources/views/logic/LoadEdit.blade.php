@extends('layouts.structure')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/x.png') }}">
    <title>CloudFact-Park</title>

    <!--STYLES-->
    <link rel="stylesheet" href="{{ asset('assets/edit_park.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/table_responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/card.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/table.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!--STYLES-->

    <!--SCRIPT-->
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
    <!--SCRIPT-->
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

<script>
    /**SCRIPT PARA VALIDAR QUE EL CONTADOR ACTUAL SEA MAYOR QUE EL CONTADOR ANTERIOR CASO B/N*/
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form'); // Selecciona el formulario
        const contActuBnInput = document.getElementById('cont_actu_bn');
        // Asumo que tienes un input con id="cont_ante_bn" para el contador anterior
        const contAnteBnInput = document.getElementById('cont_ante_bn');

        form.addEventListener('submit', function (e) {
            // Convertir los valores a números
            const contActu = parseFloat(contActuBnInput.value);
            const contAnte = parseFloat(contAnteBnInput.value);

            if (contActu < contAnte) {
                e.preventDefault(); // Detener el envío del formulario
                alert('El contador actual B/N no puede ser menor que el contador anterior B/N');
                contActuBnInput.focus(); // Enfocar el campo problemático
            }
        });

        // Validación en tiempo real (opcional)
        if (contActuBnInput && contAnteBnInput) {
            contActuBnInput.addEventListener('change', function () {
                const contActu = parseFloat(contActuBnInput.value);
                const contAnte = parseFloat(contAnteBnInput.value);

                if (contActu < contAnte) {
                    alert('El contador actual B/N no puede ser menor que el contador anterior B/N');
                    contActuBnInput.value = ''; // Limpiar el campo
                    contActuBnInput.focus();
                }
            });
        }
    });

    /**SCRIPT PARA VALIDAR QUE EL CONTADOR ACTUAL SEA MAYOR QUE EL CONTADOR ANTERIOR CASO COLOR*/
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form'); // Selecciona el formulario
        const contActuColorInput = document.getElementById('cont_actu_color');
        const contAnteColorInput = document.getElementById('cont_ante_color');

        // Validación al enviar el formulario
        form.addEventListener('submit', function (e) {
            // Convertir los valores a números
            const contActu = parseFloat(contActuColorInput.value);
            const contAnte = parseFloat(contAnteColorInput.value);

            if (contActu < contAnte) {
                e.preventDefault(); // Detener el envío del formulario
                alert('El contador actual Color no puede ser menor que el contador anterior Color');
                contActuColorInput.focus(); // Enfocar el campo problemático
            }
        });

        // Validación en tiempo real (opcional)
        contActuColorInput.addEventListener('change', function () {
            const contActu = parseFloat(contActuColorInput.value);
            const contAnte = parseFloat(contAnteColorInput.value);

            if (contActu < contAnte) {
                alert('El contador actual Color no puede ser menor que el contador anterior Color');
                contActuColorInput.value = ''; // Limpiar el campo
                contActuColorInput.focus();
            }
        });
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
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Lecturas</li>
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

            <!-- Reservation Start -->
            <div class="container-fluid my-5">
                <div class="container park-edition">
                    <div class="reservation position-relative overlay-top overlay-bottom">
                        <div class="row align-items-center">
                            <div class="col-lg-6 my-5 my-lg-0">
                                <div class="p-5 edit-left">
                                    <div class="mb-4">
                                        <h6 style="font-weight: 800; font-size: 45px;" class="display-3 text-center">
                                            Detalles de Lectura</h6>
                                        <br>
                                    </div>
                                    <form class="mb-5" action="{{ route('Load.update', $editLoad->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @method('put')
                                        @csrf

                                        <label class="text-white" for="">RIF</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control bg-transparent border-white p-4"
                                                value="{{ $editLoad->rif }}" placeholder="RIF" require name="rif" readonly
                                                required />
                                        </div>
                                        <br>

                                        <label class="text-white" for="">Serial</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control bg-transparent border-white p-4"
                                                value="{{ $editLoad->serial }}" placeholder="Serial" name="serial" readonly
                                                required />
                                        </div>
                                        <br>

                                        <label class="text-white" for="">Modelo</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control bg-transparent border-white p-4"
                                                placeholder="Modelo" value="{{ $editLoad->model }}" name="model" readonly
                                                required />
                                        </div>
                                        <br>

                                        <label class="text-white" for="">Localidad</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control bg-transparent border-white p-4"
                                                placeholder="Localidad" value="{{ $editLoad->location }}" name="location"
                                                readonly required />
                                        </div>
                                        <br>

                                        <label class="text-white" for="">Mes</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control bg-transparent border-white p-4"
                                                placeholder="Mes" value="{{ $editLoad->mes }}" name="mes" readonly
                                                required />
                                        </div>
                                        <br>


                                        <label class="text-white" for="">Fecha de Carga</label>
                                        <div class="form-group">
                                            <input type="date" class="form-control bg-transparent border-white p-4"
                                                placeholder="Fecha de Instalacion" value="{{ $editLoad->date }}"
                                                name="date_insta" readonly required />
                                        </div>
                                        <br>


                                        <div class="mb-3">
                                            @can('edit_records')
                                                <label class="form-label text-white mt-3">Documento PDF</label>
                                                <input type="file" accept="application/pdf" name="doc" class="form-control">
                                            @endcan

                                            @if($editLoad->doc_path)
                                                <div class="mt-2">
                                                    <small>Documento actual:</small>
                                                    <a href="{{ Storage::url($editLoad->doc_path) }}" target="_blank"
                                                        class="d-block btn btn-primary w-50">
                                                        Ver PDF actual
                                                    </a>
                                                </div>
                                            @endif
                                        </div>


                                        @can('edit_records')
                                            <div>
                                                <button name="edit_load" class="btn btn-dark btn-block font-weight-bold py-3"
                                                    value="submit" type="submit">Guardar</button>
                                            </div>
                                        @endcan


                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="text- p-5 park-edit-ii">
                                    <h1 class="text-dark mb-4 mt-5">{{ $editLoad->cliente }}</h1>

                                    <div class="form-group">
                                        <label class="text-dark" for="">Contador Anterior B/N</label>
                                        <input type="number" class="form-control bg-transparent border-dark p-4"
                                            placeholder="Contador Anterior B/N" value="{{ $editLoad->cont_ante_bn }}"
                                            name="cont_ante_bn" id="cont_ante_bn" required readonly />
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label class="text-dark" for="">Contador Actual B/N</label>
                                        <input type="number" class="form-control bg-transparent border-dark p-4"
                                            placeholder="Contador Actual B/N" value="{{ $editLoad->cont_actu_bn }}"
                                            name="cont_actu_bn" id="cont_actu_bn" required />
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label class="text-dark" for="">Volumen B/N</label>
                                        <input type="number" class="form-control bg-transparent border-dark p-4"
                                            placeholder="Volumen B/N" id="volum_bn" value="{{ $editLoad->volum_bn }}"
                                            name="volum_bn" required readonly />
                                    </div>
                                    <br>


                                    <div class="form-group">
                                        <label class="text-dark" for="">Contador Anterior Color</label>
                                        <input type="number" class="form-control bg-transparent border-dark p-4"
                                            placeholder="Contador Anterior Color" value="{{ $editLoad->cont_ante_color }}"
                                            name="cont_ante_color" id="cont_ante_color" required readonly />
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label class="text-dark" for="">Contador Actual Color</label>
                                        <input type="number" class="form-control bg-transparent border-dark p-4"
                                            placeholder="Contador Actual Color" value="{{ $editLoad->cont_actu_color }}"
                                            name="cont_actu_color" id="cont_actu_color" required />
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label class="text-dark" for="">Volumen Color</label>
                                        <input type="number" class="form-control bg-transparent border-dark p-4"
                                            placeholder="Volumen Color" value="{{ $editLoad->volum_color }}"
                                            name="volum_color" id="volum_color" required readonly />
                                    </div>
                                    <br>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Reservation End -->


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