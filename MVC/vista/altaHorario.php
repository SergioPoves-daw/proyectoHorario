<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../vista/style.css">
    <title>Alta Horario</title>
</head>
    <body>
        <h1>ALTA HORARIO</h1>
        <p>Se muestran las asignaturas de la clase</p>
        <form action="" method="GET">
            <p>Día actual: Lunes</p>

            <?php
                $horas = [
                    0 => "8:15-9:10",
                    1 => "9:10-10:05",
                    2 => "10:05-11:00",
                    3 => "11:30-12:25",
                    4 => "12:25-13:20",
                    5 => "13:20-14:15",
                    6 => "14:15-15:30"
                ];

                for ($i = 0; $i < 7; $i++) {
                    echo '<p>';
                        echo $i+1 . 'a Hora ' . $horas[$i] . ' '; 
                        echo '<select name="' . $i . '">';
                            foreach ($asignaturas as $asignatura) {
                                echo '<option>' . $asignatura["codigo"] . '</option>';
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