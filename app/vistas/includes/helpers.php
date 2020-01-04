<?php

function mostrarError($errores,$campo,$booleano=false){
    $alerta='';
    if(isset($errores[$campo]) && !empty($campo))
    {
        if($booleano==true)
        {
             $alerta="<div class='alert alert-success'>".$errores[$campo]."</div>";
        }
        else
        {
          $alerta="<div class='alert alert-danger'>".$errores[$campo]."</div>";
        }
    }
    
    return $alerta;
}
function borrarErrores()
{
   
    return  $_SESSION['errores']=null;;
}
?>