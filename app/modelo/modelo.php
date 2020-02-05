<?php


class modelo
{
    private $conexion;
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "dbusuarios";

    public function __construct()
    {
        $this->conectar();
    }

    public function conectar()
    {
        try {
            $this->conexion = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Para saber si nos hemos conectado a la db
           /*  echo '<div class="alert alert-success">' .
                "Conectado a la Base de Datos de usuarios!! :)" . '</div>'; */
            $return = TRUE;
        } catch (PDOException $ex) {
            echo '<div class="alert alert-danger">' .
                "No se ha conectado a la base de datos :(" . '</div>';
            $return = $ex->getMessage();
        }
        return $return;
    }

    public function listadoLogsFecha($inicio, $regsxpag)
    {
        $return = [
            "correcto" => FALSE,
            "datos" => NULL,
            "datosPaginacion" => Null,
            "error" => NULL
        ];
        //Realizamos la consulta...
        try {  //Definimos la instrucción SQL  
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM logs ORDER BY `fecha` LIMIT $inicio, $regsxpag";
            // Hacemos directamente la consulta al no tener parámetros
            $resultsquery = $this->conexion->query($sql);

            // Para saber el número de páginas que hay
            $totalRegistros = $this->conexion->query("SELECT FOUND_ROWS() as total");
            $totalRegistros = $totalRegistros->fetch()["total"];
            $numeroPaginas = ceil($totalRegistros / $regsxpag);

            //Supervisamos si la inserción se realizó correctamente... 
            if ($resultsquery) :
                $return["correcto"] = TRUE;
                $return["datos"] = $resultsquery->fetchAll(PDO::FETCH_ASSOC);
                $return["datosPaginacion"] = $numeroPaginas;
            endif; // o no :(
        } catch (PDOException $ex) {
            $return["error"] = $ex->getMessage();
        }
        return $return;
    }

