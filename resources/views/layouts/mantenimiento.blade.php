<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/x.png') }}">
    <title>CloudFact</title>

    <link rel="stylesheet" href="{{ asset('assets/mantenimiento.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/table_responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/setting.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/card.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/table.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>


    <div class="container-mantenimiento">
        <div class="container-content">
            <img src="{{ asset('images/mantenimiento.png') }}" alt="">
            <h2>Upss, ¡lo sentimos!</h2>
            <p>Ahora mismo estamos en mantenimiento, regresa mas tarde 👋</p>
            <br>

            <a href="{{ route('.dashboard') }}" class="btn btn-info" >Volver</a>

        </div>
    </div>

</body>

</html>