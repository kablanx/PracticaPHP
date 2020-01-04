<!DOCTYPE html>
<html lang="en">
<!--  
<head>
    <?php // require_once 'includes/head.php'; 
    ?>
</head>
-->

<body class="cuerpo">
    <div class="encabezado text-center">
        <h1>DAWES-Práctica</h1>
    </div>
    <div class="centrar">
        <div class="container cuerpo text-center">


            <p>
                <h2>
                    <img class="alineadoTextoImagen" src="../Assets/img/user.png" width="50px" /> Login de usuario:</h2>
            </p>
        </div>

        <div class="container">



            <form action="index.php?accion=logueado" method="POST">
                <label for="name">Usuario:
                    <input type="text" name="usuario" class="form-control" value="<?php if (isset($_COOKIE['usuario'])) {
                                                                                        echo $_COOKIE['usuario'];
                                                                                    } ?>" />
                </label><br />
                <label for="password">Contraseña:
                    <input type="password" name="password" class="form-control" value="<?php if (isset($_COOKIE['password'])) {
                                                                                            echo $_COOKIE['password'];
                                                                                        } ?>" />
                </label><br />
                <label><input type="checkbox" name="recuerdo">Recuérdame :) </label>
                <br />
                <?php
                if (isset($_SESSION['errores']["noaceptado"]) && !empty($_SESSION['errores']["noaceptado"])) {
                    echo $_SESSION['errores']["noaceptado"] . "<br>";
                }
                if (isset($_SESSION['errores']["registrado"]) && !empty($_SESSION['errores']["registrado"])) {
                    echo $_SESSION['errores']["registrado"] . "<br>";
                }
                ?>
                <input type="submit" value="Acceder" name="acceder" class="btn btn-success" />
                <br>
                <a href="index.php?accion=registro">Crear una cuenta</a>
            </form>
        </div>
    </div>
    <?php borrarErrores(); ?>
</body>

</html>