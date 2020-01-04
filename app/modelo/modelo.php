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
            echo '<div class="alert alert-success">' .
                "Conectado a la Base de Datos de usuarios!! :)" . '</div>';
            $return = TRUE;
        } catch (PDOException $ex) {
            echo '<div class="alert alert-danger">' .
                "No se ha conectado a la base de datos :(" . '</div>';
            $return = $ex->getMessage();
        }
        return $return;
    }

    public function listado()
    {
        $return = [
            "correcto" => FALSE,
            "datos" => NULL,
            "error" => NULL
        ];
        //Realizamos la consulta...
        try {  //Definimos la instrucción SQL  
            $sql = "SELECT * FROM usuarios";
            // Hacemos directamente la consulta al no tener parámetros
            $resultsquery = $this->conexion->query($sql);
            //Supervisamos si la inserción se realizó correctamente... 
            if ($resultsquery) :
                $return["correcto"] = TRUE;
                $return["datos"] = $resultsquery->fetchAll(PDO::FETCH_ASSOC);
            endif; // o no :(
        } catch (PDOException $ex) {
            $return["error"] = $ex->getMessage();
        }
        return $return;
    }

    public function registro($nif, $nombre, $apellido1, $apellido2, $email, $nombreUsuario, $passwordSegura, $telefonoMovil, $telefonoFijo, $departamento)
    {
        $return = [
            "correcto" => FALSE,
            "datos" => NULL,
            "error" => NULL
        ];
        try {
            $sql = "INSERT INTO usuarios (`id`, `Nif`, `Nombre`, `Apellido1`, `Apellido2`, `Email`, `NombreUsuario`, `PasswordSegura`, `TelefonoMovil`, `TelefonoFijo`, `Foto`, `Departamento`, `Aceptado`, `Rol`) VALUES (null,:nif,:nombre,:apellido1,:apellido2,:email,:nombreUsuario,:passwordSegura,:telefonoMovil,:telefonoFijo,'No hay foto todavia',:departamento, 0, 0);";
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

    public function listadoPdf($tipo)
    {
        try {
            if ($tipo == "1") {
                $sql = "SELECT * FROM usuarios WHERE Aceptado = 1";
            } else {
                $sql = "SELECT * FROM usuarios WHERE Aceptado = 0";
            }
            $query = $this->conexion->query($sql);

            //Supervisamos si la consulta se hizo correctamente
            if (isset($query)) {
                $listado = $query->fetchAll(PDO::FETCH_ASSOC);
                $contenido = "";
                if ($tipo == "1") :
                    $contenido .= '<h1>Listado de usuarios activos</h1><br>';
                else :
                    $contenido .= '<h1>Listado de usuarios inactivos</h1><br>';
                endif;
                $contenido .= '<table cellspacing="1" border="1">';
                $contenido .= '<tr>
                <th>NIF</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Móvil</th>
                            <th>Email</th>
                            <th>Departamento</th>
                <th>Tipo de Usuario</th>
                <th>UsuarioLogin</th>
                
                
            </tr>';
                foreach ($listado as $u) {
                    $contenido .= '<tr class="table-info">
                <td>' . $u["Nif"] . '</td>
                <td>' . $u["Nombre"] . '</td>
                <td>' . $u["Apellido1"] . ' ' . $u["Apellido2"] . '</td>
                
                            <td>' . $u["Email"] . '</td>
                            
                <td>' . $u["NombreUsuario"] . '</td>
                <td>' . $u["TelefonoMovil"] . '</td>
                <td>' . $u["TelefonoFijo"] . '</td>
                <td>' . $u["Departamento"] . '</td>
                </tr>';
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
