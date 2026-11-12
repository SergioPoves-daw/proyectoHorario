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
            echo '<input type="hidden" name="clase" value="' . $idClase . '">';
            echo '<p>Día actual: Lunes</p>';
                for ($i = 0; $i < 7; $i++) {
                    echo '<p>';
                        echo $i+1 . 'a Hora ' . $horas[$i] . ' '; 
                        echo '<select name="asignatura[]">';
                            foreach ($asignaturas as $asignatura) {
                                echo '<option value="' . $asignatura["idAsignatura"] . '">' . $asignatura["codigo"] . '</option>';
                            }
                        echo '</select>';
                    echo '</p>';
                }
            ?>
            <input type="submit" value="Siguiente"/>
        </form>
        <a href="./..">Volver</a>
    </body>
</html>