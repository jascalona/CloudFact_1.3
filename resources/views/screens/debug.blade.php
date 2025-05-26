<!DOCTYPE html>
<html>
<head>
    <title>Debug</title>
</head>
<body>
    <h1>ID Recibido: {{ $id ?? 'NULO' }}</h1>
    <h2>Cliente: {{ $cliente ?? 'NULO' }}</h2>
    <a href="{{ url()->previous() }}">Volver</a>
</body>
</html>