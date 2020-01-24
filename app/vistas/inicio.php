<!DOCTYPE html>
<html>



<body>



    <div>
        <?php include_once 'includes/navbar.php' ?>
        <div class="text-center">
            <div class="container centrar">

                <h1>Hola, <?= $_SESSION["logueado"]->NombreUsuario ?></h1>
                <p>
                    <h2>
                        <img class="alineadoTextoImagen" src="../Assets/img/user.png" width="50px" />Panel de control</h2>
                </p>
                <div>
                    <a class="imgL" href="index.php?accion=controlUsuarios"><img class="imgP" src="../Assets/img/usuarios.png" /></a>
                    <a class="imgR" href="index.php?accion=vistaInicioIncidencias"><img class="imgP" src="../Assets/img/incidencia.png" /></a>

                </div>
                <br>
                <div>
                    <a class="imgL" href="#"><img class="imgP" src="../Assets/img/correo.png" /></a>
                    <a class="imgR" href="index.php?accion=vistaPDF"><img class="imgP" src="../Assets/img/pdf.svg" /></a>
                    <!-- <a href="index.php?accion=listadoPdf&aceptado=1"><img class="imgP" src="../Assets/img/pdf.svg" /></a> -->
                </div>
            </div>


        </div>
</body>

</html>