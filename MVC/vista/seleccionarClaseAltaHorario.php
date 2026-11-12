<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="MVC/vista/style.css">
        <title>Seleccionar clase</title>
    </head>
    <body>
        <h1>SELECCIONAR CLASE PARA ASIGNAR HORARIO</h1>
        <form action="index.php?controlador=Chorario&metodo=introducirDatosHorario" method="POST">
            <p>Clases:</p>
            <select name="clase">
            <?php
                foreach ($clases as $clase) {
                    echo '<option value=' . $clase["idClase"] . '>' . $clase["nombre"] . '</option>';
                }
            ?>
            </select>
            <br/><br/>
            <input type="submit" value="Continuar">
        </form>
    </body>
</html>