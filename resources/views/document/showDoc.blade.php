@extends('layouts.document')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/x.png') }}">
    <title>CloudFact-Dashboard</title>

    <!--STYLES-->
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/card.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/material-dashboard.css.map') }}">
    <link rel="stylesheet" href="{{ asset('assets/material-dashboard.min.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet"
        integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">
    <!--STYLES-->

    <!--SCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <!--SCRIPT-->



</head>

<body>

    @section('content')

        <main class="main-content position-relative mt-3">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur"
                data-scroll="true">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm">Pages</li>
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Documentation</li>
                        </ol>
                    </nav>

                    <h6 class="text-info">Version 1.3</h6>

                </div>
            </nav>
            <!-- End Navbar -->

            <div class="container-fluid py-2">

                <div class="row g-0 mt-6" style="height: calc(100vh - 100px); padding: 15px;">
                    <!-- Menú de navegación (sin scroll) -->

                    <!-- Contenido con scroll (ScrollSpy aquí) -->
                    <div class="col-8 h-100">
                        <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true"
                            class="scrollspy-example-2 h-100 overflow-auto" tabindex="0">

                            @foreach ($contents as $content)

                                <div id="{{ $content->id }}">

                                    <h4 class="mt-3">{{ $content->title_content }}</h4>

                                    <div class="contenido">
                                        @foreach ($content->subTitles as $subTitle)
                                            <p class="mt-4" id="{{ $subTitle->id }}">
                                                <strong><i>{{ $subTitle->sub_title }}</i></strong>
                                            </p>
                                            <span style="white-space: pre-wrap;"
                                                class="mb-3">{{ $subTitle->text_description }}</span><br>

                                            <img style="max-width: 80%; margin-top: 20px; padding: 20px; " src="{{ asset('storage/'.$subTitle->path) }}" alt="">

                                            <div class="p-"></div>
                                        @endforeach
                                    </div>

                                </div>
                            @endforeach


                        </div>
                    </div>

                    <style>
                        .scroll-container {
                            max-height: 100vh;
                            overflow: hidden;
                        }

                        .scroll-content {
                            height: 100%;
                            overflow-y: auto;
                        }
                    </style>

                    <div class="col-4 h-100 border-end scroll-container">
                        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 scroll-content">
                            <nav class="nav nav-pills flex-column" tabindex="0">

                                @foreach ($contents as $content)
                                    <a class="nav-link"
                                        href="#{{ $content->id }}"><strong>{{ $content->title_content }}</strong></a>

                                    <nav class="nav nav-pills flex-column">
                                        @foreach ($content->subTitles as $subTitle)
                                            <a class="nav-link ms-3 my-1" href="#{{ $subTitle->id }}">{{ $subTitle->sub_title }}</a>
                                        @endforeach
                                    </nav>

                                @endforeach
                            </nav>
                    </div>

                </div>
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


    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/material-dashboard.js') }}"></script>
    <script src="{{ asset('js/material-dashboard.js.map') }}"></script>
    <script src="{{ asset('js/material-dashboard.min.js') }}"></script>

    <script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
    <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/world.js') }}"></script>




</body>

</html>