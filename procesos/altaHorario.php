<?php
    require '../MVC/controlador/Casignatura.php';
    require '../MVC/controlador/Chorario.php';

    $procesoAsignatura = new Casignatura();
    $procesoClase = new Chorario();

    $horas = [
        0 => "8:15-9:10",
        1 => "9:10-10:05",
        2 => "10:05-11:00",
        3 => "11:30-12:25",
        4 => "12:25-13:20",
        5 => "13:20-14:15",
        6 => "14:15-15:30"
    ];

    $idClase = 2;
    $asignaturas = $procesoAsignatura->obtenerAsignaturas();
    $profesores = $procesoAsignatura->obtenerProfesores();
    $asignaturas = $procesoClase->obtenerAsignaturasClase($idClase);
    include $procesoClase->vista;
?>