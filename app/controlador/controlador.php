<?php

require_once 'modelo/modelo.php';
class controlador
{
    private $modelo;

    private $mensajes;

    public function __construct()
    {
        $this->modelo = new modelo();
        $this->mensajes = [];
    }

    /**
     * Método que envía al usuario a la página de login
     */
    public function index()
    {
        $parametros = ["tituloventana" => "Login"];
        $this->includes();
        include_once 'vistas/login.php';
    }

    public function recuperarPassword()
    {
        $parametros = ["tituloventana" => "Recuperar contraseña"];
        $this->includes();
        include_once 'vistas/vistaRecuperarContraseña.php';
    }
    // Página de registro
    public function registro()
    {
        $parametros = ["tituloventana" => "Registro"];
        $this->includes();
        include_once 'vistas/registro.php';
    }

    public function vistaEnviarIncidencias()
    {
        $parametros = ["tituloventana" => "Enviar incidencias"];
        $this->includes();
        include_once 'vistas/vistaIncidencias.php';
    }
    public function vistaInicioIncidencias()
    {
        $parametros = ["tituloventana" => "Enviar incidencias"];
        $this->includes();
        include_once 'vistas/vistaInicioIncidencias.php';
    }
    public function vistaPDF()
    {
        $parametros = ["tituloventana" => "Generar PDF"];
        $this->includes();
        include_once 'vistas/vistaPdf.php';
    }
    public function inicioLogueado()
    {
        $parametros = ["tituloventana" => "Inicio"];
        $this->includes();
        include_once 'vistas/inicio.php';
    }
    public function controlUsuarios()
    {
        $parametros = ["tituloventana" => "Control de usuarios"];
        $this->includes();
        include_once "vistas/vistaInicioUsuarios.php";
    }
    public function includes()
    {
        require_once 'vistas/includes/helpers.php';
    }
    public function editarUsuario()
    {
        $parametros = ["tituloventana" => "Editar"];
        $this->includes();

        // Guardamos el id que queremos editar para poder usarlo más adelante.
        $_SESSION["idEditar"] = $_GET["id"];

        // Intento de otra forma, para que salgan los campos del registro a editar
        $id = $_GET["id"];
        $resultado = $this->modelo->seleccionarUsuario($id);
        $_SESSION["editar"] = $resultado;
        include_once 'vistas/editarUsuario.php';
    }

    public function editarIncidencia(){
        $parametros = ["tituloventana" => "Editar"];
        $this->includes();

        // Guardamos el id que queremos editar para poder usarlo más adelante.
        /* $_SESSION["idEditar"] = $_GET["id"]; */

        // Intento de otra forma, para que salgan los campos del registro a editar
        $id = $_GET["id"];
        $resultado = $this->modelo->seleccionarIncidencia($id);
        $_SESSION["editar"] = $resultado;
        include_once 'vistas/editarIncidencia.php';
    }
    public function agregarUsuario()
    {
        $parametros = ["tituloventana" => "Agregar usuario"];
        $this->includes();
        include_once "vistas/agregarUsuario.php";
    }
    public function cerrarSesion()
    {
        session_destroy();
        if (isset($_SESSION)) {
            echo '<div class="alert alert-success">' .
                "Sesión cerrada correctamente :)" . '</div>';
        }
        $this->index();
    }

