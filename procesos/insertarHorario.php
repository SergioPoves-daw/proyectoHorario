<?php
    require '../MVC/controlador/Casignatura.php';
    require '../MVC/controlador/Chorario.php';

    $proceso = new Casignatura();
    $asignaturas = $proceso->obtenerAsignaturas();
    $profesores = $proceso->obtenerProfesores();
    $proceso->vista = '../MVC/vista/altaHorario.php';
    include $proceso->vista;
?>