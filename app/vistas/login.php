<!DOCTYPE html>
<html lang="en">
<!--  
<head>
    <?php // require_once 'includes/head.php'; 
    ?>
</head>
-->

<body class="text-center">
    <div class="encabezado">
        <h1>DAWES-Práctica</h1>
    </div>
    <div>
        <div class="container cuerpo">


            <p>
                <h2>
                    <img class="alineadoTextoImagen" src="../Assets/img/user.png" width="50px" /> Login:</h2>
            </p>
        </div>

        <div>
            <!-- Para el recordar contraseña, falta crear la cookie -->
            <form action="index.php?accion=logueado" method="POST">
                <div class="form-group">
                    <label for="name">Usuario:
                        <input type="text" name="usuario" class="form-control" value="<?php if (isset($_COOKIE['usuario'])) {
                                                                                            echo $_COOKIE['usuario'];
                                                                                        } ?>" />
                    </label><br />
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:
                        <input type="password" name="password" class="form-control" value="<?php if (isset($_COOKIE['password'])) {
                                                                                                echo $_COOKIE['password'];
                                                                                            } ?>" />
                    </label><br />
                </div>
                <div class="form-group">
                    <label><input type="checkbox" class="form-check-input" name="recuerdo" value="on">Recuérdame :) </label>
                    <br />
                </div>
                <?php
                if (isset($_SESSION['errores']["noaceptado"]) && !empty($_SESSION['errores']["noaceptado"])) {
                    echo "<a class='alert alert-danger'>".$_SESSION['errores']["noaceptado"]."</a>"."<br>";
                }
                if (isset($_SESSION['errores']["registrado"]) && !empty($_SESSION['errores']["registrado"])) {
                    echo "<a class='alert alert-danger'>".$_SESSION['errores']["registrado"]."</a>"."<br>";
                }
                ?>
                <input type="submit" value="Acceder" name="acceder" class="btn btn-success" />
                <br>
            </form>

        </div>
        <div>
            <a href="index.php?accion=registro">Crear una cuenta</a>
        </div>
    </div>
    <?php borrarErrores(); ?>
</body>

</html>