    public function listadoUsuariosAceptado()
    {
        // Almacenamos en el array 'parametros[]'los valores que vamos a mostrar en la vista
        $parametros = [
            "tituloventana" => "Listado de usuarios",
            "datos" => NULL,
            "datosPaginacion" => Null,
            "mensajes" => []
        ];

        //Establecemos el número de registros a mostrar por página,por defecto 5
        $regsxpag = (isset($_GET['regsxpag'])) ? (int) $_GET['regsxpag'] : 5;
        //Establecemos el la página que vamos a mostrar, por página,por defecto la 1
        $pagina = (isset($_GET['pagina'])) ? (int) $_GET['pagina'] : 1;

        //Definimos la variable $inicio que indique la posición del registro desde el que se
        // mostrarán los registros de una página dentro de la paginación.
        $inicio = ($pagina > 1) ? (($pagina * $regsxpag) - $regsxpag) : 0;


        // Realizamos la consulta y almacenmos los resultados en la variable $resultModelo
        $resultModelo = $this->modelo->listadoUsuariosAceptado($inicio, $regsxpag);
        // Si la consulta se realizó correctamente transferimos los datos obtenidos
        // de la consulta del modelo ($resultModelo["datos"]) a nuestro array parámetros
        // ($parametros["datos"]), que será el que le pasaremos a la vista para visualizarlos
        if ($resultModelo["correcto"]) :
            $parametros["datos"] = $resultModelo["datos"];
            $parametros["datosPaginacion"] = $resultModelo["datosPaginacion"];
            //Definimos el mensaje para el alert de la vista de que todo fue correctamente
            $this->mensajes[] = [
                "tipo" => "success",
                "mensaje" => "El listado se realizó correctamente"
            ];
        else :
            //Definimos el mensaje para el alert de la vista de que se produjeron errores al realizar el listado
            $this->mensajes[] = [
                "tipo" => "danger",
                "mensaje" => "El listado no pudo realizarse correctamente!! :( <br/>({$parametros["error"]})"
            ];
        endif;
        //Asignanis al campo 'mensajes' del array de parámetros el valor del atributo 
        //'mensaje', que recoge cómo finalizó la operación:
        $parametros["mensajes"] = $this->mensajes;
        // Incluimos la vista en la que visualizaremos los datos o un mensaje de error
        include_once 'vistas/vistaUsuariosListadoAceptado.php';
    }
    public function listadoUsuariosNombre()
    {
        // Almacenamos en el array 'parametros[]'los valores que vamos a mostrar en la vista
        $parametros = [
            "tituloventana" => "Listado de usuarios",
            "datos" => NULL,
            "datosPaginacion" => Null,
            "mensajes" => []
        ];

        //Establecemos el número de registros a mostrar por página,por defecto 5
        $regsxpag = (isset($_GET['regsxpag'])) ? (int) $_GET['regsxpag'] : 5;
        //Establecemos el la página que vamos a mostrar, por página,por defecto la 1
        $pagina = (isset($_GET['pagina'])) ? (int) $_GET['pagina'] : 1;

        //Definimos la variable $inicio que indique la posición del registro desde el que se
        // mostrarán los registros de una página dentro de la paginación.
        $inicio = ($pagina > 1) ? (($pagina * $regsxpag) - $regsxpag) : 0;


        // Realizamos la consulta y almacenmos los resultados en la variable $resultModelo
        $resultModelo = $this->modelo->listadoUsuariosNombre($inicio, $regsxpag);
        // Si la consulta se realizó correctamente transferimos los datos obtenidos
        // de la consulta del modelo ($resultModelo["datos"]) a nuestro array parámetros
        // ($parametros["datos"]), que será el que le pasaremos a la vista para visualizarlos
        if ($resultModelo["correcto"]) :
            $parametros["datos"] = $resultModelo["datos"];
            $parametros["datosPaginacion"] = $resultModelo["datosPaginacion"];
            //Definimos el mensaje para el alert de la vista de que todo fue correctamente
            $this->mensajes[] = [
                "tipo" => "success",
                "mensaje" => "El listado se realizó correctamente"
            ];
        else :
            //Definimos el mensaje para el alert de la vista de que se produjeron errores al realizar el listado
            $this->mensajes[] = [
                "tipo" => "danger",
                "mensaje" => "El listado no pudo realizarse correctamente!! :( <br/>({$parametros["error"]})"
            ];
        endif;
        //Asignanis al campo 'mensajes' del array de parámetros el valor del atributo 
        //'mensaje', que recoge cómo finalizó la operación:
        $parametros["mensajes"] = $this->mensajes;
        // Incluimos la vista en la que visualizaremos los datos o un mensaje de error
        include_once 'vistas/usuariosListadoNombre.php';
    }
    public function listadoUsuariosRol()
    {
        // Almacenamos en el array 'parametros[]'los valores que vamos a mostrar en la vista
        $parametros = [
            "tituloventana" => "Listado de usuarios",
            "datos" => NULL,
            "datosPaginacion" => Null,
            "mensajes" => []
        ];

        //Establecemos el número de registros a mostrar por página,por defecto 5
        $regsxpag = (isset($_GET['regsxpag'])) ? (int) $_GET['regsxpag'] : 5;
        //Establecemos el la página que vamos a mostrar, por página,por defecto la 1
        $pagina = (isset($_GET['pagina'])) ? (int) $_GET['pagina'] : 1;

        //Definimos la variable $inicio que indique la posición del registro desde el que se
        // mostrarán los registros de una página dentro de la paginación.
        $inicio = ($pagina > 1) ? (($pagina * $regsxpag) - $regsxpag) : 0;


        // Realizamos la consulta y almacenmos los resultados en la variable $resultModelo
        $resultModelo = $this->modelo->listadoUsuariosRol($inicio, $regsxpag);
        // Si la consulta se realizó correctamente transferimos los datos obtenidos
        // de la consulta del modelo ($resultModelo["datos"]) a nuestro array parámetros
        // ($parametros["datos"]), que será el que le pasaremos a la vista para visualizarlos
        if ($resultModelo["correcto"]) :
            $parametros["datos"] = $resultModelo["datos"];
            $parametros["datosPaginacion"] = $resultModelo["datosPaginacion"];
            //Definimos el mensaje para el alert de la vista de que todo fue correctamente
            $this->mensajes[] = [
                "tipo" => "success",
                "mensaje" => "El listado se realizó correctamente"
            ];
        else :
            //Definimos el mensaje para el alert de la vista de que se produjeron errores al realizar el listado
            $this->mensajes[] = [
                "tipo" => "danger",
                "mensaje" => "El listado no pudo realizarse correctamente!! :( <br/>({$parametros["error"]})"
            ];
        endif;
        //Asignanis al campo 'mensajes' del array de parámetros el valor del atributo 
        //'mensaje', que recoge cómo finalizó la operación:
        $parametros["mensajes"] = $this->mensajes;
        // Incluimos la vista en la que visualizaremos los datos o un mensaje de error
        include_once 'vistas/vistaUsuariosListadoRol.php';
    }
    public function logueado()
    {
        $this->includes();

        $usuarioValido = $this->validarLogin();


        if ($usuarioValido == true) {
            $usuario = $_POST["usuario"];
            $password = sha1($_POST["password"]);

            // Creamos la cookie si se ha marcado la casilla de recuérdame
            if (isset($_POST["recuerdo"]) && $_POST["recuerdo"] == "on") {
                setcookie("usuario", $_POST["usuario"], time() + (15 * 24 * 60 * 60));
                setcookie("password", $_POST["password"], time() + (15 * 24 * 60 * 60));
            }

            $resultado = $this->modelo->validarLogin($usuario, $password);
            if ($resultado->Rol === "0" || $resultado->Rol === "1") {
                if ($resultado->Aceptado == 1) {
                    $_SESSION["logueado"] = $resultado;
                    $this->logLogin();
                    $this->inicioLogueado();
                } else {
                    $_SESSION["errores"]["noaceptado"] = "Todavia no ha sido aceptado, espere.";
                    $this->index();
                }
            } else {
                $_SESSION["errores"]["noaceptado"] = "Error al loguearse, si el error persiste contacte con el administrador.";
                $this->index();
            }
        } else {
            $_SESSION["errores"]["noaceptado"] = "Compruebe que los datos son correctos.";
            $this->index();
        }
    }

