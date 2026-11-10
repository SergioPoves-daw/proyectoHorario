<?php
    require '../MVC/controlador/Casignatura.php';

    // Muestra la lista de todas las asignaturas
    $proceso = new Casignatura();
    $asignaturas = $proceso->obtenerAsignaturas();
    include $proceso->vista;
?>