<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <div>
        <?php include_once 'includes/navbar.php' ?>
        <br>
        <div class="container text-center">

            <h2>Enviar Incidencias</h2>
            <form action="index.php?accion=enviarIncidencia" method="POST">
                <div class="form-group">
                    <label for="mensaje">Descripción:</label><br />
                    <script>
                        $(document).ready(function() {
                            $('#mensaje').keypress(function(event) {

                                if (event.keyCode == 13) {
                                    event.preventDefault();
                                }
                            });
                        });
                    </script>
                    <textarea cols="59" rows="6" id="mensaje" name="mensaje" maxlength="245" required ></textarea>
                </div>
                <div class="form-group">
                    <label for="departamento">Departamento:</label><br />
                    <select name="departamento">
                        <option value="1" selected>Informática</option>
                        <option value="2">Administración</option>
                        <option value="3">Comercio</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="estado">Urgencia:</label><br />
                    <select name="estado">
                        <option value="No urgente" selected>No urgente</option>
                        <option value="Urgente">Urgente</option>
                    </select>
                </div>
                <input type="submit" value="Enviar" name="enviar" class="btn btn-success" />
            </form>
        </div>
    </div>
</body>

</html>