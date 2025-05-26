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
                <div class="col-md-12 mb-lg-0 mb-4">
                    <div class="card mt-4">
                        <div class="card-header pb-0 p-3">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home-tab-pane" type="button" role="tab"
                                        aria-controls="home-tab-pane" aria-selected="true">Vista</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile-tab-pane" type="button" role="tab"
                                        aria-controls="profile-tab-pane" aria-selected="false">Edición</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#contact-tab-pane" type="button" role="tab"
                                        aria-controls="contact-tab-pane" aria-selected="false">Contrato</button>
                                </li>
                            </ul>


                        </div>


                        <!-- Tabs navs -->


                        <div class="tab-content" id="myTabContent">
                            @csrf
                            <!--VISTA-->
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">

                                <div class="card-body p-3">
                                    <div class="row new-contact card-lectura">

                                        <div class="viw-header">
                                            <div class="logo">
                                                <img src="{{ asset('images/cloud-regular-120.png') }}" alt="">
                                                <h5>CloudFact<br>
                                                    <span>Cloud Reading System</span>
                                                </h5>
                                            </div>
                                        </div>

                                        <div class="input-group mb-">
                                            <h2>{{ $cliente->name }}</h2>
                                        </div>
                                        <hr class="text-center">

                                        <div class="col-md-6 mb-md-0 mb-4">

                                            <div class="col-md-">
                                                <div
                                                    class="card card-body lectura card-plain border-radius-lg d-block align-items-center flex-row">
                                                    <!--form auto completado-->


                                                    <div class="input-group mb-4">
                                                        <div class="form-text" id="basic-addon4">RIF</div>
                                                        <input type="text" class="form-"
                                                            placeholder="Por ejemplo, J000000006" aria-label="Username"
                                                            aria-describedby="basic-addon1" readonly
                                                            value="{{ $cliente->rif }}">
                                                    </div>

                                                    <div class="input-group mb-4">
                                                        <div class="form-text" id="basic-addon4">Dirección Fiscal</div>
                                                        <input type="text" class="form-"
                                                            placeholder="Por ejemplo, Av Eugenio Mendoza Edif Torre La Castellana"
                                                            aria-label="Username" aria-describedby="basic-addon1" readonly
                                                            value="{{ $cliente->direct_f }}">
                                                    </div>

                                                    <div class="input-group mb-4">
                                                        <div class="form-text" id="basic-addon4">Ciudad</div>
                                                        <input type="text" class="form-" placeholder="Por ejemplo, Caracas"
                                                            aria-label="Username" aria-describedby="basic-addon1" readonly
                                                            value="{{ $cliente->city }}">
                                                    </div>

                                                    <div class="input-group mb-5">
                                                        <div class="form-text" id="basic-addon4">Estado</div>
                                                        <input type="text" class="form-"
                                                            placeholder="Por ejemplo, Distrito Capital"
                                                            aria-label="Username" aria-describedby="basic-addon1" readonly
                                                            value="{{ $cliente->estado }}">
                                                    </div>

                                                    <!--form auto completado-->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div
                                                class="card card-body lectura mt-1 card-plain border-radius-lg d-block align-items-center flex-row">
                                                <!--form auto completado-->
                                                <div class="form-text" id="basic-addon4">Emision de Contacto</div>
                                                <div class="input-group mb-3">
                                                    <input type="date" class="form-" placeholder="Emision"
                                                        aria-label="Username" aria-describedby="basic-addon1" readonly
                                                        value="{{ $cliente->date_creation }}">
                                                </div>

                                                <div class="input-group mb-4">
                                                    <div class="form-text" id="basic-addon4">Persona de Contacto</div>
                                                    <input type="text" class="form-"
                                                        placeholder="Por ejemplo, Jose Escalona" aria-label="Username"
                                                        aria-describedby="basic-addon1" readonly
                                                        value="{{ $cliente->p_contact }}">
                                                </div>

                                                <div class="input-group mb-4">
                                                    <div class="form-text" id="basic-addon4">Email</div>
                                                    <input type="text" class="form-"
                                                        placeholder="Por ejemplo, example@grupoxven.com"
                                                        aria-label="Username" aria-describedby="basic-addon1" readonly
                                                        value="{{ $cliente->p_email }}">
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="form-text" id="basic-addon4">Movil</div>
                                                    <input type="tel" class="form-" placeholder="Por ejemplo 02123215477"
                                                        aria-label="Username" aria-describedby="basic-addon1" readonly
                                                        value="{{ $cliente->p_movil }}">
                                                </div><br>
                                                <!--form auto completado-->
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <!--VISTA-->

                            <!--EDIT-->
                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                                tabindex="0">
                                <form action="{{ route('VContact.update', $cliente->id) }}" method="post">
                                    @method('put')
                                    @csrf

                                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                        aria-labelledby="home-tab" tabindex="0">

                                        <div class="card-body p-3">
                                            <div class="row new-contact card-lectura">

                                                <div class="viw-header">
                                                    <div class="logo">
                                                        <img src="{{ asset('images/cloud-regular-120.png') }}" alt="">
                                                        <h5>CloudFact<br>
                                                            <span>Cloud Reading System</span>
                                                        </h5>
                                                    </div>
                                                </div>

                                                <div class="input-group mb-">
                                                    <h2>{{ $cliente->name }}</h2>
                                                </div>
                                                <hr class="text-center">

                                                <div class="col-md-6 mb-md-0 mb-4">

                                                    <div class="col-md-">
                                                        <div
                                                            class="card card-body lectura card-plain border-radius-lg d-block align-items-center flex-row">
                                                            <!--form auto completado-->


                                                            <div class="input-group mb-4">
                                                                <div class="form-text" id="basic-addon4">RIF</div>
                                                                <input style="border-bottom: solid #d9d9d9 1px" type="text" class=""
                                                                    placeholder="Por ejemplo, J000000006" name="rif"
                                                                    aria-label="Username" aria-describedby="basic-addon1"
                                                                    value="{{ $cliente->rif }}">
                                                            </div>

                                                            <div class="input-group mb-4">
                                                                <div class="form-text" id="basic-addon4">Dirección Fiscal
                                                                </div>
                                                                <input style="border-bottom: solid #d9d9d9 1px" type="text" class="form-"
                                                                    placeholder="Por ejemplo, Av Eugenio Mendoza Edif Torre La Castellana"
                                                                    aria-label="Username" aria-describedby="basic-addon1"
                                                                    name="direct_f" value="{{ $cliente->direct_f }}">
                                                            </div>

                                                            <div class="input-group mb-4">
                                                                <div class="form-text" id="basic-addon4">Ciudad</div>
                                                                <input style="border-bottom: solid #d9d9d9 1px" type="text" class="form-"
                                                                    placeholder="Por ejemplo, Caracas" aria-label="Username"
                                                                    name="city" aria-describedby="basic-addon1" readonly
                                                                    value="{{ $cliente->city }}">
                                                            </div>

                                                            <div class="input-group mb-5">
                                                                <div class="form-text" id="basic-addon4">Estado</div>
                                                                <input style="border-bottom: solid #d9d9d9 1px" type="text" class="form-"
                                                                    placeholder="Por ejemplo, Distrito Capital"
                                                                    aria-label="Username" aria-describedby="basic-addon1"
                                                                    name="estado" value="{{ $cliente->estado }}">
                                                            </div>

                                                            <!--form auto completado-->
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div
                                                        class="card card-body lectura mt-1 card-plain border-radius-lg d-block align-items-center flex-row">
                                                        <!--form auto completado-->
                                                        <div class="form-text" id="basic-addon4">Emision de Contacto</div>
                                                        <div class="input-group mb-3">
                                                            <input style="border-bottom: solid #d9d9d9 1px" type="date" class="form-" placeholder="Emision"
                                                                aria-label="Username" aria-describedby="basic-addon1"
                                                                name="date_creation" value="{{ $cliente->date_creation }}">
                                                        </div>

                                                        <div class="input-group mb-4">
                                                            <div class="form-text" id="basic-addon4">Persona de Contacto
                                                            </div>
                                                            <input style="border-bottom: solid #d9d9d9 1px" type="text" class="form-"
                                                                placeholder="Por ejemplo, Jose Escalona"
                                                                aria-label="Username" aria-describedby="basic-addon1"
                                                                name="p_contact" value="{{ $cliente->p_contact }}">
                                                        </div>

                                                        <div class="input-group mb-4">
                                                            <div class="form-text" id="basic-addon4">Email</div>
                                                            <input style="border-bottom: solid #d9d9d9 1px" type="text" class="form-"
                                                                placeholder="Por ejemplo, example@grupoxven.com"
                                                                aria-label="Username" aria-describedby="basic-addon1"
                                                                name="p_email" value="{{ $cliente->p_email }}">
                                                        </div>

                                                        <div class="input-group mb-2">
                                                            <div class="form-text" id="basic-addon4">Movil</div>
                                                            <input style="border-bottom: solid #d9d9d9 1px" type="tel" class="form-"
                                                                placeholder="Por ejemplo 02123215477" aria-label="Username"
                                                                name="p_movil" aria-describedby="basic-addon1"
                                                                value="{{ $cliente->p_movil }}">
                                                        </div><br>
                                                        <!--form auto completado-->
                                                    </div>

                                                    <div class="col-0 text-end p-2 mt-3 mb-">
                                                        <button type="submit" value="submit" name="modificar"
                                                            class="btn bg-gradient-dark mb-0" href="javascript:;"><i
                                                                class='bx bxs-save'></i>&nbsp;&nbsp;Guardar</button>
                                                    </div>


                                                </div>

                                            </div>
                                        </div>

                                    </div>



                                </form>
                            </div>
                            <!--EDIT-->

                            <!--contrato-->
                            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                                tabindex="0">


                            </div>
                            <!--contrato-->

                            <!-- Tabs content -->

                        </div>
                    </div>
                    <!--section create bill-->
                </div>

                <br><br>

        </main>

    @endsection

</body>

</html>