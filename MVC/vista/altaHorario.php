<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="MVC/vista/style.css">
    <title>Alta Horario</title>
</head>
    <body>
        <h1>ALTA HORARIO</h1>
        <p>Se muestran las asignaturas de la clase</p>
        <form action="index.php?controlador=Chorario&metodo=introducirDatosHorario" method="POST">
        <?php
            echo '<input type="hidden" name="clase" value="' . $datos["clase"] . '">';
            echo '<p>Día actual: ' . $datos["dias"][$datos["dia"]] . '</p>';
            if ($datos["dia"] == "L") {
                for ($i = 1; $i <= 7; $i++) {
                    echo '<p>';
                        echo $i . 'a Hora ' . $datos["horas"][$i] . ' '; 
                        echo '<select name="asignaturas[]">';
                            foreach ($datos["asignaturas"] as $asignatura) {
                                echo '<option value="' . $asignatura["idAsignatura"] . '">' . $asignatura["codigo"] . '</option>';
                            }
                        echo '<input type="hidden" name="horas[]" value="' . $i . '">';
                        echo '</select>';
                    echo '</p>';
                }
            }

            else {
                for ($i = 1; $i <= 6; $i++) {
                    echo '<p>';
                        echo $i . 'a Hora ' . $datos["horas"][$i] . ' '; 
                        echo '<select name="asignaturas[]">';
                            foreach ($datos["asignaturas"] as $asignatura) {
                                echo '<option value="' . $asignatura["idAsignatura"] . '">' . $asignatura["codigo"] . '</option>';
                            }
                        echo '<input type="hidden" name="horas[]" value="' . $i . '">';
                        echo '</select>';
                    echo '</p>';
                }
            }
            
            if ($datos["dia"] != "V") {
                echo '<input type="hidden" name="dia" value="' . $datos["dia"] . '">';
                echo '<input type="hidden" name="siguienteDia" value="' . $datos["siguienteDia"] . '">';
                echo '<input type="submit" value="Siguiente"/>';
            }

            else {
                echo '<input type="hidden" name="dia" value="V">';
                echo '<input type="submit" value="Guardar horario"/>';
            }
        ?>
        </form>
        <a href="index.php?controlador=Cinicio&metodo=mostrarMenu">Volver</a>
    </body>
</html>