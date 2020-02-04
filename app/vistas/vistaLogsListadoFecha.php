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
          <th>id</th>
          <th>id_Profesor</th>
          <th>Descripción</th>
          <th>Fecha</th>
        </tr>
        <!--Los datos a listar están almacenados en $parametros["datos"], que lo recibimos del controlador-->
        <?php foreach ((array) $parametros["datos"] as $d) : ?>
          <!--Mostramos cada registro en una fila de la tabla-->
          <tr>
            <td><?= $d["id"] ?></td>
            <td><?= $d["id_profesor"] ?></td>
            <td><?= $d["descripcion"] ?></td>
            <td><?= $d["fecha"] ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
    <div>

      <ul class="pagination">
        <?php if ($pagina == 1) : ?>
          <li class="page-item disabled paginacion"><a class="page-link">&laquo;</a></li>
        <?php else : ?>
          <li class="page-item active paginacion"><a class="page-link" href="index.php?accion=listadoUsuariosNombre&pagina=<?php echo $pagina - 1 ?>">&laquo;</a></li>
        <?php endif; ?>

        <?php
        $numeroPaginas = $parametros["datosPaginacion"];
        for ($i = 1; $i <= $numeroPaginas; $i++) {
          if ($pagina == $i) {
            echo "<li class='page-item paginacion'><a class='page-link' href='index.php?accion=listadoUsuariosNombre&pagina=$i'>$i</a></li>";
          } else {
            echo "<li class='active page-item paginacion'><a class='page-link' href='index.php?accion=listadoUsuariosNombre&pagina=$i'>$i</a></li>";
          }
        }
        ?>

        <?php if ($pagina == $numeroPaginas) : ?>
          <li class="page-item disabled paginacion"><a class="page-link">&raquo;</a></li>
        <?php else : ?>
          <li class="page-item active paginacion"><a class="page-link" href="index.php?accion=listadoUsuariosNombre&pagina=<?php echo $pagina + 1 ?>">&raquo;</a></li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</body>

</html>