<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CloudFact-Impot-Customer</title>

    <!--STYLES-->
    <link rel="stylesheet" href="{{ asset('assets/ImpCustomer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/table_responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/setting.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/card.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/table.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


</head>

<body>


    @if ($message_e = Session::get('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <h5 class="alert-heading"><i class='bx bx-error-circle'></i> Alerta!</h5>
            {{ $message_e }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                    class='bx bx-x'></i></button>
        </div>
    @endif


    @if ($message_e = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h5 class="alert-heading"><i class='bx bx-check'></i> Proceso completado con Exito!</h5>
            {{ $message_e }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                    class='bx bx-x'></i></button>
        </div>
    @endif

    <div class="container-import">
        <div class="container-header">
            <h3>Seleccione la plantilla descargada (*.CSV)</h3>
            <span>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat quaerat explicabo error quibusdam cum
                aperiam.
            </span>
        </div>

        <form action="" method="post">
            @csrf
            <div class="container-content">
                <input type="file" name="file" accept=".csv" id="file-input" class="form-control" id="customFile" />
                <br>

                <div class="btns">
                    <button type="submit" value="submit" name="carga" class="btn btn-primary subir">Subir</button>
                    <button class="btn btn-info cog"><i class='bx bxs-cog'></i></button>
                </div>

        </form>
    </div>
    </div>
    </div>


</body>

</html>