    public function enviarUsuario()
    {
        $guardarUser = $this->validarAgregarUsuario();
        if ($guardarUser["valido"] == true) {
            $nif = $_POST["nif"];
            $nombre = $_POST["nombre"];
            $apellido1 = $_POST["apellido1"];
            $apellido2 = $_POST["apellido2"];
            $email = $_POST["email"];
            $nombreUsuario = $_POST["nombreUsuario"];
            $password = sha1($_POST["password"]);
            $telefonoMovil = $_POST["telefonoMovil"];
            $telefonoFijo = $_POST["telefonoFijo"];
            $departamento = $_POST["departamento"];
            $rol = $_POST["rol"];

            $resultado = $this->modelo->agregarUsuario($nif, $nombre, $apellido1, $apellido2, $email, $nombreUsuario, $password, $telefonoMovil, $telefonoFijo, $departamento, $rol);

            if ($resultado == true) {
                $_SESSION["errores"]["registrado"] = "<strong>Usuario añadido correctamente! :)</strong>";
                $this->agregarUsuario();
            } else {
                $this->agregarUsuario();
            }
        } else {
            $this->agregarUsuario();
        }
    }
    public function enviarRegistro()
    {

        $guardarUser = $this->validarRegistro();
        if ($guardarUser["valido"] == true) {
            $nif = $_POST["nif"];
            $nombre = $_POST["nombre"];
            $apellido1 = $_POST["apellido1"];
            $apellido2 = $_POST["apellido2"];
            $email = $_POST["email"];
            $nombreUsuario = $_POST["nombreUsuario"];
            $password = sha1($_POST["password"]);
            $telefonoMovil = $_POST["telefonoMovil"];
            $telefonoFijo = $_POST["telefonoFijo"];



            // Probando otra forma
            $departamento = $_POST["departamento"];
            $resultado = $this->modelo->registro($nif, $nombre, $apellido1, $apellido2, $email, $nombreUsuario, $password, $telefonoMovil, $telefonoFijo, $departamento);

            if ($resultado == true) {
                echo "<div class='alert alert-success'>Enhorabuena, te has registrado correctamente.</div>";
                $this->index();
            } else {
                $this->registro();
            }
        } else {
            $this->registro();
        }
    }

    public function enviarRecuperarPassword()
    {
        $guardarUser = $this->validarRecuperarPassword();
        if ($guardarUser["valido"] == true) {
            $nif = $_POST["nif"];
            $email = $_POST["email"];
            $usuario = $_POST["usuario"];
            $password = sha1($_POST["password"]);

            $resultado = $this->modelo->recuperarPassword($nif, $usuario, $email, $password);
            if ($resultado["correcto"]) {
                echo "<div class='alert alert-success'>Se ha modificado la contraseña.</div>";
                $this->recuperarPassword();
            } else {
                $_SESSION["errores"]["recuperado"] = "Compruebe que los datos son correctos.";
                $this->recuperarPassword();
            }
        } else {
            $_SESSION["errores"]["recuperado"] = "Los datos introducidos no son válidos.";
            $this->recuperarPassword();
        }
    }
    public function enviarIncidencia()
    {

        $idProfesor = $_SESSION["logueado"]->id;
        $mensaje = $_POST["mensaje"];
        $idDepartamento = $_POST["departamento"];
        $urgente = $_POST["estado"];
        $mensaje = trim($mensaje);
        $mensaje=str_replace("\r\n", "", $mensaje);
        if (isset($mensaje) && !empty($mensaje) && $mensaje != "") {

            $resultado = $this->modelo->enviarIncidencia($idProfesor, $idDepartamento, $mensaje, $urgente);
            if ($resultado) {
                echo "<div class='alert alert-success'>Se ha enviado correctamente.</div>";
                $this->vistaEnviarIncidencias();
            }
        } else {
            echo "<div class='alert alert-danger'>Ha ocurrido un error.</div>";
            $this->vistaEnviarIncidencias();
        }
    }
    public function enviarEditar()
    {
        $guardarUser = $this->validarEditar();
        if ($guardarUser["valido"] == true) {
            $id = $_SESSION["idEditar"];
            $nif = $_POST["nif"];
            $nombre = $_POST["nombre"];
            $apellido1 = $_POST["apellido1"];
            $apellido2 = $_POST["apellido2"];
            $email = $_POST["email"];
            $nombreUsuario = $_POST["nombreUsuario"];
            $password = sha1($_POST["password"]);
            $telefonoMovil = $_POST["telefonoMovil"];
            $telefonoFijo = $_POST["telefonoFijo"];

            // Asignamos el valor del departamento
            $departamento = $_POST["departamento"];
            // Aceptado
            if ($_POST["aceptado"] == 0) {
                $aceptado = 0; // No aceptado
            } else {
                // Aceptado
                $aceptado = 1;
            }
            // Rol
            if ($_POST["rol"] == 0) {
                $rol = 0; // Profesor
            } else {
                // Administrador
                $rol = 1;
            }
            $resultado = $this->modelo->editar($id, $nif, $nombre, $apellido1, $apellido2, $email, $nombreUsuario, $password, $telefonoMovil, $telefonoFijo, $departamento, $aceptado, $rol);

            if ($resultado == true) {
                $this->logEditar();
                $this->listadoUsuarios();
            } else {
                echo "Ha ocurrido un error editar :(";
                $this->listadoUsuarios();
            }
        } else {
            $this->listadoUsuarios();
        }
    }

