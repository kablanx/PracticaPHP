<!DOCTYPE html>
<html lang="en">
<body>
    <!-- Barra de navegación -->
    <?php require_once "includes/navbar.php"; ?>
    <div class="centrar container">
        <div class="text-center">

            <h2><img class="alineadoTextoImagen" src="../Assets/img/user.png" width="50px" /> Editar Usuario:</h2>

        </div>
        <div>
            <form id="form-login" action="index.php?accion=enviarEditar" method="post" enctype="multipart/form-data">
                <!-- NIF -->
                <div class="form-group">
                    <label for="nif">NIF*:</label>
                    <input name="nif" type="text" id="nif" class="nif" placeholder="NIF" autofocus="" required value="<?php echo $_SESSION["editar"]->Nif?>"/></p>
                    <span><?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "nif") : "" ?></span>
                </div>
                <!-- Nombre -->
                <div class="form-group">
                    <label for="nombre">Nombre*:</label>
                    <input name="nombre" type="text" id="nombre" class="nombre" placeholder="Nombre" autofocus="" required value="<?php echo $_SESSION["editar"]->Nombre?>"/></p>
                    <span><?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "nombre") : "" ?></span>
                </div>
                <!-- Primer appelido -->
                <div class="form-group">
                    <label for="apellido1">Primer apellido*:</label>
                    <input name="apellido1" type="text" id="apellido1" class="apellido1" placeholder="Primer apellido" autofocus="" required value="<?php echo $_SESSION["editar"]->Apellido1?>"/></p>
                    <span><?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "apellido1") : "" ?></span>
                </div>
                <!-- Segundo appelido -->
                <div class="form-group">
                    <label for="apellido2">Segundo apellido*:</label>
                    <input name="apellido2" type="text" id="apellido2" class="apellido2" placeholder="Segundo apellido" autofocus="" required value="<?php echo $_SESSION["editar"]->Apellido2?>"/></p>
                    <span><?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "apellido1") : "" ?></span>
                </div>
                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email*:</label>
                    <input name="email" type="text" id="email" class="email" placeholder="Email" autofocus="" required value="<?php echo $_SESSION["editar"]->Email?>"/></p>
                    <span><?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "email") : "" ?></span>
                </div>
                <!-- Nombre de usuario -->
                <div class="form-group">
                    <label for="nombreUsuario">Nombre de usuario*:</label>
                    <input name="nombreUsuario" type="text" id="nombreUsuario" class="nombreUsuario" placeholder="Nombre de usuario" autofocus="" required value="<?php echo $_SESSION["editar"]->NombreUsuario?>"/></p>
                    <span><?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "nombreUsuario") : "" ?></span>
                </div>
                <!-- Password -->
                <div class="form-group">
                    <label for="password">Contraseña*:</label>
                    <input name="password" type="password" id="password" class="password" placeholder="Password" autofocus="" required/></p>
                    <span><?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "password") : "" ?></span>
                </div>
                <!-- Teléfono móvil -->
                <div class="form-group">
                    <label for="telefonoMovil">Teléfono móvil:</label>
                    <input name="telefonoMovil" type="text" id="telefonoMovil" class="telefonoMovil" placeholder="Telefono Movil" autofocus="" value="<?php echo $_SESSION["editar"]->TelefonoMovil?>"/></p>
                    <span><?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "telefonoMovil") : "" ?></span>
                </div>
                <!-- Teléfono fijo -->
                <div class="form-group">
                    <label for="telefonoFijo">Teléfono fijo:</label>
                    <input name="telefonoFijo" type="text" id="telefonoFijo" class="telefonoFijo" placeholder="Telefono Fijo" autofocus="" value="<?php echo $_SESSION["editar"]->TelefonoFijo?>"/></p>
                    <span><?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "telefonoFijo") : "" ?></span>
                </div>
                <!-- Departamento -->
                <?php if($_SESSION["editar"]->Departamento==1):?>
                <div class="form-group">
                    <label for="departamento">Departamento:</label>
                    <select name="departamento">
                        <option value="1" selected>Infórmatica</option>
                        <option value="2">Administración</option>
                        <option value="3">Comercio</option>
                    </select>
                </div>
                <?php elseif($_SESSION["editar"]->Departamento==2):?>
                    <div class="form-group">
                    <label for="departamento">Departamento:</label>
                    <select name="departamento">
                        <option value="1">Infórmatica</option>
                        <option value="2" selected>Administración</option>
                        <option value="3">Comercio</option>
                    </select>
                </div>
                <?php else:?>
                    <div class="form-group">
                    <label for="departamento">Departamento:</label>
                    <select name="departamento">
                        <option value="1">Infórmatica</option>
                        <option value="2">Administración</option>
                        <option value="3" selected>Comercio</option>
                    </select>
                </div>
                <?php endif;?>

                <!-- Aceptado -->
                <?php if($_SESSION["editar"]->Aceptado==1):?>
                <div class="form-group">
                    <label for="aceptado">Aceptado:</label>
                    <select name="aceptado">
                        <option value="0">No aceptado</option>
                        <option value="1" selected>Aceptado</option>
                    </select>
                </div>
                <?php else:?>
                    <div class="form-group">
                    <label for="aceptado">Aceptado:</label>
                    <select name="aceptado">
                        <option value="0" selected>No aceptado</option>
                        <option value="1">Aceptado</option>
                    </select>
                </div>
                <?php endif;?>
                <!-- Rol -->
                <?php if($_SESSION["editar"]->Rol==0):?>
                <div class="form-group">
                    <label for="rol">Rol:</label>
                    <select name="rol">
                        <option value="0" selected>Profesor</option>
                        <option value="1">Administrador</option>
                    </select>
                </div>
                <?php else:?>
                    <div class="form-group">
                    <label for="rol">Rol:</label>
                    <select name="rol">
                        <option value="0">Profesor</option>
                        <option value="1" selected>Administrador</option>
                    </select>
                </div>
                <?php endif;?>
                <div>
                    <input name="submit" type="submit" id="boton" value="Editar" class="boton" />
                </div>
            </form>
            <?php
            borrarErrores() ?>
        </div>

    </div>
    <!-- <textarea name="nifa" id="nifa"></textarea>
    <script>
      CKEDITOR.replace('nifa');
    </script> -->
    <div id="editor">This is some sample content.</div>
    <script>
        InlineEditor
            .create(document.querySelector('#editor'));
    </script>
</body>

</html>