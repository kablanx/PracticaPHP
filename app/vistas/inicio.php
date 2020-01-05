<!DOCTYPE html>
<html>



<body>



    <div>
        <?php include_once 'includes/navbar.php' ?>
        <div class="container centrar">
            <div class="container cuerpo text-center">

                <h1>hola, <?= $_SESSION["logueado"]->NombreUsuario ?></h1>
                <p>
                    <h2>
                        <img class="alineadoTextoImagen" src="../Assets/img/user.png" width="50px" />Gestión de Usuarios</h2>
                </p>
                <div>
                    <a href="index.php?accion=listado"><img class="imgP" src="../Assets/img/usuarios.png" /></a>
                    <a href="index.php?accion=vistaIncidencias"><img class="imgP" src="../Assets/img/incidencia.png" /></a>

                </div>
                <br>
                <div>
                    <a href="#"><img class="imgP" src="../Assets/img/correo.png" /></a>
                    <a href="index.php?accion=vistaPDF"><img class="imgP" src="../Assets/img/pdf.svg" /></a>
                    <!-- <a href="index.php?accion=listadoPdf&aceptado=1"><img class="imgP" src="../Assets/img/pdf.svg" /></a> -->
                </div>
            </div>


        </div>
</body>

</html>