@extends('layouts.structure')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/x.png') }}">
    <title>CloudFact-Movimiento</title>

    <!--STYLES-->
    <link rel="stylesheet" href="{{ asset('assets/install.css') }}">
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
    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <!--STYLES-->

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
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Instalaciones</li>
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

            <div class="container-componet-installation">

                <article class="card-install">
                    <div class="item-install-left">
                        <h6>Componente de Carga</h6>
                        <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit voluptate perspiciatis quas
                        </small>
                        <br>

                        <button><a href="">Ver Video</a></button>
                    </div>
                </article>


                <article class="card-install">
                    <div class="item-install-right">
                        <div class="cont-top">
                            <h6>Registro de Instalación</h6>
                            <small>Por favor ingrese los datos del equipo en el siguiente formulario!</small>
                        </div>
                        <!--INPUT GROUP FORM-->

                        <form action="{{ route('install.store') }}" method="POST">
                            @csrf


                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Cliente</label>
                                <select id="customer" class="form-select form-select-lg mb-3"
                                    aria-label="Large select example" name="cliente" required>
                                    <option>Seleccione un Cliente</option>
                                    @foreach ($customers as $select)
                                        <option value="{{ $select->name }}" data-rif="{{ $select->rif }}">{{ $select->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">RIF</label>
                                <input type="text" name="rif" id="rif" class="form-control" placeholder="Campo a llenar"
                                    readonly>

                            </div>

                            <script>
                                $("#customer").change(function () {
                                    //Obtener el valor del atributo data-rif del option Seleccionado 
                                    var rif = $(this).find("option:selected").data("rif");
                                    $("#rif").val(rif);

                                });
                            </script>


                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Serial</label>
                                <input name="serial" type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Serial del Equipo">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Modelo</label>
                                <input name="model" type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Modelo del Equipo">
                            </div>

                            <div class="form-text" id="basic-addon4">Numeros de Contrato</div>
                            <select class="form-select bb form-select-sm mb-3 mt-3" aria-label="Large select example"
                                name="n_contract">
                                <option selected></option>
                                @foreach ($AlquilerContrato as $contract)
                                    <option value="{{ $contract->n_contract }}">{{ $contract->n_contract }}</option>
                                @endforeach
                            </select>

                            <div class="form-text mb-3 mt-5 ">Activo
                            </div>

                            <div style="display: flex; align-items: center;" class="form-check ">
                                <input class="form-check- w-auto" type="radio" name="activo" id="radioDefault1" value="Si"
                                    checked>
                                <label class="form-check-label mt-2" for="radioDefault1">Si</label>
                            </div>
                            <div style="display: flex; align-items: center;" class="form-check">
                                <input class="form-check- w-auto" type="radio" name="activo" id="radioDefault2" value="No">
                                <label class="form-check-label mt-2" for="radioDefault2">No</label>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Direccion Exacta</label>
                                <textarea name="location" class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    placeholder="Ingrese Ubicacion del Equipo"></textarea>
                            </div>


                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Ciudad</label>
                                <input name="city" type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Ciudad donde se Instalo el Equipo">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Estado</label>
                                <input name="estado" type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Estado">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Persona de Contacto</label>
                                <input name="p_contact" type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Persona de Contacto">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email del cliente</label>
                                <input name="p_email" type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Email de contacto">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Numero de Contacto</label>
                                <input name="p_movil" type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Numero de contacto">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Fecha de Instalacion</label>
                                <input name="date_insta" type="date" class="form-control" id="exampleFormControlInput1"
                                    placeholder="">
                            </div>

                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Modalidad de Intalación</label>
                                <select name="n_port" id="status" class="form-select form-select-lg mb-3"
                                    aria-label="Large select example">
                                    <option></option>
                                    <option value="USB">USB</option>
                                    <option value="IPv4">IPv4</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Contador de Instalación B/N</label>
                                <input name="cont_insta_bn" type="number" class="form-control" id="exampleFormControlInput1"
                                    required placeholder="Ingrese Contador sin caracteres especiales Ejemplo: 1050"
                                    value="0">
                            </div>


                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Contador de Instalación
                                    Color</label>
                                <input name="cont_insta_color" type="number" class="form-control"
                                    id="exampleFormControlInput1"
                                    placeholder="Ingrese Contador sin caracteres especiales Ejemplo: 1050" value="0">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Observaciones:</label>
                                <textarea name="obser" class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    placeholder="Agrege un comentario (Opcional) "></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Anexar Carta de Instalación</label>
                                <input name="doc" type="file" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Ingrese Contador sin caracteres especiales Ejemplo: 1050">
                            </div>

                            <div class="btn-carga">
                                <button type="submit" class="btn btn-dark" name="new_device" value="submit">Cargar</button>
                            </div>

                        </form>


                    </div>
                </article>
                <!--INPUT GROUP FORM-->


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