    public function listadoUsuarios($inicio, $regsxpag)
    {
        $return = [
            "correcto" => FALSE,
            "datos" => NULL,
            "datosPaginacion" => Null,
            "error" => NULL
        ];
        //Realizamos la consulta...
        try {  //Definimos la instrucción SQL  
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM usuarios LIMIT $inicio, $regsxpag";
            // Hacemos directamente la consulta al no tener parámetros
            $resultsquery = $this->conexion->query($sql);

            // Para saber el número de páginas que hay
            $totalRegistros = $this->conexion->query("SELECT FOUND_ROWS() as total");
            $totalRegistros = $totalRegistros->fetch()["total"];
            $numeroPaginas = ceil($totalRegistros / $regsxpag);

            //Supervisamos si la inserción se realizó correctamente... 
            if ($resultsquery) :
                $return["correcto"] = TRUE;
                $return["datos"] = $resultsquery->fetchAll(PDO::FETCH_ASSOC);
                $return["datosPaginacion"] = $numeroPaginas;
            endif; // o no :(
        } catch (PDOException $ex) {
            $return["error"] = $ex->getMessage();
        }
        return $return;
    }
    public function listadoUsuariosAceptado($inicio, $regsxpag)
    {
        $return = [
            "correcto" => FALSE,
            "datos" => NULL,
            "datosPaginacion" => Null,
            "error" => NULL
        ];
        //Realizamos la consulta...
        try {  //Definimos la instrucción SQL  
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM usuarios ORDER BY `Aceptado` LIMIT $inicio, $regsxpag";
            // Hacemos directamente la consulta al no tener parámetros
            $resultsquery = $this->conexion->query($sql);

            // Para saber el número de páginas que hay
            $totalRegistros = $this->conexion->query("SELECT FOUND_ROWS() as total");
            $totalRegistros = $totalRegistros->fetch()["total"];
            $numeroPaginas = ceil($totalRegistros / $regsxpag);

            //Supervisamos si la inserción se realizó correctamente... 
            if ($resultsquery) :
                $return["correcto"] = TRUE;
                $return["datos"] = $resultsquery->fetchAll(PDO::FETCH_ASSOC);
                $return["datosPaginacion"] = $numeroPaginas;
            endif; // o no :(
        } catch (PDOException $ex) {
            $return["error"] = $ex->getMessage();
        }
        return $return;
    }
    public function listadoUsuariosNombre($inicio, $regsxpag)
    {
        $return = [
            "correcto" => FALSE,
            "datos" => NULL,
            "datosPaginacion" => Null,
            "error" => NULL
        ];
        //Realizamos la consulta...
        try {  //Definimos la instrucción SQL  
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM usuarios ORDER BY `Nombre` LIMIT $inicio, $regsxpag";
            // Hacemos directamente la consulta al no tener parámetros
            $resultsquery = $this->conexion->query($sql);

            // Para saber el número de páginas que hay
            $totalRegistros = $this->conexion->query("SELECT FOUND_ROWS() as total");
            $totalRegistros = $totalRegistros->fetch()["total"];
            $numeroPaginas = ceil($totalRegistros / $regsxpag);

            //Supervisamos si la inserción se realizó correctamente... 
            if ($resultsquery) :
                $return["correcto"] = TRUE;
                $return["datos"] = $resultsquery->fetchAll(PDO::FETCH_ASSOC);
                $return["datosPaginacion"] = $numeroPaginas;
            endif; // o no :(
        } catch (PDOException $ex) {
            $return["error"] = $ex->getMessage();
        }
        return $return;
    }
    public function listadoUsuariosRol($inicio, $regsxpag)
    {
        $return = [
            "correcto" => FALSE,
            "datos" => NULL,
            "datosPaginacion" => Null,
            "error" => NULL
        ];
        //Realizamos la consulta...
        try {  //Definimos la instrucción SQL  
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM usuarios ORDER BY `Rol` DESC LIMIT $inicio, $regsxpag";
            // Hacemos directamente la consulta al no tener parámetros
            $resultsquery = $this->conexion->query($sql);

            // Para saber el número de páginas que hay
            $totalRegistros = $this->conexion->query("SELECT FOUND_ROWS() as total");
            $totalRegistros = $totalRegistros->fetch()["total"];
            $numeroPaginas = ceil($totalRegistros / $regsxpag);

            //Supervisamos si la inserción se realizó correctamente... 
            if ($resultsquery) :
                $return["correcto"] = TRUE;
                $return["datos"] = $resultsquery->fetchAll(PDO::FETCH_ASSOC);
                $return["datosPaginacion"] = $numeroPaginas;
            endif; // o no :(
        } catch (PDOException $ex) {
            $return["error"] = $ex->getMessage();
        }
        return $return;
    }

    public function listadoIncidenciasFecha($inicio, $regsxpag)
    {
        $return = [
            "correcto" => FALSE,
            "datos" => NULL,
            "datosPaginacion" => Null,
            "error" => NULL
        ];
        //Realizamos la consulta...
        try {  //Definimos la instrucción SQL  
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM incidencias ORDER BY `fecha` LIMIT $inicio, $regsxpag";
            // Hacemos directamente la consulta al no tener parámetros
            $resultsquery = $this->conexion->query($sql);

            // Para saber el número de páginas que hay
            $totalRegistros = $this->conexion->query("SELECT FOUND_ROWS() as total");
            $totalRegistros = $totalRegistros->fetch()["total"];
            $numeroPaginas = ceil($totalRegistros / $regsxpag);

            //Supervisamos si la inserción se realizó correctamente... 
            if ($resultsquery) :
                $return["correcto"] = TRUE;
                $return["datos"] = $resultsquery->fetchAll(PDO::FETCH_ASSOC);
                $return["datosPaginacion"] = $numeroPaginas;
            endif; // o no :(
        } catch (PDOException $ex) {
            $return["error"] = $ex->getMessage();
        }
        return $return;
    }

