<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "includes/head.php"; ?>
</head>

<body>
    <?php require_once "includes/navbar.php" ?>
    <div class="text-center">
        <h2>Panel de control de usuarios</h2>
    </div>
    <div class="text-left">
        <p><a href="index.php?accion=agregarUsuario">- Agregar usuario.</a></p>
        <p><a href="index.php?accion=listadoUsuarios">- Listado de usuarios.</a></p>
        <p><a href="index.php?accion=listadoUsuariosAceptado">- Listado de usuarios ordenados por "Aceptado".</a></p>
        <p><a href="index.php?accion=listadoUsuariosRol">- Listado de usuarios ordenados por "Rol".</a></p>
        <p><a href="index.php?accion=listadoUsuariosNombreUsuario">- Listado de usuarios ordenados por "Nombre".</a></p>
    </div>
</body>

</html>