
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
    <title></title>
</head>

<body>
    <?php
    session_start();
    require_once 'controlador/controlador.php';
    //Definimos un objeto controlador
    $controlador = new controlador();
    if ($_GET && $_GET["accion"]) :
        //Sanitizamos los datos que recibamos mediante el GET
        $accion = filter_input(INPUT_GET, "accion", FILTER_SANITIZE_STRING);
        //Verificamos que el objeto controlador que hemos creado implementa el
        //método que le hemos pasado mediante GET
        if (method_exists($controlador, $accion)) :
            $controlador->$accion(); //Ejecutamos la operación indicada en $accion
        else :
            $controlador->index(); //Redirigimos a la página de inicio
        endif;
    else :
        $controlador->index(); // Redirigimos a la página de inicio inicialmente
    endif;
    ?>
</body>

</html>