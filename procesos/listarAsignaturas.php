<?php
    require '../MVC/controlador/Casignatura.php';

    $proceso = new Casignatura();
    $asignaturas = $proceso->obtenerAsignaturas();
    include $proceso->vista;
?>