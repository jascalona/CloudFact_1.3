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
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Park</li>
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


                <!--GRAFICOS-->
                <div class="row">
                    <div class="col-lg-4 col-md-6 mt-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-0 ">Carga de Contadores</h6>
                                <p class="text-sm ">Rendimiento Mensual</p>
                                <div class="pe-2">
                                    <div class="chart">
                                        <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                                    </div>
                                </div>
                                <hr class="dark horizontal">
                                <div class="d-flex ">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mt-4 mb-4">
                        <div class="card ">
                            <div class="card-body">
                                <h6 class="mb-0 ">Facturación</h6>
                                <p class="text-sm ">Registro de cotización mensual. </p>
                                <div class="pe-2">
                                    <div class="chart">
                                        <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                                    </div>
                                </div>
                                <hr class="dark horizontal">
                                <div class="d-flex ">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-0 ">Completed Tasks</h6>
                                <p class="text-sm ">Last Campaign Performance</p>
                                <div class="pe-2">
                                    <div class="chart">
                                        <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                                    </div>
                                </div>
                                <hr class="dark horizontal">
                                <div class="d-flex ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--GRAFICOS-->


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

                    <!--TABLE ORDEN-->
                    <div class="col-md-15 mb-lg-0 mb-4">
                        <div class="card mt-4">
                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div style="justify-content: space-between;" class="col-12 d-flex align-items-center">
                                        <h4 class="mb-3 text-secondary font-weight-bolder opacity-7">Customer's:
                                            <small>Park</small>
                                        </h4>


                                        <script>
                                            // Asegúrate de que el formulario no se detenga por JS
                                            document.getElementById('singleRowForm').addEventListener('submit', function (e) {
                                                e.preventDefault(); // <-- Elimina esta línea si existe
                                                this.submit();
                                            });
                                        </script>


                                    </div>



                                </div>
                            </div>

                            <form method="get" action="{{ route('items.form') }}">
                                @csrf

                                <div style="margin-right: 50px;" class="btns text-end mt-3">
                                    <button name="submit-selected" id="submit-selected" class="btn btn-dark"
                                        name="procesarBtn">Editar</button>
                                </div>


                                <div class="main p-5">

                                    <div class="content-table">
                                        <table id="myTable" class="table align-items-center mb-0">
                                            <thead>
                                                <tr style="font-size: 13px;">

                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        Option</th>

                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        Cliente</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        RIF</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        Serial</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        Modelo</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        N# Contrato</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        Activo</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        Localidad</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        Ciudad</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        Estado</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        Fecha Insta.</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        Status</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        Cont. Insta. B/N</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        Cont. Insta. Color</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        Observacion</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                        DOC</th>
                                                </tr>
                                            </thead>


                                            <tbody>

                                                @foreach ($parks as $row_park)
                                                    <tr style="font-size: 12px;">

                                                        <td class="text-center">
                                                            <input type="radio" name="selected_item"
                                                                value="{{ $row_park->id }}">
                                                        </td>

                                                        <td class=" text-uppercase text-secondary text-xxs
                                                                                font-weight-bolder opacity-">
                                                            {{ $row_park->cliente }}
                                                        </td>

                                                        <td
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                            {{ $row_park->rif }}
                                                        </td>
                                                        <td
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                            {{ $row_park->serial }}
                                                        </td>
                                                        <td
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                            {{ $row_park->model }}
                                                        </td>
                                                        <td
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                            {{ $row_park->n_contract }}
                                                        </td>
                                                        <td class=""><span
                                                                class="badge bg-primary rounded-pill d-inline">{{ $row_park->activo }}</span>
                                                        </td>
                                                        <td
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                            {{ $row_park->location }}
                                                        </td>
                                                        <td
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                            {{ $row_park->city }}
                                                        </td>
                                                        <td
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                            {{ $row_park->estado }}
                                                        </td>
                                                        <td
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                            {{ $row_park->date_insta }}
                                                        </td>
                                                        <td
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                            {{ $row_park->n_port }}
                                                        </td>
                                                        <td
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                            {{ $row_park->cont_insta_bn }}
                                                        </td>
                                                        <td
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                            {{ $row_park->cont_insta_color }}
                                                        </td>
                                                        <td
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                            {{ $row_park->obser }}
                                                        </td>
                                                        <td
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-">
                                                            {{ $row_park->doc }}
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                <script>

                                                    /* Función para asegurar selección única con checkboxes
                                                    function seleccionarUnico(checkbox) {
                                                        const checkboxes = document.querySelectorAll('input[type="checkbox"][name="selected_id"]');
                                                        checkboxes.forEach((cb) => {
                                                            if (cb !== checkbox) cb.checked = false;
                                                        });
                                                    }

                                                    // Manejar clic en el botón
                                                    */

                                                    document.querySelector('form').addEventListener('submit', function (e) {
                                                        const selectedItem = document.querySelector('input[name="selected_item"]:checked');
                                                        if (!selectedItem) {
                                                            e.preventDefault();
                                                            alert('Por favor seleccione al menos un elemento');
                                                        }
                                                    });


                                                </script>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                    <!--TABLE ORDEN-->



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


        <script>
            var ctx = document.getElementById("chart-bars").getContext("2d");

            new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ["M", "T", "W", "T", "F", "S", "S"],
                    datasets: [{
                        label: "Views",
                        tension: 0.4,
                        borderWidth: 0,
                        borderRadius: 4,
                        borderSkipped: false,
                        backgroundColor: "#43A047",
                        data: [50, 45, 22, 28, 50, 60, 76],
                        barThickness: 'flex'
                    },],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: false,
                                borderDash: [5, 5],
                                color: '#e5e5e5'
                            },
                            ticks: {
                                suggestedMin: 0,
                                suggestedMax: 500,
                                beginAtZero: true,
                                padding: 10,
                                font: {
                                    size: 14,
                                    lineHeight: 2
                                },
                                color: "#737373"
                            },
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                                borderDash: [5, 5]
                            },
                            ticks: {
                                display: true,
                                color: '#737373',
                                padding: 10,
                                font: {
                                    size: 14,
                                    lineHeight: 2
                                },
                            }
                        },
                    },
                },
            });


            var ctx2 = document.getElementById("chart-line").getContext("2d");

            new Chart(ctx2, {
                type: "line",
                data: {
                    labels: ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"],
                    datasets: [{
                        label: "Sales",
                        tension: 0,
                        borderWidth: 2,
                        pointRadius: 3,
                        pointBackgroundColor: "#43A047",
                        pointBorderColor: "transparent",
                        borderColor: "#43A047",
                        backgroundColor: "transparent",
                        fill: true,
                        data: [120, 230, 130, 440, 250, 360, 270, 180, 90, 300, 310, 220],
                        maxBarThickness: 6

                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        },
                        tooltip: {
                            callbacks: {
                                title: function (context) {
                                    const fullMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                                    return fullMonths[context[0].dataIndex];
                                }
                            }
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: false,
                                borderDash: [4, 4],
                                color: '#e5e5e5'
                            },
                            ticks: {
                                display: true,
                                color: '#737373',
                                padding: 10,
                                font: {
                                    size: 12,
                                    lineHeight: 2
                                },
                            }
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                                borderDash: [5, 5]
                            },
                            ticks: {
                                display: true,
                                color: '#737373',
                                padding: 10,
                                font: {
                                    size: 12,
                                    lineHeight: 2
                                },
                            }
                        },
                    },
                },
            });

            var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

            new Chart(ctx3, {
                type: "line",
                data: {
                    labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Tasks",
                        tension: 0,
                        borderWidth: 2,
                        pointRadius: 3,
                        pointBackgroundColor: "#43A047",
                        pointBorderColor: "transparent",
                        borderColor: "#43A047",
                        backgroundColor: "transparent",
                        fill: true,
                        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                        maxBarThickness: 6

                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: false,
                                borderDash: [4, 4],
                                color: '#e5e5e5'
                            },
                            ticks: {
                                display: true,
                                padding: 10,
                                color: '#737373',
                                font: {
                                    size: 14,
                                    lineHeight: 2
                                },
                            }
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                                borderDash: [4, 4]
                            },
                            ticks: {
                                display: true,
                                color: '#737373',
                                padding: 10,
                                font: {
                                    size: 14,
                                    lineHeight: 2
                                },
                            }
                        },
                    },
                },
            });
        </script>


    @endsection



</body>

</html>