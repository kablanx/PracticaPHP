<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-default">
    <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link" href="index.php?accion=inicioLogueado">Inicio</a>
        </li>
        <li class="dropdown nav-item">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
               Usuarios
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php?accion=agregarUsuario">Agregar usuario</a>
                <a class="dropdown-item" href="index.php?accion=listadoUsuarios">Listado</a>
                <a class="dropdown-item" href="index.php?accion=listadoUsuariosRol">Listado ordenado por "Rol"</a>
                <a class="dropdown-item" href="index.php?accion=listadoUsuariosAceptado">Listado ordenado por "Aceptado"</a>
                <a class="dropdown-item" href="index.php?accion=listadoUsuariosNombre">Listado ordenado por "Nombre"</a>
            </div>
        </li>
        <li class="dropdown nav-item">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
               Incidencias
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php?accion=vistaEnviarIncidencias">Enviar incidencia</a>
                <a class="dropdown-item" href="index.php?accion=listadoIncidencias">Listado</a>
                <a class="dropdown-item" href="#">Listado ordenado por "Urgencia"</a>
                <a class="dropdown-item" href="#">Listado ordenado por "Departamento"</a>
            </div>
        </li>
        <?php if ($_SESSION["logueado"]->Rol == 1) : ?>
            <li class="nav-item">
                <a class="nav-link" href="#">Logs</a>
            </li>

        <?php endif; ?>
        
        <!--  -->
        
        <!--  -->
        <li class="nav-item">
            <a class="nav-link" href="#">Mensajes</a>
        </li>
        <li class="dropdown nav-item">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Convertir a PDF
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php?accion=listadoPdf&aceptado=1">Lista de usuarios activos</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?accion=cerrarSesion">Cerrar Sesión</a>
        </li>
    </ul>
</nav>