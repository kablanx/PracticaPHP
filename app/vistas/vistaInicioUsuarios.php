<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php require_once "includes/navbar.php"?>
    <div class="text-center">
        <h2>Panel de control de usuarios</h2>
    </div>
    <div class="text-left">
        <p><a href="index.php?accion=agregarUsuario">Agregar usuario</a></p>
        <p><a href="index.php?accion=listadoUsuarios">Listado de usuarios</a></p>
        <p><a href="#">Listado de usuarios activos</a></p>
        <p><a href="#">Listado de usuarios no activos</a></p>
    </div>
</body>
</html>