    public function listadoIncidenciasDepartamento($inicio, $regsxpag)
    {
        $return = [
            "correcto" => FALSE,
            "datos" => NULL,
            "datosPaginacion" => Null,
            "error" => NULL
        ];
        //Realizamos la consulta...
        try {  //Definimos la instrucción SQL  
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM incidencias ORDER BY `id_departamento` LIMIT $inicio, $regsxpag";
            // Hacemos directamente la consulta al no tener parámetros
            $resultsquery = $this->conexion->query($sql);

            // Para saber el número de páginas que hay
            $totalRegistros = $this->conexion->query("SELECT FOUND_ROWS() as total");
            $totalRegistros = $totalRegistros->fetch()["total"];
            $numeroPaginas = ceil($totalRegistros / $regsxpag);

            //Supervisamos si la inserción se realizó correctamente... 
            if ($resultsquery) :
                $return["correcto"] = TRUE;
                $return["datos"] = $resultsquery->fetchAll(PDO::FETCH_ASSOC);
                $return["datosPaginacion"] = $numeroPaginas;
            endif; // o no :(
        } catch (PDOException $ex) {
            $return["error"] = $ex->getMessage();
        }
        return $return;
    }

    public function listadoIncidencias($inicio, $regsxpag)
    {
        $return = [
            "correcto" => FALSE,
            "datos" => NULL,
            "datosPaginacion" => Null,
            "error" => NULL
        ];
        //Realizamos la consulta...
        try {  //Definimos la instrucción SQL  
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM incidencias LIMIT $inicio, $regsxpag";
            // Hacemos directamente la consulta al no tener parámetros
            $resultsquery = $this->conexion->query($sql);

            // Para saber el número de páginas que hay
            $totalRegistros = $this->conexion->query("SELECT FOUND_ROWS() as total");
            $totalRegistros = $totalRegistros->fetch()["total"];
            $numeroPaginas = ceil($totalRegistros / $regsxpag);

            //Supervisamos si la inserción se realizó correctamente... 
            if ($resultsquery) :
                $return["correcto"] = TRUE;
                $return["datos"] = $resultsquery->fetchAll(PDO::FETCH_ASSOC);
                $return["datosPaginacion"] = $numeroPaginas;
            endif; // o no :(
        } catch (PDOException $ex) {
            $return["error"] = $ex->getMessage();
        }
        return $return;
    }

    public function agregarUsuario($nif, $nombre, $apellido1, $apellido2, $email, $nombreUsuario, $passwordSegura, $telefonoMovil, $telefonoFijo, $departamento, $rol)
    {
        $return = [
            "correcto" => FALSE,
            "datos" => NULL,
            "error" => NULL
        ];
        try {
            $sql = "INSERT INTO usuarios (`id`, `Nif`, `Nombre`, `Apellido1`, `Apellido2`, `Email`, `NombreUsuario`, `PasswordSegura`, `TelefonoMovil`, `TelefonoFijo`, `Departamento`, `Aceptado`, `Rol`) VALUES (null,:nif,:nombre,:apellido1,:apellido2,:email,:nombreUsuario,:passwordSegura,:telefonoMovil,:telefonoFijo,:departamento, 1, :rol);";
            $query = $this->conexion->prepare($sql);
            $query->execute(['nif' => $nif, 'nombre' => $nombre, 'apellido1' => $apellido1, 'apellido2' => $apellido2, 'email' => $email, 'nombreUsuario' => $nombreUsuario, 'passwordSegura' => $passwordSegura, 'telefonoMovil' => $telefonoMovil, 'telefonoFijo' => $telefonoFijo, 'departamento' => $departamento, 'rol' => $rol]);

            if ($query) {
                $resultado = true;
            } else {
                $resultado = false;
            }
        } catch (PDOException $ex) {

            $resultado = $ex->getMessage();

            //$return["error"] = $ex->getMessage();

            //die();
        }
        return $resultado;
    }
    public function registro($nif, $nombre, $apellido1, $apellido2, $email, $nombreUsuario, $passwordSegura, $telefonoMovil, $telefonoFijo, $departamento)
    {
        $return = [
            "correcto" => FALSE,
            "datos" => NULL,
            "error" => NULL
        ];
        try {
            $sql = "INSERT INTO usuarios (`id`, `Nif`, `Nombre`, `Apellido1`, `Apellido2`, `Email`, `NombreUsuario`, `PasswordSegura`, `TelefonoMovil`, `TelefonoFijo`, `Departamento`, `Aceptado`, `Rol`) VALUES (null,:nif,:nombre,:apellido1,:apellido2,:email,:nombreUsuario,:passwordSegura,:telefonoMovil,:telefonoFijo,:departamento, 0, 0);";
            $query = $this->conexion->prepare($sql);
            $query->execute(['nif' => $nif, 'nombre' => $nombre, 'apellido1' => $apellido1, 'apellido2' => $apellido2, 'email' => $email, 'nombreUsuario' => $nombreUsuario, 'passwordSegura' => $passwordSegura, 'telefonoMovil' => $telefonoMovil, 'telefonoFijo' => $telefonoFijo, 'departamento' => $departamento]);

            if ($query) {
                $resultado = true;
            } else {
                $resultado = false;
            }
        } catch (PDOException $ex) {

            $resultado = $ex->getMessage();

            //$return["error"] = $ex->getMessage();

            //die();
        }
        return $resultado;
    }

