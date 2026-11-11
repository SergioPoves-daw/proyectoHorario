<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Añadir fila</title>
        <link rel="stylesheet" href="../MVC/vista/style.css"/>
    </head>
    <body>
        <h1>Añadir asignatura</h1>
        <form action="insertarAsignatura.php" method="POST">
            <label for="nombre">Asignatura: </label>
            <input type="text" id="nombre" size=30 name="nombre"/><br/><br/>

            <label for="codigo">Código: </label>
            <input type="text" id="codigo" name="codigo" maxlength=7/><br/><br/>

            <?php
                echo '<label for="profesor">Profesor: </label>';
                echo '<select id="profesor" name="profesor">';
                    foreach ($clasesProfesores["profesores"] as $profesor) {
                        echo '<option value="' . $profesor["idProfesor"] . '">' . $profesor["nombre"] . '</option>';
                    }
                echo '</select>';
                echo '</br></br>';

                echo '<label for="clase">Clase: </label>';
                echo '<select id="clase" name="clase">';
                    foreach ($clasesProfesores["clases"] as $clase) {
                        echo '<option value="' . $clase["idClase"] . '">' . $clase["nombre"] . '</option>';
                    }
                echo '</select>';
                
                echo '<br/><br/>';
            ?>

            <input type="submit" value="Añadir">
        </form>
        <a href="listarAsignaturas.php">Volver</a>
    </body>
</html>