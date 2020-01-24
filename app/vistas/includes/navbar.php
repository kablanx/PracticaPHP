<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="index.php?accion=inicioLogueado">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?accion=controlUsuarios">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?accion=vistaInicioIncidencias">Incidencias</a>
                </li>
                <?php if ($_SESSION["logueado"]->Rol == 1) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logs</a>
                    </li>
                    
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mensajes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Convertir a PDF</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?accion=cerrarSesion">Cerrar Sesión</a>
                </li>
            </ul>

        </nav>