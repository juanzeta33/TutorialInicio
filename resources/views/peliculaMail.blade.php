<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Informacion del correo</h2>
    <ul>
        <li>{{ $info->titulo }}</li>
        <li>{{ $info->descripcion }}</li>
        <li>{{ $info->rating }}</li>
        <li>{{ $info->fechas_estreno }}</li>
        <li></li>
    </ul>
</body>
</html>