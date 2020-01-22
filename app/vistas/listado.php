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
    <div>


      <table class="table table-striped">
        <tr>
          <th>Nif</th>
          <th>Nombre</th>
          <th>Apellido1</th>
          <th>Apellido2</th>
          <!-- <th>Contraseña</th>-->
          <th>Email</th>
          <th>Nombre de usuario</th>
          <th>Telefono Movil</th>
          <th>Telefono Fijo</th>
          <th>Id Departamento</th>
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
            <td><?= $d["Nif"] ?></td>
            <td><?= $d["Nombre"] ?></td>
            <td><?= $d["Apellido1"] ?></td>
            <td><?= $d["Apellido2"] ?></td>
            <td><?= $d["Email"] ?></td>
            <td><?= $d["NombreUsuario"] ?></td>
            <td><?= $d["TelefonoMovil"] ?></td>
            <td><?= $d["TelefonoFijo"] ?></td>
            <td><?= $d["Departamento"] ?></td>
            <td><?= $d["Aceptado"] ?></td>
            <td><?= $d["Rol"] ?></td>

            <?php if ($_SESSION["logueado"]->Rol == 1) : ?>
              <td><a href="index.php?accion=editar&id=<?= $d['id'] ?>">Editar </a><a href="index.php?accion=borrarUsuario&id=<?= $d['id'] ?>"> Eliminar</a></td>
            <?php endif; ?>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
    <div>
      <ul>
        <?php if ($pagina==1): ?>
          <li class="disabled">&laquo;</li>
        <?php else: ?>
          <li><a href="index.php?accion=listado&pagina=<?php echo $pagina -1 ?>">&laquo;</a></li>
        <?php endif; ?>

        <?php 
        $numeroPaginas=$parametros["datosPaginacion"];
        for($i=1;$i<=$numeroPaginas;$i++){
          if($pagina==$i){
            echo "<li class='active'><a href='index.php?accion=listado&pagina=$i'>$i</a></li>";
          }else{
            echo "<li><a href='index.php?accion=listado&pagina=$i'>$i</a></li>";
          }
        }
        ?>
        <?php if($pagina==$numeroPaginas): ?>
          <li class="disabled">&raquo;</li>
        <?php else: ?>
          <li><a href="index.php?accion=listado&pagina=<?php echo $pagina +1 ?>">&raquo;</a></li>
        <?php endif; ?>
        <!-- <li><a href="#">&laquo;</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">&raquo;</a></li> -->
      </ul>
    </div>
  </div>
</body>

</html>