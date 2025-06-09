<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CloudFact - Documentation</title>

    <!-- Fonts -->
    <link rel="icon" href="{{ asset('images/x.png') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('assets/documentation.css') }}">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/nucleo-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">

    <!-- Scripts -->
</head>

<body style="background-color: rgba(208, 218, 237, 0.296);">


    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand px-4 py-3 m-0"
                href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
                <img src="{{ asset('images/cloud-regular-24.png') }}" class="navbar-brand-img" width="26" height="26"
                    alt="main_logo">
                <span class="ms-1 text-sm text-dark">CloudFact</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">

                <li class="nav-item mb-3">
                    <a class="nav-link  bg-gradient-dark active text-dark" href="{{ route('.dashboard') }}">
                        <i class='bx bxs-hand-up'></i>
                        <span class="nav-link-text ms-1">Empezar</span>
                    </a>

                    <ul class="links-item">
                        <li class="sub-links"><a href=""><strong>Descripción general</strong></a></li>
                        <li class="sub-links"><a href="">Inicio Rapido</a></li>
                        <li class="sub-links"><a href="">Estructura de rutas</a></li>
                        <li class="sub-links"><a href="">Licencia y Construccion</a></li>
                    </ul>

                </li>

                <hr>

                <li class="nav-item mb-3">
                    <a class="nav-link text-dark" href="{{ route('.lead') }}">
                        <i class='bx bxs-folder-open'></i>
                        <span class="nav-link-text ms-1">Conceptos y arquitectura</span>
                    </a>

                    <ul class="links-item mt-3">
                        <li class="sub-links"><a href=""><strong>Inicio</strong></a></li>
                        <li class="sub-links"><a href="">Sesiones</a></li>
                    </ul>

                    <ul class="links-item mt-3">
                        <li class="sub-links"><a href=""><strong>Panel</strong></a></li>
                        <li class="sub-links"><a href="">Dashboard (Resumen)</a></li>
                    </ul>

                    <ul class="links-item mt-3">
                        <li class="sub-links"><a href=""><strong>Lecturas clientes</strong></a></li>
                        <li class="sub-links"><a href="">Lecturas generales</a></li>
                        <li class="sub-links"><a href="">Carga masiva</a></li>
                        <li class="sub-links"><a href="">Carga manual</a></li>
                        <li class="sub-links"><a href="">Edición de lecturas</a></li>
                    </ul>


                    <ul class="links-item mt-3">
                        <li class="sub-links"><a href=""><strong>Park (Equipos SGD)</strong></a></li>
                        <li class="sub-links"><a href="">Nuevo equipo</a></li>
                        <li class="sub-links"><a href="">Edición de equipo</a></li>
                    </ul>

                    <ul class="links-item mt-3">
                        <li class="sub-links"><a href=""><strong>Generador de Ordenes</strong></a></li>
                        <li class="sub-links"><a href="">Datos del cliente (resumen)</a></li>
                        <li class="sub-links"><a href="">Información detallada</a></li>
                        <li class="sub-links"><a href="">Pre-facturas</a></li>
                        <li class="sub-links"><a href="">N# Factura (Odoo)</a></li>
                    </ul>

                    <ul class="links-item mt-3">
                        <li class="sub-links"><a href=""><strong>Alquiler</strong></a></li>
                        <li class="sub-links"><a href="">Nuevo contrato</a></li>
                        <li class="sub-links"><a href="">Edición de contratos</a></li>
                    </ul>

                    <ul class="links-item mt-3">
                        <li class="sub-links"><a href=""><strong>Inventario</strong></a></li>
                        <li class="sub-links"><a href="">En desarrollo</a></li>
                    </ul>


                    <ul class="links-item mt-3">
                        <li class="sub-links"><a href=""><strong>RF-LTQ</strong></a></li>
                        <li class="sub-links"><a href="">En desarrollo</a></li>
                    </ul>

                </li>

                <hr>

                <li class="nav-item mt-2">
                    <a class="nav-link text-dark" href="">
                        <i class='bx bx-collapse'></i>
                        <span class="nav-link-text ms-1">Componentes</span>
                    </a>

                    <ul class="links-item mt-3">
                        <li class="sub-links"><a href=""><strong>User Manager</strong></a></li>
                        <li class="sub-links"><a href="">Panel de control (Usuarios)</a></li>
                        <li class="sub-links"><a href="">Roles y privilegios</a></li>
                        <li class="sub-links"><a href="">Nuevo Usuario</a></li>
                        <li class="sub-links"><a href="">Editar usuario</a></li>
                    </ul>

                    <ul class="links-item mt-3">
                        <li class="sub-links"><a href=""><strong>Perfil</strong></a></li>
                        <li class="sub-links"><a href="">Datos generales</a></li>
                        <li class="sub-links"><a href="">Actualizar datos</a></li>
                        <li class="sub-links"><a href="">Gestión de claves</a></li>
                    </ul>

                </li>

                <hr>

                <li class="nav-item mb-3">
                    <a class="nav-link text-dark" href="{{ route('.lead') }}">
                        <i class='bx bxs-videos'></i>
                        <span class="nav-link-text ms-1">Tutoriales</span>
                    </a>
                    <ul class="links-item mt-3">
                        <li class="sub-links"><a href="">Sesiones</a></li>
                        <li class="sub-links"><a href="">Panel</a></li>
                        <li class="sub-links"><a href="">Lecturas</a></li>
                        <li class="sub-links"><a href="">Parque</a></li>
                        <li class="sub-links"><a href="">Contacto</a></li>
                        <li class="sub-links"><a href="">Alquiler</a></li>
                        <li class="sub-links"><a href="">Movimientos</a></li>
                        <li class="sub-links"><a href="">Inventario</a></li>
                        <li class="sub-links"><a href="">RF-LTQ</a></li>
                        <li class="sub-links"><a href="">Perfil</a></li>
                        <li class="sub-links"><a href="">User Manger</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
            <div class="mx-3">
                <a class="btn btn-outline-dark mt-4 w-100" href="{{ route('.dashboard') }}"
                    type="button">Volver a Inicio</a>
            </div>
        </div>
    </aside>

    <!--CONETENIDO-->
    @yield('content')
    <!--CONETENIDO-->

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>

</body>

</html>