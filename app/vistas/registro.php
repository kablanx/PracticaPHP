<!DOCTYPE html>
<html lang="en">

<head>
    
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body class="container">
    <!-- Encabezado -->
    <div class="encabezado text-center">
        <h1>DAWES-Práctica</h1>
        <h6 class="text-right">SPR♥</h6>
    </div>

    <!-- PREGUNTAR
    Sobre el atributo max-width del container. Para saber si es responsive o puedo asignarle algún valor
-->
    <div class="centrar ">
        <a href="index.php?accion=index">Inicio</a>
        <div class="container text-center">
            
                <h2><img class="alineadoTextoImagen" src="../Assets/img/user.png" width="50px" /> Registro:</h2>
            
        </div>
        <div>
            <form id="form-login" action="index.php?accion=enviarRegistro" method="post" enctype="multipart/form-data">
                <!-- NIF -->
                <div class="form-group">
                    <label for="nif">NIF*:</label>
                    <input name="nif" type="text" id="nif" class="nif" placeholder="NIF" autofocus="" required /></p>
                    <span><?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "nif") : "" ?></span>
                </div>
                <!-- Nombre -->
                <div class="form-group">
                    <label for="nombre">Nombre*:</label>
                    <input name="nombre" type="text" id="nombre" class="nombre" placeholder="Nombre" autofocus="" required /></p>
                    <span><?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "nombre") : "" ?></span>
                </div>
                <!-- Primer appelido -->
                <div class="form-group">
                    <label for="apellido1">Primer apellido*:</label>
                    <input name="apellido1" type="text" id="apellido1" class="apellido1" placeholder="Primer apellido" autofocus="" required /></p>
                    <span><?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "apellido1") : "" ?></span>
                </div>
                <!-- Segundo appelido -->
                <div class="form-group">
                    <label for="apellido2">Segundo apellido*:</label>
                    <input name="apellido2" type="text" id="apellido2" class="apellido2" placeholder="Segundo apellido" autofocus="" required /></p>
                    <span><?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "apellido1") : "" ?></span>
                </div>

                <!-- Imagen -->
                <div class="form-group">
                    <!-- <input type="hidden" /> -->
                    <input type="file" name="imagen" />
                    
                </div>
                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email*:</label>
                    <input name="email" type="text" id="email" class="email" placeholder="Email" autofocus="" required /></p>
                    <span><?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "email") : "" ?></span>
                </div>
                <!-- Nombre de usuario -->
                <div class="form-group">
                    <label for="nombreUsuario">Nombre de usuario*:</label>
                    <input name="nombreUsuario" type="text" id="nombreUsuario" class="nombreUsuario" placeholder="Nombre de usuario" autofocus="" required /></p>
                    <span><?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "nombreUsuario") : "" ?></span>
                </div>
                <!-- Password -->
                <div class="form-group">
                    <label for="password">Contraseña*:</label>
                    <input name="password" type="text" id="password" class="password" placeholder="Password" autofocus="" required /></p>
                    <span><?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "password") : "" ?></span>
                </div>
                <!-- Teléfono móvil -->
                <div class="form-group">
                    <label for="telefonoMovil">Teléfono móvil*:</label>
                    <input name="telefonoMovil" type="text" id="telefonoMovil" class="telefonoMovil" placeholder="Telefono Movil" autofocus="" /></p>
                    <span><?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "telefonoMovil") : "" ?></span>
                </div>
                <!-- Teléfono fijo -->
                <div class="form-group">
                    <label for="telefonoFijo">Teléfono fijo*:</label>
                    <input name="telefonoFijo" type="text" id="telefonoFijo" class="telefonoFijo" placeholder="Telefono Fijo" autofocus="" /></p>
                    <span><?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "telefonoFijo") : "" ?></span>
                </div>
                <!-- Departamento -->
                <div class="form-group">
                    <label for="departamento">Departamento*:</label>
                    <select name="departamento">
                        <option value="1" selected>Informática</option>
                        <option value="2">Administración</option>
                        <option value="3">Comercio</option>
                    </select>
                </div>
                <!-- Captcha -->
                <div class="g-recaptcha" data-sitekey="6LfhQMkUAAAAAEe6IEqXzE3B4KiCQxoIONSAqBwl"></div>
                <span ><?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'captcha'):"" ?></span>
                <div>
                    <input name="submit" type="submit" id="boton" value="Registrar" class="boton" />
                </div>

            </form>
            <?php 
            borrarErrores()?>
        </div>

    </div>

</body>

</html>