    public function enviarEditarIncidencia(){
        $id=$_SESSION["editar"]->id;
        $mensaje=strip_tags($_POST["mensaje"]);
        var_dump($mensaje);
        /* $mensaje= "<script> $('#mensaje').ckeditor(); </script>"; */
        $estado=$_POST["estado"];
        $resultado=$this->modelo->editarIncidencia($id, $mensaje, $estado);
        if ($resultado == true) {
            // $this->logEditar();
            $this->listadoIncidencias();
        } else {
            echo "Ha ocurrido un error editar :(";
            $this->listadoIncidencias();
        }
    }
    public function borrarUsuario()
    {
        if (isset($_GET["id"]) && is_numeric($_GET["id"]) && $_SESSION["logueado"]->Rol == $_GET["id"]) {
            echo "<div class='alert alert-danger'>No puede borrar su usuario.</div>";
            $this->inicioLogueado();
        } elseif (isset($_GET["id"]) && is_numeric($_GET["id"]) && $_SESSION["logueado"]->Rol == 1) {
            $id = $_GET["id"];
            $resultModelo = $this->modelo->borrarUsuario($id);
            if ($resultModelo["correcto"]) {
                echo "<div class='alert alert-success'>Usuario borrado correctamente.</div>";
                $this->inicioLogueado();
                /* header("Location:index.php?accion=listado"); */
            } else {
                echo "<div class='alert alert-danger'>Ha ocurrido un error.</div>";
                $this->inicioLogueado();
            }
        } else {
            echo "<div class='alert alert-danger'>Ha ocurrido un error.</div>";
            $this->inicioLogueado();
        }
    }

    public function borrarIncidencia()
    {
        if (isset($_GET["id"]) && is_numeric($_GET["id"]) && $_SESSION["logueado"]->Rol == 1) {
            $id = $_GET["id"];
            $resultModelo = $this->modelo->borrarIncidencia($id);
            if ($resultModelo["correcto"]) {
                echo "<div class='alert alert-success'>Incidencia correctamente.</div>";
                $this->inicioLogueado();
                /* header("Location:index.php?accion=listado"); */
            } else {
                echo "<div class='alert alert-danger'>Ha ocurrido un error.</div>";
                $this->inicioLogueado();
            }
        }
    }
    public function listadoIncidencias()
    {
        $parametros = [
            "tituloventana" => "Listado de usuarios",
            "datos" => NULL,
            "datosPaginacion" => Null,
            "mensajes" => []
        ];
        $regsxpag = (isset($_GET['regsxpag'])) ? (int) $_GET['regsxpag'] : 5;
        $pagina = (isset($_GET['pagina'])) ? (int) $_GET['pagina'] : 1;
        $inicio = ($pagina > 1) ? (($pagina * $regsxpag) - $regsxpag) : 0;

        $resultModelo = $this->modelo->listadoIncidencias($inicio, $regsxpag);

        if ($resultModelo["correcto"]) :
            $parametros["datos"] = $resultModelo["datos"];
            $parametros["datosPaginacion"] = $resultModelo["datosPaginacion"];
            //Definimos el mensaje para el alert de la vista de que todo fue correctamente
            $this->mensajes[] = [
                "tipo" => "success",
                "mensaje" => "El listado se realizó correctamente"
            ];
        else :
            //Definimos el mensaje para el alert de la vista de que se produjeron errores al realizar el listado
            $this->mensajes[] = [
                "tipo" => "danger",
                "mensaje" => "El listado no pudo realizarse correctamente!! :( <br/>({$parametros["error"]})"
            ];
        endif;
        $parametros["mensajes"] = $this->mensajes;
        // Incluimos la vista en la que visualizaremos los datos o un mensaje de error
        include_once 'vistas/vistaListadoIncidencias.php';
    }

    public function listadoIncidenciasFecha()
    {
        $parametros = [
            "tituloventana" => "Listado de usuarios",
            "datos" => NULL,
            "datosPaginacion" => Null,
            "mensajes" => []
        ];
        $regsxpag = (isset($_GET['regsxpag'])) ? (int) $_GET['regsxpag'] : 5;
        $pagina = (isset($_GET['pagina'])) ? (int) $_GET['pagina'] : 1;
        $inicio = ($pagina > 1) ? (($pagina * $regsxpag) - $regsxpag) : 0;

        $resultModelo = $this->modelo->listadoIncidenciasFecha($inicio, $regsxpag);

        if ($resultModelo["correcto"]) :
            $parametros["datos"] = $resultModelo["datos"];
            $parametros["datosPaginacion"] = $resultModelo["datosPaginacion"];
            //Definimos el mensaje para el alert de la vista de que todo fue correctamente
            $this->mensajes[] = [
                "tipo" => "success",
                "mensaje" => "El listado se realizó correctamente"
            ];
        else :
            //Definimos el mensaje para el alert de la vista de que se produjeron errores al realizar el listado
            $this->mensajes[] = [
                "tipo" => "danger",
                "mensaje" => "El listado no pudo realizarse correctamente!! :( <br/>({$parametros["error"]})"
            ];
        endif;
        $parametros["mensajes"] = $this->mensajes;
        // Incluimos la vista en la que visualizaremos los datos o un mensaje de error
        include_once 'vistas/vistaListadoIncidenciasFecha.php';
    }

