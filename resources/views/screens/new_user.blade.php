@extends('layouts.structure')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/x.png') }}">
    <title>CloudFact-Lead</title>

    <!--STYLES-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/user_manager.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Stepper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/table_responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/card.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/table.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!--STYLES-->

    <!--SCRIPT-->
    <script src="{{ asset('js/query_selector_user.js') }}"></script>
    <script src="{{ asset('js/new_manager.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/cdb.min.js"></script>
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



    <script>
        // Initialization for ES Users
        import { Input, Ripple, initMDB } from "mdb-ui-kit";

        initMDB({ Input, Ripple });
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

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="container mt-5">

                        <!-- Contenido de cada paso -->
                        <div id="step-1-content" class="step-content p-4 border rounded active">
                            <h3>Información de Usuario</h3>
                            <div class="container-formulario">

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row mb-4">

                                        <div class="col-md-6">
                                            <label for="name"
                                                class="col-md- col-form-label text-md-end">{{ __('Nombre') }}</label>

                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus
                                                placeholder="Por ejemplo, Jose">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="col-md-6">
                                            <label for="surname"
                                                class="col-md- col-form-label text-md-end">{{ __('Apellido') }}</label>

                                            <input id="surname" type="text"
                                                class="form-control @error('surname') is-invalid @enderror" name="surname"
                                                value="{{ old('surname') }}" required autocomplete="surname"
                                                placeholder="Por ejemplo, Escalona" place autofocus>

                                            @error('surname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row mb-4">

                                        <div class="col-md-6">
                                            <label for="surname"
                                                class="col-md- col-form-label text-md-end">{{ __(key: 'Cargo') }}</label>

                                            <input id="cargo" type="text"
                                                class="form-control @error('cargo') is-invalid @enderror" name="cargo"
                                                required autocomplete="new-cargo"
                                                placeholder="Por ejemplo, Cordinador de Servicios">

                                            @error('cargo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="surname"
                                                class="col-md- col-form-label text-md-end">{{ __(key: 'Departamento (DPT)') }}</label>

                                            <input id="dpt" type="text"
                                                class="form-control @error('dpt') is-invalid @enderror" name="dpt"
                                                placeholder="Por ejemplo, Servicios Tecnologicos" required
                                                autocomplete="new-dpt">

                                            @error('dpt')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- Email input -->
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3">Email</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="Por ejemplo, jose.escalona@grupoxven.com">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!-- Email input -->

                                    <div class="row mb-4">

                                        <div class="col-md-6">
                                            <label for="surname"
                                                class="col-md- col-form-label text-md-end">{{ __(key: 'Contraseña') }}</label>

                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="new-password"
                                                placeholder="Su contraseña debe tener minimo 8 caracteres">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="password-confirm"
                                                cclass="col-md- col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>

                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password"
                                                placeholder="Confirmar contraseña">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="role">Tipo de Usuario</label>
                                        <select id="role" name="role"
                                            class="form-control @error('role') is-invalid @enderror" required>
                                            <option value="">Seleccione un rol</option>
                                            <option value="lectura">Solo Lectura</option>
                                            <option value="lectura-escritura">Lectura y Escritura</option>
                                        </select>

                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>



                                    <h5 class="mt-6 mb-4"><strong>Informacion de Contacto</strong></h5>
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row mb-4">

                                        <div class="col-md-6">
                                            <label for="surname"
                                                class="col-md- col-form-label text-md-end">{{ __(key: 'Numero Movil') }}</label>

                                            <input id="phone" type="text"
                                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                required autocomplete="new-phone" placeholder="Por ejmplo, 0412458779">

                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="surname"
                                                class="col-md- col-form-label text-md-end">{{ __(key: 'Numero Extension') }}</label>

                                            <input id="n_extension" type="text"
                                                class="form-control @error('n_extension') is-invalid @enderror"
                                                name="n_extension" required autocomplete="new-n_extension"
                                                placeholder="Por ejmplo, 1010">

                                            @error('n_extension')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <!-- Location input -->
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3">Localidad</label>
                                        <input id="location" type="text"
                                            class="form-control @error('location') is-invalid @enderror" name="location"
                                            required autocomplete="location" placeholder="Por ejmplo, Torre Xerox">

                                        @error('location')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Location input -->

                                    <br>
                                    <div class="row mb-0  text-end">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Registrar') }}
                                            </button>
                                        </div>
                                    </div>


                                </form>

                            </div>



                        </div>



                    </div>

                    
                </div>

            </div>


        </main>


    @endsection



</body>

</html>