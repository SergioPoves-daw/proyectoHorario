<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar fila</title>
    <link rel="stylesheet" href="../MVC/vista/style.css"/>
</head>
<body>
    <h1>Modificar asignatura</h1>
    <?php
    // Usar el id recibido del <a> en el form para que modificar.php sepa a qué fila (id) referirse
    echo '<form action="../procesos/modificarAsignatura.php?id=' . $asignatura["idAsignatura"] . '" method="POST">';
        echo '<p>ID: ' . $asignatura["idAsignatura"] . '</p>';

        // Valor por defecto el nombre de la asignatura
        echo '<label for="nombre">Nombre: </label>';
        echo '<input type="text" id="nombre" name="nombre" size=30 value="'. $asignatura["nombre"] . '"/>';

        echo '<br/><br/>';
        
        // Valor por defecto el color de la asignatura
        echo '<label for="codigo">Código: </label>';
        echo '<input type="text" id="codigo" name="codigo" maxlength=7 value="'. $asignatura["codigo"] . '"/>';
    ?>
        <br/><br/>
        <input type="submit" value="Modificar asignatura">
    </form>
</body>
</html>