    public function listadoIncidenciasDepartamento()
    {
        $parametros = [
            "tituloventana" => "Listado de usuarios",
            "datos" => NULL,
            "datosPaginacion" => Null,
            "mensajes" => []
        ];
        $regsxpag = (isset($_GET['regsxpag'])) ? (int) $_GET['regsxpag'] : 5;
        $pagina = (isset($_GET['pagina'])) ? (int) $_GET['pagina'] : 1;
        $inicio = ($pagina > 1) ? (($pagina * $regsxpag) - $regsxpag) : 0;

        $resultModelo = $this->modelo->listadoIncidenciasDepartamento($inicio, $regsxpag);

        if ($resultModelo["correcto"]) :
            $parametros["datos"] = $resultModelo["datos"];
            $parametros["datosPaginacion"] = $resultModelo["datosPaginacion"];
            //Definimos el mensaje para el alert de la vista de que todo fue correctamente
            $this->mensajes[] = [
                "tipo" => "success",
                "mensaje" => "El listado se realizó correctamente"
            ];
        else :
            //Definimos el mensaje para el alert de la vista de que se produjeron errores al realizar el listado
            $this->mensajes[] = [
                "tipo" => "danger",
                "mensaje" => "El listado no pudo realizarse correctamente!! :( <br/>({$parametros["error"]})"
            ];
        endif;
        $parametros["mensajes"] = $this->mensajes;
        // Incluimos la vista en la que visualizaremos los datos o un mensaje de error
        include_once 'vistas/vistaListadoIncidenciasDepartamento.php';
    }

    public function listadoUsuarios()
    {
        // Almacenamos en el array 'parametros[]'los valores que vamos a mostrar en la vista
        $parametros = [
            "tituloventana" => "Listado de usuarios",
            "datos" => NULL,
            "datosPaginacion" => Null,
            "mensajes" => []
        ];

        //Establecemos el número de registros a mostrar por página,por defecto 2
        $regsxpag = (isset($_GET['regsxpag'])) ? (int) $_GET['regsxpag'] : 5;
        //Establecemos el la página que vamos a mostrar, por página,por defecto la 1
        $pagina = (isset($_GET['pagina'])) ? (int) $_GET['pagina'] : 1;

        //Definimos la variable $inicio que indique la posición del registro desde el que se
        // mostrarán los registros de una página dentro de la paginación.
        $inicio = ($pagina > 1) ? (($pagina * $regsxpag) - $regsxpag) : 0;


        // Realizamos la consulta y almacenmos los resultados en la variable $resultModelo
        $resultModelo = $this->modelo->listadoUsuarios($inicio, $regsxpag);
        // Si la consulta se realizó correctamente transferimos los datos obtenidos
        // de la consulta del modelo ($resultModelo["datos"]) a nuestro array parámetros
        // ($parametros["datos"]), que será el que le pasaremos a la vista para visualizarlos
        if ($resultModelo["correcto"]) :
            $parametros["datos"] = $resultModelo["datos"];
            $parametros["datosPaginacion"] = $resultModelo["datosPaginacion"];
            //Definimos el mensaje para el alert de la vista de que todo fue correctamente
            $this->mensajes[] = [
                "tipo" => "success",
                "mensaje" => "El listado se realizó correctamente"
            ];
        else :
            //Definimos el mensaje para el alert de la vista de que se produjeron errores al realizar el listado
            $this->mensajes[] = [
                "tipo" => "danger",
                "mensaje" => "El listado no pudo realizarse correctamente!! :( <br/>({$parametros["error"]})"
            ];
        endif;


        //Asignanis al campo 'mensajes' del array de parámetros el valor del atributo 
        //'mensaje', que recoge cómo finalizó la operación:
        $parametros["mensajes"] = $this->mensajes;
        // Incluimos la vista en la que visualizaremos los datos o un mensaje de error
        include_once 'vistas/listado.php';
    }

