<html>

<head>
  <?php require_once 'includes/head.php'; ?>
</head>

<body>
  <?php require_once 'includes/navbar.php'; ?>
  <div class="">
    <div class="cuerpo text-center">
      <p>
        <h2><img class="alineadoTextoImagen" src="../Assets/img/user.png" width="50px" />Listar Usuarios</h2>
      </p>
    </div>
    <!--Mostramos los mensajes que se hayan generado al realizar el listado-->
    <?php foreach ($parametros["mensajes"] as $mensaje) : ?>
      <div class="alert alert-<?= $mensaje["tipo"] ?>"><?= $mensaje["mensaje"] ?></div>
    <?php endforeach; ?>
    <!--Creamos la tabla que utilizaremos para el listado:-->
    <div class="tabla">
      <table class="table table-striped">
        <tr>
        <?php if ($_SESSION["logueado"]->Rol == 1) : ?>
            <th>Id</th>
          <?php endif; ?>
          <th>Nif</th>
          <th>Nombre</th>
          <th>Apellido1</th>
          <th>Apellido2</th>
          <!-- <th>Contraseña</th>-->
          <th>Email</th>
          <th>Nombre de usuario</th>
          <th>Telefono Movil</th>
          <th>Telefono Fijo</th>
          <th>Departamento</th>
          <th>Aceptado</th>
          <th>Rol</th>
          <!-- Añadimos una columna para las operaciones que podremos realizar con cada registro (sólo para el administrador)-->
          <?php if ($_SESSION["logueado"]->Rol == 1) : ?>
            <th>Operaciones</th>
          <?php endif; ?>
        </tr>
        <!--Los datos a listar están almacenados en $parametros["datos"], que lo recibimos del controlador-->
        <?php foreach ((array) $parametros["datos"] as $d) : ?>
          <!--Mostramos cada registro en una fila de la tabla-->
          <tr>
          <?php if ($_SESSION["logueado"]->Rol == 1) : ?>
            <td><?= $d["id"] ?></td>
          <?php endif; ?>
            <td><?= $d["Nif"] ?></td>
            <td><?= $d["Nombre"] ?></td>
            <td><?= $d["Apellido1"] ?></td>
            <td><?= $d["Apellido2"] ?></td>
            <td><?= $d["Email"] ?></td>
            <td><?= $d["NombreUsuario"] ?></td>
            <td><?= $d["TelefonoMovil"] ?></td>
            <td><?= $d["TelefonoFijo"] ?></td>

            <!-- Campo departamento -->
            <?php
              if($d["Departamento"]==1):
            ?>
            <td>Informática</td>
            <?php
              elseif($d["Departamento"]==2):
            ?>
            <td>Administración</td>
            <?php
              else:
            ?>
            <td>Comercio</td>
            <?php
              endif;
            ?>

            <!-- Campo aceptado -->
            <?php
              if($d["Aceptado"]==1):
            ?>
            <td>Aceptado</td>
            <?php
              else:
            ?>
            <td>No aceptado</td>
            <?php
              endif;
            ?>

            <!-- Campo rol -->
            <?php
              if($d["Rol"]==1):
            ?>
            <td>Administrador</td>
            <?php
              else:
            ?>
            <td>Profesor</td>
            <?php
              endif;
            ?>

            <?php if ($_SESSION["logueado"]->Rol == 1) : ?>
              <td><a href="index.php?accion=editarUsuario&id=<?= $d['id'] ?>">Editar </a><a href="index.php?accion=borrarUsuario&id=<?= $d['id'] ?>"> Eliminar</a></td>
            <?php endif; ?>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
    <div>

      <ul class="pagination">
        <?php if ($pagina == 1) : ?>
          <li class="page-item disabled paginacion"><a class="page-link">&laquo;</a></li>
        <?php else : ?>
          <li class="page-item active paginacion"><a class="page-link" href="index.php?accion=listadoUsuariosAceptado&pagina=<?php echo $pagina - 1 ?>">&laquo;</a></li>
        <?php endif; ?>

        <?php
        $numeroPaginas = $parametros["datosPaginacion"];
        for ($i = 1; $i <= $numeroPaginas; $i++) {
          if ($pagina == $i) {
            echo "<li class='page-item paginacion'><a class='page-link' href='index.php?accion=listadoUsuariosAceptado&pagina=$i'>$i</a></li>";
          } else {
            echo "<li class='active page-item paginacion'><a class='page-link' href='index.php?accion=listadoUsuariosAceptado&pagina=$i'>$i</a></li>";
          }
        }
        ?>

        <?php if ($pagina == $numeroPaginas) : ?>
          <li class="page-item disabled paginacion"><a class="page-link">&raquo;</a></li>
        <?php else : ?>
          <li class="page-item active paginacion"><a class="page-link" href="index.php?accion=listadoUsuariosAceptado&pagina=<?php echo $pagina + 1 ?>">&raquo;</a></li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</body>

</html>