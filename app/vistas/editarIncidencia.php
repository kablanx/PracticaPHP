<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <div>
        <?php include_once 'includes/navbar.php' ?>
        <br>
        <div class="container text-center">

            <h2>Editar incidencia</h2>
            <form action="index.php?accion=enviarEditarIncidencia" method="POST">
                <div class="form-group">
                    <label for="mensaje">Descripción:</label><br />
                    
                    <textarea cols="59" rows="6" id="mensaje" name="mensaje" maxlength="245" required ><?php echo $_SESSION["editar"]->mensaje?></textarea>
                    
                </div>
                <!-- <div class="form-group">
                    <label for="departamento">Departamento:</label><br />
                    <select name="departamento">
                        <option value="1" selected>Informática</option>
                        <option value="2">Administración</option>
                        <option value="3">Comercio</option>
                    </select>
                </div> -->
                <div class="form-group">
                    <label for="estado">Urgencia:</label><br />
                    <select name="estado" id="estado">
                        <option value="No urgente" selected>No urgente</option>
                        <option value="Urgente">Urgente</option>
                    </select>
                </div>
                <input type="submit" value="Enviar" name="enviar" class="btn btn-success" />
            </form>
        </div>
    </div>
    
    <script type="text/javascript">

        ClassicEditor
            .create(document.querySelector('#mensaje') )
            .catch(error=>{
                console.error(error);
            });

            /* {
                alignment:{ options: ['center'] },
                
            }
        );
        CKEDITOR.replace('#mensaje');
timer=setInterval(updateDiv,100);
function updateDiv(){
    var editorText=CKEDITOR.instances['mensaje'].getData(); */
    //$('#prueba').html(editorText);
//}
        /* CKEDITOR.replace('#mensaje'); */
        /* $('#mensaje').ckeditor(); */
    </script>
    <!-- <script>
                        $(document).ready(function() {
                            $('#mensaje').keypress(function(event) {

                                if (event.keyCode == 13) {
                                    event.preventDefault();
                                }
                            });
                        });
    </script> -->
</body>

</html>