    public function validarLogin()
    {
        if (isset($_POST["acceder"])) {
            $errores = array();

            $usuario = $_POST["usuario"];
            $password = $_POST["password"];

            // Validar campo usuario
            if (!empty($usuario) && !is_numeric($usuario) && !preg_match("/[0-9]/", $usuario)) {
                $usuarioValido = true;
            } else {
                $usuarioValido = false;
                $errores["usuario"] = "El campo usuario contiene carácteres inadecuados.";
            }

            // Validar campo contraseña
            if (!empty($password) && !strlen($password) < 8 && preg_match("/[a-zA-Z ]/", $password) && preg_match("/[0-9]/", $password) && preg_match("/[@#-_%&^+=!?.,<>]/", $password)) {
                $passwordValido = true;
            } else {
                $passwordValido = false;
                $errores["password"] = "La contraseña no es valida";
            }

            // Comprobamos que ambos campos contiene los caracteres adecuados
            $usuarioValido = false;
            if (count($errores) == 0) {
                $usuarioValido = true;
            } else {
                $_SESSION["errores"] = $errores;
            }
        }
        return $usuarioValido;
    }
    public function validarRegistro()
    {
        if (isset($_POST)) {

            $errores = array();

            $nif = !empty($_POST["nif"]) ? $_POST["nif"] : false;
            $nombre = !empty($_POST["nombre"]) ? $_POST["nombre"] : false;
            $apellido1 = !empty($_POST["apellido1"]) ? $_POST["apellido1"] : false;
            $apellido2 = !empty($_POST["apellido2"]) ? $_POST["apellido2"] : false;
            $email = !empty($_POST["email"]) ? $_POST["email"] : false;
            $nombreUsuario = !empty($_POST["nombreUsuario"]) ? $_POST["nombreUsuario"] : false;
            $password = !empty($_POST["password"]) ? $_POST["password"] : false;
            $telefonoMovil = !empty($_POST["telefonoMovil"]) ? $_POST["telefonoMovil"] : false;
            $telefonoFijo = !empty($_POST["telefonoFijo"]) ? $_POST["telefonoFijo"] : false;
            $departamento = !empty($_POST["departamento"]) ? $_POST["departamento"] : false;


            //validar nif

            if (!empty($nif) &&  preg_match('/^[0-9]{8}[a-zA-Z]{1}$/', $nif)) {
                $nifValido = true;
            } else {
                $nifValido = false;
                $errores["nif"] = "El NIF introducido no es válido";
            }

            // Nombre
            if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
                $nombreValido = true;
            } else {
                $nombreValido = false;
                $errores["nombre"] = "El nombre introducido no es válido.";
            }
            // Primer apellido 
            if (!empty($apellido1) && !is_numeric($apellido1) && !preg_match("/[0-9]/", $apellido1)) {
                $apellido1Valido = true;
            } else {
                $apellido1Valido = false;
                $errores["apellido1"] = "El primer apellido introducido no es válido.";
            }
            // Segundo apellido
            if (!empty($apellido2) && !is_numeric($apellido2) && !preg_match("/[0-9]/", $apellido2)) {
                $apellido2Valido = true;
            } else {
                $apellido2Valido = false;
                $errores["apellido2"] = "El segundo apellido introducido no es válido.";
            }

            // Email
            if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $errores["email"] = "El email introducido no es válido";
                $emailValido = true;
            } else {
                $emailValido = false;
            }
            // Nombre de usuario
            if (!empty($nombreUsuario) && !is_numeric($nombreUsuario) && !preg_match("/[0-9]/", $nombreUsuario)) {
                $nombreUsuarioValido = true;
            } else {
                $nombreUsuarioValido = false;
                $errores["nombreUsuario"] = "El nombre de usuario introducido no es válido.";
            }
            // Password
            if (!empty($password) && !strlen($password) < 8 && preg_match("/[a-zA-Z ]/", $password) && preg_match("/[0-9]/", $password) && preg_match("/[@#-_%&^+=!?.,<>]/", $password)) {
                $passwordValido = true;
            } else {
                $passwordValido = false;
                $errores["password"] = "La contraseña no es valida";
            }
            // Telefono móvil
            if (!empty($telefonoMovil) && preg_match('/^[6-7][0-9]{8}$/', $telefonoMovil)) {
                $telefonoMovilValido = true;
            } else {
                $telefonoMovilValido = false;
                $errores["telefonoMovil"] = "El teléfono movil introducido no es válido";
            }
            // Telefojo fijo
            if (!empty($telefonoFijo) && preg_match('/^[9][0-9]{8}$/', $telefonoFijo)) {
                $telefonoFijoValido = true;
            } else {
                $telefonoFijoValido = false;
                $errores["telefonoFijo"] = "El teléfono fijo introducido no es válido";
            }

            $captcha = !empty($_POST["g-recaptcha-response"]) ? $_POST["g-recaptcha-response"] : false;
            $claveSecreta = "6LfhQMkUAAAAAO6kTV-AN59wpDTJTMNl_z6Ru6ql";

            // Verificar captcha
            if (!$captcha) {
                $errores["captcha"] = "Verifica el captcha";
            }

            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$claveSecreta&response=$captcha");

            $arr = json_decode($response, TRUE);
            if ($arr["success"]) {
            } else {
                $errores["captcha"] = "Error al comprobar el captcha";
            }