    public function borrarUsuario($id)
    {
        $return = [
            "correcto" => FALSE,
            "datos" => NULL,
            "error" => NULL
        ];
        try {
            $sql = "DELETE FROM usuarios WHERE id=:id";
            $query = $this->conexion->prepare($sql);
            $query->execute(['id' => $id]);
            if ($query) {
                $return["correcto"] = TRUE;
            }
        } catch (PDOException $ex) {
            echo '<div class="alert alert-danger">' . "Ha ocurrido un error con la eliminación del usuario!! ):" . '</div>';
            header("Location:index.php?accion=listado");
        }
        return $return;
    }

    public function borrarIncidencia($id)
    {
        $return = [
            "correcto" => FALSE,
            "datos" => NULL,
            "error" => NULL
        ];
        try {
            $sql = "DELETE FROM incidencias WHERE id=:id";
            $query = $this->conexion->prepare($sql);
            $query->execute(['id' => $id]);
            if ($query) {
                $return["correcto"] = TRUE;
            }
        } catch (PDOException $ex) {
            echo '<div class="alert alert-danger">' . "Ha ocurrido un error con la eliminación de la incidencia!! ):" . '</div>';
            header("Location:index.php?accion=inicioLogueado");
        }
        return $return;
    }

    public function seleccionarUsuario($id){
        $return = [
            "correcto" => FALSE,
            "datos" => NULL,
            "error" => NULL
        ];
        $sql = "SELECT * FROM usuarios WHERE `id`=:id;";
        $query = $this->conexion->prepare($sql);
        // Ejecutamos y le pasamos los valores 
        $query->bindParam(':id', $id);
        $query->execute();
        $datos = $query->fetch(PDO::FETCH_OBJ);
        return $datos;
    }
    public function seleccionarIncidencia($id){
        $return = [
            "correcto" => FALSE,
            "datos" => NULL,
            "error" => NULL
        ];
        $sql = "SELECT * FROM incidencias WHERE `id`=:id;";
        $query = $this->conexion->prepare($sql);
        // Ejecutamos y le pasamos los valores 
        $query->bindParam(':id', $id);
        $query->execute();
        $datos = $query->fetch(PDO::FETCH_OBJ);
        return $datos;
    }
    
    public function validarLogin($usuario, $passwordlogin)
    {

        $return = [
            "correcto" => FALSE,
            "datos" => NULL,
            "error" => NULL
        ];

        //`id`, `Nif`, `Nombre`, `Apellido1`, `Apellido2`, `Email`, `NombreUsuario`, `PasswordSegura`, `TelefonoMovil`, `TelefonoFijo`, `Foto`, `Departamento`, `Aceptado`, `Rol`
        //try {
        /* 
            $stmt=$this->conexion->prepare("SELECT * FROM usuarios WHERE `NombreUsuario`=:usuario AND `PasswordSegura`=:passwordlogin;");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $resultado=$stmt; */

        $sql = "SELECT * FROM usuarios WHERE `NombreUsuario`=:usuario AND `PasswordSegura`=:passwordlogin;";
        $query = $this->conexion->prepare($sql);
        // Ejecutamos y le pasamos los valores 
        $query->bindParam(':usuario', $usuario);
        $query->bindParam(':passwordlogin', $passwordlogin);
        $query->execute();
        $datos = $query->fetch(PDO::FETCH_OBJ);
        //var_dump();
        //die();
        //var_dump($datos);
        //$resultado=$datos;
        //} catch (PDOException $ex) {
        //    $resultado= $ex->getMessage();
        //}
        return $datos;
    }

