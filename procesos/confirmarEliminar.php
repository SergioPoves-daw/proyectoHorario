<?php
    require '../MVC/controlador/Casignatura.php';

    // Muestra la confirmación de eliminación de asignatura
    $proceso = new Casignatura();
    $asignatura = $proceso->obtenerAsignaturaEliminar();
    include $proceso->vista;
?>