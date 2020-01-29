<html>

<head>
  <?php require_once 'includes/head.php'; ?>
</head>

<body>
  <?php require_once 'includes/navbar.php'; ?>
  <div class="text-center">
    <div class="cuerpo">
      <p>
        <h2><img class="alineadoTextoImagen" src="../Assets/img/user.png" width="50px" />Listar Incidencias</h2>
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
          <th>Id profesor</th>
          <th>Departamento</th>
          <th>Mensaje</th>
          <th>Estado</th>
          <!-- Añadimos una columna para las operaciones que podremos realizar con cada registro (sólo para el administrador)-->
          <?php if ($_SESSION["logueado"]->Rol == 1) : ?>
            <th>Operaciones</th>
          <?php endif; ?>
        </tr>
        <!--Los datos a listar están almacenados en $parametros["datos"], que lo recibimos del controlador-->
        <?php foreach ((array) $parametros["datos"] as $d) : ?>
          <!--Mostramos cada registro en una fila de la tabla-->
          <tr>
            <td><?= $d["id_profesor"] ?></td>
            <!-- Campo departamento -->
            <?php
            if ($d["id_departamento"] == 1) :
            ?>
              <td>Informática</td>
            <?php
            elseif ($d["id_departamento"] == 2) :
            ?>
              <td>Administración</td>
            <?php
            else :
            ?>
              <td>Comercio</td>
            <?php
            endif;
            ?>
            <?php
            if (strlen($d["mensaje"]) > 32) :
            ?>
              <td><a href="#" onclick="alert('<?php echo $d['mensaje'] ?>')">Pulse aquí para leer la descripcion completa</a></td>
            <?php
            else :
            ?>
              <td><?= $d["mensaje"] ?></td>
            <?php
            endif;
            ?>
            <td><?= $d["estado"] ?></td>

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
          <li class="page-item active paginacion"><a class="page-link" href="index.php?accion=listadoIncidencias&pagina=<?php echo $pagina - 1 ?>">&laquo;</a></li>
        <?php endif; ?>

        <?php
        $numeroPaginas = $parametros["datosPaginacion"];
        for ($i = 1; $i <= $numeroPaginas; $i++) {
          if ($pagina == $i) {
            echo "<li class='page-item paginacion'><a class='page-link' href='index.php?accion=listadoIncidencias&pagina=$i'>$i</a></li>";
          } else {
            echo "<li class='active page-item paginacion'><a class='page-link' href='index.php?accion=listadoIncidencias&pagina=$i'>$i</a></li>";
          }
        }
        ?>

        <?php if ($pagina == $numeroPaginas) : ?>
          <li class="page-item disabled paginacion"><a class="page-link">&raquo;</a></li>
        <?php else : ?>
          <li class="page-item active paginacion"><a class="page-link" href="index.php?accion=listadoIncidencias&pagina=<?php echo $pagina + 1 ?>">&raquo;</a></li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</body>

</html>