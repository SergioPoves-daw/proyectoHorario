<?php
    require '../MVC/controlador/Casignatura.php';

    // Muestra la asignatura a modificar, con sus datos
    $proceso = new Casignatura();
    $asignatura = $proceso->obtenerAsignaturaModificar();
    include $proceso->vista;
?>