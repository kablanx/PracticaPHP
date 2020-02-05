<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "includes/head.php"; ?>
</head>

<body>
    <div class="encabezado">
        <?php require_once "includes/encabezado.php"; ?>
    </div>
    <div class="text-left font-large">
        <a href="index.php?accion=index">Inicio</a>
    </div>
    <span><?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "recuperado") : "" ?></span>
    <div class="centrar container">
        <form class="form" action="index.php?accion=enviarRecuperarPassword" method="POST">

            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input name="usuario" type="text" id="usuario" class="usuario" placeholder="Usuario" autofocus="" required /></p>
                <span><?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "usuario") : "" ?></span>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input name="email" type="text" id="email" class="email" placeholder="Email" autofocus="" required /></p>
                <span><?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "email") : "" ?></span>
            </div>
            <div class="form-group">
                <label for="nif">NIF:</label>
                <input name="nif" type="text" id="nif" class="nif" placeholder="NIF" autofocus="" required /></p>
                <span><?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "nif") : "" ?></span>
            </div>
            <div class="form-group">
                <label for="password">Nueva contraseña:</label>
                <input name="password" type="password" id="password" class="password" placeholder="password" autofocus="" required /></p>
                <span><?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "password") : "" ?></span>
            </div>
            <div>
                <input name="submit" type="submit" id="boton" value="Recuperar contraseña" class="boton" />
            </div>
        </form>
    </div>
    <?php
    borrarErrores(); 
    ?>
</body>

</html>