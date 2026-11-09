<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar asignatura</title>
    <link rel="stylesheet" href="../MVC/vista/style.css">
</head>
<body>
    <h1>Eliminar asignatura</h1>
    <?php
        echo '<p>¿Estás seguro de que quieres eliminar la asignatura ' . $asignatura["nombre"] . '?</p>';
        echo '<a href="../procesos/eliminarAsignatura.php?id=' . $id . '">Si</a>';
    ?>
    <a href="../procesos/listarAsignaturas.php">No</a>
</body>
</html>