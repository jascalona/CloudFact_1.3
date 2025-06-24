@extends('layouts.structure')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/x.png') }}">
    <title>CloudFact-Desinstalation</title>

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
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Desinstalaciones</li>
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
                                            <h6 style="font-weight: 600; font-size: 40px;" class="display-3 text-center">
                                                Detalles del
                                                Equipo</h6>
                                            <br>
                                        </div>

                                        <form action="{{ route('desinstalation.update', $device->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')


                                            <label for="recipient-name" class="col-form-label text-white">Rif</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-transparent border-white p-4"
                                                    value="{{ $device->rif }}" placeholder="RIF" name="rif" required  readonly />
                                            </div>

                                            <label for="recipient-name" class="col-form-label text-white">Serial</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-transparent border-white p-4"
                                                    value="{{ $device->serial }}" placeholder="Serial" name="serial"
                                                    required />
                                            </div>


                                            <label for="recipient-name" class="col-form-label text-white">Modelo</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-transparent border-white p-4"
                                                    placeholder="Modelo" value="{{ $device->model }}" name="model"
                                                    required />
                                            </div>


                                            <label for="recipient-name" class="col-form-label text-white">Estado del
                                                Equipo
                                                (Activo)</label>
                                            <select class="form-select form-select-lg mb-3"
                                                aria-label="Large select example" name="activo" required>
                                                <option selected>{{ $device->activo }}</option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
                                            </select>


                                            <label for="recipient-name" class="col-form-label text-white">Bakup</label>
                                            <select class="form-select form-select-lg mb-3"
                                                aria-label="Large select example" name="backup" required>
                                                <option selected>{{ $device->backup }}</option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
                                            </select>



                                            <label for="recipient-name" class="col-form-label text-white">Localidad</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-transparent border-white p-4"
                                                    placeholder="Localidad" value="{{ $device->location }}" name="location"
                                                    required />
                                            </div>


                                            <label for="recipient-name" class="col-form-label text-white">Ciudad</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-transparent border-white p-4"
                                                    placeholder="Ciudad" value="{{ $device->city }}" name="city" required />
                                            </div>


                                            <label for="recipient-name" class="col-form-label text-white">Estado</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control bg-transparent border-white p-4"
                                                    placeholder="Estado" value="{{ $device->estado }}" name="estado"
                                                    required />
                                            </div>


                                            <div class="mb-3">
                                                <label class="form-label text-white mt-3">Documento PDF</label>
                                                <input type="file" accept="application/pdf" name="doc" class="form-control">

                                                @if($device->doc_path)
                                                    <div class="mt-2">
                                                        <small>Documento actual:</small>
                                                        <a href="{{ Storage::url($device->doc_path) }}" target="_blank"
                                                            class="d-block btn btn-primary w-50">
                                                            Ver PDF actual
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>

                                            <br>

                                            <div>
                                                <button name="edit_park"
                                                    class="btn btn-dark btn-block font-weight-bold py-3" value="submit"
                                                    type="submit">Guardar</button>
                                            </div>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5 park-edit-ii">
                                        <h1 class="text-dark text-center mb-4 mt-5">{{ $device->cliente }}</h1>

                                        <label for="recipient-name" class="col-form-label text-white">Fecha de
                                            Instalación</label>
                                        <div class="form-group">
                                            <input type="date" class="form-control bg-transparent border-dark p-4"
                                                placeholder="Fecha de Instalacion" value="{{ $device->date_desinsta }}"
                                                name="date_desinsta" required />
                                        </div>

                                        <label for="recipient-name" class="col-form-label text-dark">Persona de
                                            Contacto</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control bg-transparent text-dark border-dark p-4"
                                                placeholder="Persona de Contacto" value="{{ $device->p_contact }}"
                                                name="p_contact" required />
                                        </div>


                                        <label for="recipient-name" class="col-form-label text-dark">Email</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control bg-transparent text-dark border-dark p-4"
                                                placeholder="Email de Contacto" value="{{ $device->p_email }}"
                                                name="p_email" required />
                                        </div>


                                        <label for="recipient-name" class="col-form-label text-dark">Movil</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control bg-transparent text-dark border-dark p-4"
                                                placeholder="Numero de Contacto" value="{{ $device->p_movil }}"
                                                name="p_movil" required />
                                        </div>


                                        <label for="recipient-name" class="col-form-label text-dark">Status</label>
                                          <select class="form-select form-select-lg mb-3"
                                                aria-label="Large select example" name="n_port" required>
                                                <option selected>{{ $device->n_port }}</option>
                                                <option value="USB">USB</option>
                                                <option value="IPv4">IPv4</option>
                                            </select>
                                       


                                        <label for="recipient-name" class="col-form-label text-dark">Contador Desinstalacion
                                            B/N</label>
                                        <div class="form-group">
                                            <input type="number"
                                                class="form-control bg-transparent text-dark border-dark p-4"
                                                placeholder="Contador Inicial B/N" value="{{ $device->cont_desin_bn }}"
                                                name="cont_desin_bn" required />
                                        </div>


                                        <label for="recipient-name" class="col-form-label text-dark">Contador Desinstalacion
                                            Color</label>
                                        <div class="form-group">
                                            <input type="number"
                                                class="form-control bg-transparent text-dark border-dark p-4"
                                                placeholder="Contador Inicial Color" value="{{ $device->cont_desin_color }}"
                                                name="cont_desin_color" required />
                                        </div>


                                        <label for="recipient-name" class="col-form-label text-dark">
                                            Observaciones</label>
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control bg-transparent text-dark border-dark p-4"
                                                placeholder="Alguna Observacion relevante (Opcional)" value="{{ $device->obser }}"
                                                name="obser"  />
                                        </div>

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