    public function editar($id, $nif, $nombre, $apellido1, $apellido2, $email, $nombreUsuario, $passwordSegura, $telefonoMovil, $telefonoFijo, $departamento, $aceptado, $rol)
    {
        $sql = "UPDATE usuarios SET Nif=:nif, Nombre=:nombre, Apellido1=:apellido1, Apellido2=:apellido2, Email=:email, NombreUsuario=:nombreUsuario, PasswordSegura=:passwordSegura, TelefonoMovil=:telefonoMovil, TelefonoFijo=:telefonoFijo, Departamento=:departamento, Aceptado=:aceptado, Rol=:rol WHERE id=:id";
        $query = $this->conexion->prepare($sql);
        $query->execute(['nif' => $nif, 'nombre' => $nombre, 'apellido1' => $apellido1, 'apellido2' => $apellido2, 'email' => $email, 'nombreUsuario' => $nombreUsuario, 'passwordSegura' => $passwordSegura, 'telefonoMovil' => $telefonoMovil, 'telefonoFijo' => $telefonoFijo, 'departamento' => $departamento, 'aceptado' => $aceptado, 'rol' => $rol, 'id' => $id]);
        if ($query) {
            $resultado = true;
        } else {
            $resultado = false;
        }
        return $resultado;
    }
    public function editarIncidencia($id, $mensaje, $estado){
        $sql="UPDATE incidencias SET mensaje=:mensaje, estado=:estado WHERE id=:id";
        $query = $this->conexion->prepare($sql);
        /* var_dump($query); */
        $query->execute(['id'=>$id, 'mensaje'=>$mensaje, 'estado'=>$estado]);
        
        if ($query) {
            $resultado = true;
        } else {
            $resultado = false;
        }
        return $resultado;
    }
    public function recuperarPassword($nif, $nombreUsuario, $email, $passwordSegura)
    {
        $return = [
            "correcto" => FALSE,
            "datos" => NULL,
            "error" => NULL
        ];
        try {  
            // Cambio de contraseña
            $sql = "UPDATE usuarios SET PasswordSegura=:passwordSegura WHERE (Nif=:nif AND NombreUsuario=:nombreUsuario AND Email=:email)";
            $resultsquery = $this->conexion->prepare($sql);
            $resultsquery->execute(['nif' => $nif, 'email' => $email, 'nombreUsuario' => $nombreUsuario, 'passwordSegura' => $passwordSegura]);

            // Seleccionamos el registro
            $sql="SELECT * FROM usuarios WHERE Nif=:nif AND NombreUsuario=:nombreUsuario AND Email=:email AND PasswordSegura=:passwordSegura";
            $resultado=$this->conexion->prepare($sql);
            $resultado->execute(['nif' => $nif, 'email' => $email, 'nombreUsuario' => $nombreUsuario, 'passwordSegura' => $passwordSegura]);

            // Comprobamos que existe el registro
            $resultado = $resultado->fetch(PDO::FETCH_OBJ);
            //Si existe el registro
            if ($resultado) :
                $return["correcto"] = TRUE;
            endif; // o no :(
        } catch (PDOException $ex) {
            $return["error"] = $ex->getMessage();
        }
        return $return;
    }
    public function enviarIncidencia($idProfesor, $idDepartamento, $mensaje, $estado)
    {
        $sql = "INSERT INTO incidencias (`id`, `id_profesor`, `id_departamento`, `mensaje`, `estado`, `fecha`) VALUES (null,:idProfesor,:idDepartamento,:mensaje,:estado, CURRENT_TIMESTAMP);";
        $query = $this->conexion->prepare($sql);
        $query->execute(['idProfesor' => $idProfesor, 'idDepartamento' => $idDepartamento, 'mensaje' => $mensaje, 'estado' => $estado]);
        if ($query) {
            $resultado = true;
        } else {
            $resultado = false;
        }
        return $resultado;
    }
    public function logEditar($idProfesor){
        $sql="INSERT INTO logs (`id`, `id_profesor`, `descripcion`, `fecha`) VALUES (null, :id, 'Ha editado un usuario', CURRENT_TIMESTAMP);";
        $query = $this->conexion->prepare($sql);
        $query->execute(["id"=>$idProfesor]);
        if($query){
            $resultado=true;
        }else{
            $resultado=false;
        }
        return $resultado;
    }
    public function logLogin($idProfesor){
        $sql="INSERT INTO logs (`id`, `id_profesor`, `descripcion`, `fecha`) VALUES (null, :id, 'Ha iniciado sesion', CURRENT_TIMESTAMP);";
        $query = $this->conexion->prepare($sql);
        $query->execute(["id"=>$idProfesor]);
        if($query){
            $resultado=true;
        }else{
            $resultado=false;
        }
        return $resultado;
    }
    public function logEliminarUsuario($idProfesor){
        $sql="INSERT INTO logs (`id`, `id_profesor`, `descripcion`, `fecha`) VALUES (null, :id, 'Ha eliminado un usuario', CURRENT_TIMESTAMP);";
        $query = $this->conexion->prepare($sql);
        $query->execute(["id"=>$idProfesor]);
        if($query){
            $resultado=true;
        }else{
            $resultado=false;
        }
        return $resultado;
    }
    /* public function logEliminarIncidencia($idProfesor){
        $sql="INSERT INTO logs (`id`, `id_profesor`, `descripcion`, `fecha`) VALUES (null, :id, 'Ha eliminado un usuario', CURRENT_DATE);";
        $query = $this->conexion->prepare($sql);
        $query->execute(["id"=>$idProfesor]);
        if($query){
            $resultado=true;
        }else{
            $resultado=false;
        }
        return $resultado;
    } */
    public function listadoPdf($tipo)
    {
        try {
            if ($tipo == "1") {
                $sql = "SELECT * FROM usuarios WHERE Aceptado = 1";
            }
            $query = $this->conexion->query($sql);

            //Supervisamos si la consulta se hizo correctamente
            if (isset($query)) {
                $listado = $query->fetchAll(PDO::FETCH_ASSOC);
                $contenido = "";
                $contenido .= '<h1>Listado de usuarios activos</h1><br>';

                $contenido .= '<table cellspacing="1" border="1">';
                $contenido .= '<tr>
                <th>NIF</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Nombre usuario</th>
                <th>Teléfono móvil</th>
                <th>Teléfono fijo</th>
                <th>Departamento</th>
                <th>Rol</th>
            </tr>';
                foreach ($listado as $u) {
                    $contenido .= '<tr class="table-info">
                <td>' . $u["Nif"] . '</td>
                <td>' . $u["Nombre"] . '</td>
                <td>' . $u["Apellido1"] . ' ' . $u["Apellido2"] . '</td>
                <td>' . $u["Email"] . '</td>
                <td>' . $u["NombreUsuario"] . '</td>
                <td>' . $u["TelefonoMovil"] . '</td>
                <td>' . $u["TelefonoFijo"] . '</td>';
                    if ($u["Departamento"] == 1) {
                        $contenido .= '<td>Informática</td>';
                    } else if ($u["Departamento"] == 2) {
                        $contenido .= '<td>Administración</td>';
                    } else {
                        $contenido .= '<td>Comercio</td>';
                    }
                    if ($u["Rol"] == 1) {
                        $contenido .= '<td>Administrador</td>';
                    } else {
                        $contenido .= '<td>Profesor</td>';
                    }
                    $contenido .= '</tr>';
                }
                $contenido .= '</table>';
            } else
                $contenido = false;
        } catch (PDOException $ex) {
            $contenido = $ex->getMessage();
        }

        return $contenido;
    }
}
