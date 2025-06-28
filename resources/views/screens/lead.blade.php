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
    <link rel="stylesheet" href="{{ asset('assets/setting.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/card.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/table.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet"
        integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <!--STYLES-->

</head>

<body>

    @section('content')

        <main class="main-content position-relative">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg mt-2 px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur"
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

                <!--SECTION GENERAL-->
                <div class="container-fluid py-2 mb-6">

                    <div class="card">
                        <div class="card-header d-flex align-items-center border-bottom">
                            <span class="avatar text-bg-primary avatar-lg fs-5"><i class='bx bx-pulse'></i></span>
                            <div class="ms-3">
                                <h6 class="mb-0 fs-sm mt-3">Lecturas de Cliente</h6>
                                <span class="text-muted fs-sm">{{ \Carbon\Carbon::now()->format('F d, Y') }}</span>
                            </div>
                            <a href="{{ route('Lgeneral') }}" class="btn text-muted ms-auto"><i
                                    class='bx bxs-book-open'></i></a>
                        </div>
                        <div style="font-size: 23px;" class="card-body">
                            Total de Contratos:  {{ $n_alquiler }}
                        </div>
                    </div>

                </div>
                <!--SECTION GENERAL-->



                <!-- Barra de búsqueda -->

                <div class="search-minimal-container">
                    <div class="search-minimal">
                        <i class='bx bx-search search-icon'></i>
                        <input type="text" id="searchInput" class="search-input"
                            placeholder="Buscar cliente, RIF o contrato..." aria-label="Buscar">
                    </div>
                </div>

                <!-- Contenedor de tarjetas -->
                <div style="" class="container-card-lead" id="cardsContainer">
                    @foreach ($customers as $row)
                        <!--CARDS-->
                        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 customer-card" data-cliente="{{ strtolower($row->cliente) }}"
                            data-rif="{{ strtolower($row->rif) }}" data-contrato="{{ strtolower($row->n_contract) }}">
                            <div style=" height: 190px; " class="card">
                                <div class="card-header p-2 ps-3">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="text-sm mb-0 text-capitalize">{{ $row->cliente }}</p>
                                            <h4 class="mb-0 mt-3">{{ $row->rif }}</h4>
                                        </div>
                                        <div
                                            class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                            <i class='bx bxs-bar-chart-alt-2'></i>
                                        </div>
                                    </div>
                                </div>
                                <hr class="dark horizontal my-0">
                                <div class="card-footer p-2 ps-3">
                                    <p class="mb-0 text-sm">Contrato: #<span
                                            class="text-success font-weight-bolder">{{ $row->n_contract }} </span></p>
                                    <span><a href="{{ route('LCustomer', $row->n_contract) }}">Detalles</a></span>
                                </div>
                            </div>
                        </div>
                        <!--CARDS-->
                    @endforeach
                </div>

                <!--script para filtros de componentes-->
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const searchInput = document.getElementById('searchInput');
                        const customerCards = document.querySelectorAll('.customer-card');

                        function filterCards() {
                            const searchTerm = searchInput.value.toLowerCase();

                            customerCards.forEach(card => {
                                const cliente = card.getAttribute('data-cliente');
                                const rif = card.getAttribute('data-rif');
                                const contrato = card.getAttribute('data-contrato');

                                if (cliente.includes(searchTerm) || rif.includes(searchTerm) || contrato.includes(searchTerm)) {
                                    card.style.display = 'block';
                                } else {
                                    card.style.display = 'none';
                                }
                            });
                        }

                        // Filtrado en tiempo real
                        searchInput.addEventListener('input', filterCards);

                        // También responde al Enter por si acaso
                        searchInput.addEventListener('keyup', function (e) {
                            if (e.key === 'Enter') filterCards();
                        });
                    });
                </script>

                <!--script para filtros de componentes-->


            </div>

            </div>




        </main>

    @endsection

</body>

</html>