            $guardarUser = array();
            $guardarUser["valido"] = false;
            if (count($errores) == 0) {
                $guardarUser["valido"] = true;
            } else {
                $_SESSION["errores"] = $errores;
            }
        }
        return $guardarUser;
    }
    public function validarRecuperarPassword()
    {
        if (isset($_POST)) {
            $errores = array();
            $nif = !empty($_POST["nif"]) ? $_POST["nif"] : false;
            $email = !empty($_POST["email"]) ? $_POST["email"] : false;
            $nombreUsuario = !empty($_POST["usuario"]) ? $_POST["usuario"] : false;
            $password = !empty($_POST["password"]) ? $_POST["password"] : false;
            // Validamos los datos
            if (!empty($nif) &&  preg_match('/^[0-9]{8}[a-zA-Z]{1}$/', $nif)) {
                $nifValido = true;
            } else {
                $nifValido = false;
                $errores["nif"] = "El NIF introducido no es válido";
            }
            if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $errores["email"] = "El email introducido no es válido";
                $emailValido = true;
            } else {
                $emailValido = false;
            }
            if (!empty($nombreUsuario) && !is_numeric($nombreUsuario) && !preg_match("/[0-9]/", $nombreUsuario)) {
                $nombreUsuarioValido = true;
            } else {
                $nombreUsuarioValido = false;
                $errores["nombreUsuario"] = "El nombre de usuario introducido no es válido.";
            }
            if (!empty($password) && !strlen($password) < 8 && preg_match("/[a-zA-Z ]/", $password) && preg_match("/[0-9]/", $password) && preg_match("/[@#-_%&^+=!?.,<>]/", $password)) {
                $passwordValido = true;
            } else {
                $passwordValido = false;
                $errores["password"] = "La contraseña no es valida";
            }
            $guardarUser = array();
            $guardarUser["valido"] = false;
            if (count($errores) == 0) {
                $guardarUser["valido"] = true;
            } else {
                $_SESSION["errores"] = $errores;
            }
        }
        return $guardarUser;
    }
    public function validarAgregarUsuario()
    {
        if (isset($_POST)) {

            $errores = array();

            $nif = !empty($_POST["nif"]) ? $_POST["nif"] : false;
            $nombre = !empty($_POST["nombre"]) ? $_POST["nombre"] : false;
            $apellido1 = !empty($_POST["apellido1"]) ? $_POST["apellido1"] : false;
            $apellido2 = !empty($_POST["apellido2"]) ? $_POST["apellido2"] : false;
            $email = !empty($_POST["email"]) ? $_POST["email"] : false;
            $nombreUsuario = !empty($_POST["nombreUsuario"]) ? $_POST["nombreUsuario"] : false;
            $password = !empty($_POST["password"]) ? $_POST["password"] : false;
            $telefonoMovil = !empty($_POST["telefonoMovil"]) ? $_POST["telefonoMovil"] : false;
            $telefonoFijo = !empty($_POST["telefonoFijo"]) ? $_POST["telefonoFijo"] : false;
            $departamento = !empty($_POST["departamento"]) ? $_POST["departamento"] : false;


            //validar nif

            if (!empty($nif) &&  preg_match('/^[0-9]{8}[a-zA-Z]{1}$/', $nif)) {
                $nifValido = true;
            } else {
                $nifValido = false;
                $errores["nif"] = "El NIF introducido no es válido";
            }

            // Nombre
            if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
                $nombreValido = true;
            } else {
                $nombreValido = false;
                $errores["nombre"] = "El nombre introducido no es válido.";
            }
            // Primer apellido 
            if (!empty($apellido1) && !is_numeric($apellido1) && !preg_match("/[0-9]/", $apellido1)) {
                $apellido1Valido = true;
            } else {
                $apellido1Valido = false;
                $errores["apellido1"] = "El primer apellido introducido no es válido.";
            }
            // Segundo apellido
            if (!empty($apellido2) && !is_numeric($apellido2) && !preg_match("/[0-9]/", $apellido2)) {
                $apellido2Valido = true;
            } else {
                $apellido2Valido = false;
                $errores["apellido2"] = "El segundo apellido introducido no es válido.";
            }

            // Email
            if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $errores["email"] = "El email introducido no es válido";
                $emailValido = true;
            } else {
                $emailValido = false;
            }
            // Nombre de usuario
            if (!empty($nombreUsuario) && !is_numeric($nombreUsuario) && !preg_match("/[0-9]/", $nombreUsuario)) {
                $nombreUsuarioValido = true;
            } else {
                $nombreUsuarioValido = false;
                $errores["nombreUsuario"] = "El nombre de usuario introducido no es válido.";
            }
            // Password
            if (!empty($password) && !strlen($password) < 8 && preg_match("/[a-zA-Z ]/", $password) && preg_match("/[0-9]/", $password) && preg_match("/[@#-_%&^+=!?.,<>]/", $password)) {
                $passwordValido = true;
            } else {
                $passwordValido = false;
                $errores["password"] = "La contraseña no es valida";
            }
            // Telefono móvil
            if (!empty($telefonoMovil) && preg_match('/^[6-7][0-9]{8}$/', $telefonoMovil)) {
                $telefonoMovilValido = true;
            } else {
                $telefonoMovilValido = false;
                $errores["telefonoMovil"] = "El teléfono movil introducido no es válido";
            }
            // Telefojo fijo
            if (!empty($telefonoFijo) && preg_match('/^[9][0-9]{8}$/', $telefonoFijo)) {
                $telefonoFijoValido = true;
            } else {
                $telefonoFijoValido = false;
                $errores["telefonoFijo"] = "El teléfono fijo introducido no es válido";
            }


            $guardarUser = array();
            $guardarUser["valido"] = false;
            if (count($errores) == 0) {
                $guardarUser["valido"] = true;
            } else {
                $_SESSION["errores"] = $errores;
            }
        }
        return $guardarUser;
    }
    public function validarEditar()
    {
        if (isset($_POST)) {

            $errores = array();

            $nif = !empty($_POST["nif"]) ? $_POST["nif"] : false;
            $nombre = !empty($_POST["nombre"]) ? $_POST["nombre"] : false;
            $apellido1 = !empty($_POST["apellido1"]) ? $_POST["apellido1"] : false;
            $apellido2 = !empty($_POST["apellido2"]) ? $_POST["apellido2"] : false;
            $email = !empty($_POST["email"]) ? $_POST["email"] : false;
            $nombreUsuario = !empty($_POST["nombreUsuario"]) ? $_POST["nombreUsuario"] : false;
            $password = !empty($_POST["password"]) ? $_POST["password"] : false;
            $telefonoMovil = !empty($_POST["telefonoMovil"]) ? $_POST["telefonoMovil"] : false;
            $telefonoFijo = !empty($_POST["telefonoFijo"]) ? $_POST["telefonoFijo"] : false;
            $departamento = !empty($_POST["departamento"]) ? $_POST["departamento"] : false;


            //validar nif

            if (!empty($nif) &&  preg_match('/^[0-9]{8}[a-zA-Z]{1}$/', $nif)) {
                $nifValido = true;
            } else {
                $nifValido = false;
                $errores["nif"] = "El NIF introducido no es válido";
            }

            // Nombre
            if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
                $nombreValido = true;
            } else {
                $nombreValido = false;
                $errores["nombre"] = "El nombre introducido no es válido.";
            }
            // Primer apellido 
            if (!empty($apellido1) && !is_numeric($apellido1) && !preg_match("/[0-9]/", $apellido1)) {
                $apellido1Valido = true;
            } else {
                $apellido1Valido = false;
                $errores["apellido1"] = "El primer apellido introducido no es válido.";
            }
            // Segundo apellido
            if (!empty($apellido2) && !is_numeric($apellido2) && !preg_match("/[0-9]/", $apellido2)) {
                $apellido2Valido = true;
            } else {
                $apellido2Valido = false;
                $errores["apellido2"] = "El segundo apellido introducido no es válido.";
            }

            // Email
            if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $errores["email"] = "El email introducido no es válido";
                $emailValido = true;
            } else {
                $emailValido = false;
            }
            // Nombre de usuario
            if (!empty($nombreUsuario) && !is_numeric($nombreUsuario) && !preg_match("/[0-9]/", $nombreUsuario)) {
                $nombreUsuarioValido = true;
            } else {
                $nombreUsuarioValido = false;
                $errores["nombreUsuario"] = "El nombre de usuario introducido no es válido.";
            }
            // Password
            if (!empty($password) && !strlen($password) < 8 && preg_match("/[a-zA-Z ]/", $password) && preg_match("/[0-9]/", $password) && preg_match("/[@#-_%&^+=!?.,<>]/", $password)) {
                $passwordValido = true;
            } else {
                $passwordValido = false;
                $errores["password"] = "La contraseña no es valida";
            }
            // Telefono móvil
            if (!empty($telefonoMovil) && preg_match('/^[6-7][0-9]{8}$/', $telefonoMovil)) {
                $telefonoMovilValido = true;
            } else {
                $telefonoMovilValido = false;
                $errores["telefonoMovil"] = "El teléfono movil introducido no es válido";
            }
            // Telefojo fijo
            if (!empty($telefonoFijo) && preg_match('/^[9][0-9]{8}$/', $telefonoFijo)) {
                $telefonoFijoValido = true;
            } else {
                $telefonoFijoValido = false;
                $errores["telefonoFijo"] = "El teléfono fijo introducido no es válido";
            }
            $guardarUser = array();
            $guardarUser["valido"] = false;
            if (count($errores) == 0) {
                $guardarUser["valido"] = true;
            } else {
                $_SESSION["errores"] = $errores;
            }
        }
        return $guardarUser;
    }

    public function listadoLogsFecha()
    {
        // Almacenamos en el array 'parametros[]'los valores que vamos a mostrar en la vista
        $parametros = [
            "tituloventana" => "Listado de logs",
            "datos" => NULL,
            "datosPaginacion" => Null,
            "mensajes" => []
        ];

        //Establecemos el número de registros a mostrar por página,por defecto 5
        $regsxpag = (isset($_GET['regsxpag'])) ? (int) $_GET['regsxpag'] : 5;
        //Establecemos el la página que vamos a mostrar, por página,por defecto la 1
        $pagina = (isset($_GET['pagina'])) ? (int) $_GET['pagina'] : 1;

        //Definimos la variable $inicio que indique la posición del registro desde el que se
        // mostrarán los registros de una página dentro de la paginación.
        $inicio = ($pagina > 1) ? (($pagina * $regsxpag) - $regsxpag) : 0;


        // Realizamos la consulta y almacenmos los resultados en la variable $resultModelo
        $resultModelo = $this->modelo->listadoLogsFecha($inicio, $regsxpag);
        // Si la consulta se realizó correctamente transferimos los datos obtenidos
        // de la consulta del modelo ($resultModelo["datos"]) a nuestro array parámetros
        // ($parametros["datos"]), que será el que le pasaremos a la vista para visualizarlos
        if ($resultModelo["correcto"]) :
            $parametros["datos"] = $resultModelo["datos"];
            $parametros["datosPaginacion"] = $resultModelo["datosPaginacion"];
            //Definimos el mensaje para el alert de la vista de que todo fue correctamente
            $this->mensajes[] = [
                "tipo" => "success",
                "mensaje" => "El listado se realizó correctamente"
            ];
        else :
            //Definimos el mensaje para el alert de la vista de que se produjeron errores al realizar el listado
            $this->mensajes[] = [
                "tipo" => "danger",
                "mensaje" => "El listado no pudo realizarse correctamente!! :( <br/>({$parametros["error"]})"
            ];
        endif;
        //Asignanis al campo 'mensajes' del array de parámetros el valor del atributo 
        //'mensaje', que recoge cómo finalizó la operación:
        $parametros["mensajes"] = $this->mensajes;
        // Incluimos la vista en la que visualizaremos los datos o un mensaje de error
        include_once 'vistas/vistaLogsListadoFecha.php';
    }
    public function logEditar(){
        $id=$_SESSION["logueado"]->id;
        $result=$this->modelo->logEditar($id);
    }
    public function logLogin(){
        $id=$_SESSION["logueado"]->id;
        $result=$this->modelo->logLogin($id);
    }
    public function logEliminar(){
        $id=$_SESSION["logueado"]->id;
        $result=$this->modelo->logEliminarUsuario($id);
    }
    public function listadoPdf()
    {
        require_once 'pdf/vendor/autoload.php';
        ob_start();
        $content = $this->modelo->listadoPdf($_GET['aceptado']);


        $html2pdf = new Spipu\Html2Pdf\Html2Pdf('L', 'A4', 'es', true, 'UTF-8'); // L para que sea horizontal, P para que sea vertical
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content);
        $path='PracticaPHP/';
        $html2pdf->output($_SERVER['DOCUMENT_ROOT'].'/'. $path .'listado.pdf', 'F');
        header("Location: ../listado.pdf");
    }
}
