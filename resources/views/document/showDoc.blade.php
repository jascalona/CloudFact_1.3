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

                <div class="row g-0" style="height: 100vh;"> <!-- g-0 para quitar gutters -->
                    <!-- Menú de navegación (sin scroll) -->


                    <!-- Contenido con scroll (ScrollSpy aquí) -->
                    <div class="col-8 h-100 overflow-auto">
                        <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true"
                            class="scrollspy-example-2" tabindex="0" style="height: 100%;">
                            <div id="item-1">
                                <h4>Item 1</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora ullam dolor, itaque
                                    magni officia est libero consequuntur perspiciatis, harum debitis earum, rerum ad
                                    temporibus suscipit maxime sapiente ipsum doloribus quibusdam officiis atque neque nisi.
                                    Eligendi molestias nostrum architecto facilis magnam. Tempora non exercitationem illum
                                    beatae ut maxime praesentium, nulla velit ipsam animi sed voluptas autem odio distinctio
                                    cumque repellendus, laudantium quasi ullam impedit perspiciatis explicabo voluptatibus
                                    ipsa. Expedita culpa laudantium eveniet, quam maiores quibusdam iusto necessitatibus
                                    eaque, dolorum sint tempora praesentium eos adipisci? Non, perspiciatis tenetur
                                    asperiores deserunt voluptatum natus inventore, fugiat dolor est vel sint facere. Animi
                                    architecto accusamus cupiditate magnam voluptas rerum ut culpa molestias mollitia, quam
                                    necessitatibus dignissimos minima eos quia possimus eligendi. Veniam excepturi enim
                                    quaerat!</p>
                            </div>
                            <div id="item-1-1">
                                <h5>Item 1-1</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora ullam dolor, itaque
                                    magni officia est libero consequuntur perspiciatis, harum debitis earum, rerum ad
                                    temporibus suscipit maxime sapiente ipsum doloribus quibusdam officiis atque neque nisi.
                                    Eligendi molestias nostrum architecto facilis magnam. Tempora non exercitationem illum
                                    beatae ut maxime praesentium, nulla velit ipsam animi sed voluptas autem odio distinctio
                                    cumque repellendus, laudantium quasi ullam impedit perspiciatis explicabo voluptatibus
                                    ipsa. Expedita culpa laudantium eveniet, quam maiores quibusdam iusto necessitatibus
                                    eaque, dolorum sint tempora praesentium eos adipisci? Non, perspiciatis tenetur
                                    asperiores deserunt voluptatum natus inventore, fugiat dolor est vel sint facere. Animi
                                    architecto accusamus cupiditate magnam voluptas rerum ut culpa molestias mollitia, quam
                                    necessitatibus dignissimos minima eos quia possimus eligendi. Veniam excepturi enim
                                    quaerat!</p>
                            </div>
                            <div id="item-1-2">
                                <h5>Item 1-2</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora ullam dolor, itaque
                                    magni officia est libero consequuntur perspiciatis, harum debitis earum, rerum ad
                                    temporibus suscipit maxime sapiente ipsum doloribus quibusdam officiis atque neque nisi.
                                    Eligendi molestias nostrum architecto facilis magnam. Tempora non exercitationem illum
                                    beatae ut maxime praesentium, nulla velit ipsam animi sed voluptas autem odio distinctio
                                    cumque repellendus, laudantium quasi ullam impedit perspiciatis explicabo voluptatibus
                                    ipsa. Expedita culpa laudantium eveniet, quam maiores quibusdam iusto necessitatibus
                                    eaque, dolorum sint tempora praesentium eos adipisci? Non, perspiciatis tenetur
                                    asperiores deserunt voluptatum natus inventore, fugiat dolor est vel sint facere. Animi
                                    architecto accusamus cupiditate magnam voluptas rerum ut culpa molestias mollitia, quam
                                    necessitatibus dignissimos minima eos quia possimus eligendi. Veniam excepturi enim
                                    quaerat!</p>
                            </div>
                            <div id="item-2">
                                <h4>Item 2</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora ullam dolor, itaque
                                    magni officia est libero consequuntur perspiciatis, harum debitis earum, rerum ad
                                    temporibus suscipit maxime sapiente ipsum doloribus quibusdam officiis atque neque nisi.
                                    Eligendi molestias nostrum architecto facilis magnam. Tempora non exercitationem illum
                                    beatae ut maxime praesentium, nulla velit ipsam animi sed voluptas autem odio distinctio
                                    cumque repellendus, laudantium quasi ullam impedit perspiciatis explicabo voluptatibus
                                    ipsa. Expedita culpa laudantium eveniet, quam maiores quibusdam iusto necessitatibus
                                    eaque, dolorum sint tempora praesentium eos adipisci? Non, perspiciatis tenetur
                                    asperiores deserunt voluptatum natus inventore, fugiat dolor est vel sint facere. Animi
                                    architecto accusamus cupiditate magnam voluptas rerum ut culpa molestias mollitia, quam
                                    necessitatibus dignissimos minima eos quia possimus eligendi. Veniam excepturi enim
                                    quaerat!</p>
                            </div>
                            <div id="item-3">
                                <h4>Item 3</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora ullam dolor, itaque
                                    magni officia est libero consequuntur perspiciatis, harum debitis earum, rerum ad
                                    temporibus suscipit maxime sapiente ipsum doloribus quibusdam officiis atque neque nisi.
                                    Eligendi molestias nostrum architecto facilis magnam. Tempora non exercitationem illum
                                    beatae ut maxime praesentium, nulla velit ipsam animi sed voluptas autem odio distinctio
                                    cumque repellendus, laudantium quasi ullam impedit perspiciatis explicabo voluptatibus
                                    ipsa. Expedita culpa laudantium eveniet, quam maiores quibusdam iusto necessitatibus
                                    eaque, dolorum sint tempora praesentium eos adipisci? Non, perspiciatis tenetur
                                    asperiores deserunt voluptatum natus inventore, fugiat dolor est vel sint facere. Animi
                                    architecto accusamus cupiditate magnam voluptas rerum ut culpa molestias mollitia, quam
                                    necessitatibus dignissimos minima eos quia possimus eligendi. Veniam excepturi enim
                                    quaerat!</p>
                            </div>
                            <div id="item-3-1">
                                <h5>Item 3-1</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora ullam dolor, itaque
                                    magni officia est libero consequuntur perspiciatis, harum debitis earum, rerum ad
                                    temporibus suscipit maxime sapiente ipsum doloribus quibusdam officiis atque neque nisi.
                                    Eligendi molestias nostrum architecto facilis magnam. Tempora non exercitationem illum
                                    beatae ut maxime praesentium, nulla velit ipsam animi sed voluptas autem odio distinctio
                                    cumque repellendus, laudantium quasi ullam impedit perspiciatis explicabo voluptatibus
                                    ipsa. Expedita culpa laudantium eveniet, quam maiores quibusdam iusto necessitatibus
                                    eaque, dolorum sint tempora praesentium eos adipisci? Non, perspiciatis tenetur
                                    asperiores deserunt voluptatum natus inventore, fugiat dolor est vel sint facere. Animi
                                    architecto accusamus cupiditate magnam voluptas rerum ut culpa molestias mollitia, quam
                                    necessitatibus dignissimos minima eos quia possimus eligendi. Veniam excepturi enim
                                    quaerat!</p>
                            </div>
                            <div id="item-3-2">
                                <h5>Item 3-2</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora ullam dolor, itaque
                                    magni officia est libero consequuntur perspiciatis, harum debitis earum, rerum ad
                                    temporibus suscipit maxime sapiente ipsum doloribus quibusdam officiis atque neque nisi.
                                    Eligendi molestias nostrum architecto facilis magnam. Tempora non exercitationem illum
                                    beatae ut maxime praesentium, nulla velit ipsam animi sed voluptas autem odio distinctio
                                    cumque repellendus, laudantium quasi ullam impedit perspiciatis explicabo voluptatibus
                                    ipsa. Expedita culpa laudantium eveniet, quam maiores quibusdam iusto necessitatibus
                                    eaque, dolorum sint tempora praesentium eos adipisci? Non, perspiciatis tenetur
                                    asperiores deserunt voluptatum natus inventore, fugiat dolor est vel sint facere. Animi
                                    architecto accusamus cupiditate magnam voluptas rerum ut culpa molestias mollitia, quam
                                    necessitatibus dignissimos minima eos quia possimus eligendi. Veniam excepturi enim
                                    quaerat!</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-4 h-100 border-end">
                        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4">
                            <nav class="nav nav-pills flex-column">
                                <a class="nav-link" href="#item-1">Item 1</a>
                                <nav class="nav nav-pills flex-column">
                                    <a class="nav-link ms-3 my-1" href="#item-1-1">Item 1-1</a>
                                    <a class="nav-link ms-3 my-1" href="#item-1-2">Item 1-2</a>
                                </nav>
                                <a class="nav-link" href="#item-2">Item 2</a>
                                <a class="nav-link" href="#item-3">Item 3</a>
                                <nav class="nav nav-pills flex-column">
                                    <a class="nav-link ms-3 my-1" href="#item-3-1">Item 3-1</a>
                                    <a class="nav-link ms-3 my-1" href="#item-3-2">Item 3-2</a>
                                </nav>
                            </nav>
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