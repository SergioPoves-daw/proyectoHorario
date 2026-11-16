<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar asignatura</title>
    <link rel="stylesheet" href="MVC/vista/style.css">
</head>
<body>
    <h1>Eliminar asignatura</h1>
    <?php
        echo '<p>¿Estás seguro de que quieres eliminar la asignatura ' . $datos["nombre"] . '?</p>';
        echo '<a href="index.php?controlador=Casignatura&metodo=eliminarAsignatura&id=' . $datos["idAsignatura"] . '">Si</a>';
    ?>
    <a href="index.php?controlador=Casignatura&metodo=obtenerAsignaturas";>No</a>
</body>
</html>