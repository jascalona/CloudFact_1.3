<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="icon" href="{{ asset('images/x.png') }}">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/nucleo-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">

    <!-- Scripts -->

    <style>
        /* Estilos para el menú responsivo */
        .navbar-vertical {
            transition: all 0.3s ease;
        }

        /* Botón flotante para móviles */
        .mobile-menu-button {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: none;
            cursor: pointer;
            justify-content: center;
            align-items: center;
        }

        .mobile-menu-button i {
            font-size: 24px;
            color: #333;
        }

        /* Estilos para pantallas pequeñas */
        @media (max-width: 991.98px) {
            .sidenav {
                transform: translateX(-100%);
                position: fixed;
                top: 0;
                left: 0;
                height: 100vh;
                z-index: 999;
                margin: 0;
                width: 260px;
                transition: all 0.3s ease;
            }

            .sidenav.show {
                transform: translateX(0);
            }

            .mobile-menu-button {
                display: flex;
            }

            /* Ajustar contenido cuando el menú está abierto */
            body.menu-open {
                overflow: hidden;
            }

            body.menu-open::after {
                content: '';
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 998;
            }
        }

        /* Estilos para pantallas grandes */
        @media (min-width: 992px) {
            .sidenav {
                transform: translateX(0) !important;
            }

            .mobile-menu-button {
                display: none !important;
            }
        }
    </style>
</head>

<body style="background-color: rgba(208, 218, 237, 0.296);">


    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand px-4 py-3 m-0" href="{{ route('.dashboard') }}">
                <img src="{{ asset('images/cloud-regular-24.png') }}" class="navbar-brand-img" width="26" height="26"
                    alt="main_logo">
                <span class="ms-1 text-sm text-dark">CloudFact</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link active bg-gradient-dark text-dark" href="{{ route('.dashboard') }}">
                        <i class='bx bxs-dashboard'></i>
                        <span class="nav-link-text ms-1">Panel</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('.lead') }}">
                        <i class='bx bx-book-reader'></i>
                        <span class="nav-link-text ms-1">Lecturas</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('.park') }}">
                        <i class='bx bx-printer'></i>
                        <span class="nav-link-text ms-1">Parque</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('contact') }}">
                        <i class='bx bxs-user-account'></i>
                        <span class="nav-link-text ms-1">Contacto</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('contract') }}">
                        <i class='bx bx-line-chart'></i> <span class="nav-link-text ms-1">Alquiler</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('install') }}">
                        <i class='bx bx-move-horizontal'></i>
                        <span class="nav-link-text ms-1">Movimientos</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('mantenimiento') }}">
                        <i class='bx bx-home-smile'></i>
                        <span class="nav-link-text ms-1">Inventario</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('mantenimiento') }}">
                        <i class='bx bxs-cog'></i>
                        <span class="nav-link-text ms-1">RF-LTQ</span>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Ajustes
                    </h6>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('perfil.index') }}">
                        <i class='bx bx-user'></i>
                        <span class="nav-link-text ms-1">Perfil</span>
                    </a>
                </li>

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button name="close+sesion" type="submit" class="nav-link text-dark">
                            <i class='bx bx-power-off'></i>
                            <span class="nav-link-text ms-1">Cerrar Sesion</span>
                        </button>
                    </form>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('userManager.index') }}">
                        <i class='bx bx-data'></i>
                        <span class="nav-link-text ms-1">User Manager</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
            <div class="mx-3">
                <a class="btn btn-outline-dark mt-4 w-100 text-dark" href="{{ route('showDoc.index') }}"
                    type="button">Documentacion</a>
            </div>
        </div>
    </aside>

    <!--CONETENIDO-->
    @yield('content')
    <!--CONETENIDO-->

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/nav.js') }}" defer></script>


    <!-- Botón flotante para móviles -->
    <button class="mobile-menu-button" id="mobileMenuButton">
        <i  class='bx bx-menu'></i>
    </button>
</body>

</html>