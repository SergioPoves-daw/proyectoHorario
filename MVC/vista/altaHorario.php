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

            // Almacenar datos guardados anteriormente y enviar datos anteriores y nuevos al array
            // Guarda día a día. Ej: Lunes genera 7 entradas (7 horas) cada una con su asignatura, dia, hora, etc...
            // Accede al valor almacenado anteriormente con $i (índice asignado en el controlador, aquí solo accede)    
            foreach ($datos["horario"] as $i => $consulta) {
                echo '<input type="hidden" name="horario[' . $i . '][clase]" value="' . $consulta["clase"] . '">';
                echo '<input type="hidden" name="horario[' . $i . '][asignatura]" value="' . $consulta["asignatura"] . '">';
                echo '<input type="hidden" name="horario[' . $i . '][profesor]" value="' . $consulta["profesor"] . '">';
                echo '<input type="hidden" name="horario[' . $i . '][dia]" value="' . $consulta["dia"] . '">';
                echo '<input type="hidden" name="horario[' . $i . '][hora]" value="' . $consulta["hora"] . '">';
            }

            echo '<p>Día actual: ' . $datos["dias"][$datos["dia"]] . '</p>';

            $numHoras = 6;
            if ($datos["dia"] == "L") {
                $numHoras = 7;
            }

            for ($i = 1; $i <= $numHoras; $i++) {
                echo '<p>';
                echo $i . 'a Hora ' . $datos["horas"][$i] . ' ';
                echo '<select name="asignaturas[]">';
                foreach ($datos["asignaturas"] as $asignatura) {
                    echo '<option value="' . $asignatura["idAsignatura"] . '">' . $asignatura["codigo"] . '</option>';
                }
                echo '</select>';
                echo '<input type="hidden" name="horas[]" value="' . $i . '">';
                echo '</p>';
            }
            
            echo '<input type="hidden" name="dia" value="' . $datos["dia"] . '">';

        if ($datos["dia"] != "V") {
            echo '<input type="submit" value="Siguiente">';
        } 
        else {
            echo '<input type="submit" value="Guardar horario">';
        }
        ?>
        </form>
        <a href="index.php?controlador=Cinicio&metodo=mostrarMenu">Volver</a>
    </body>
</html>