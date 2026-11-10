<?php
    require '../MVC/controlador/Casignatura.php';

    // Lo recibe del header de vista/control.php
    $id = $_GET["id"];

    // Muestra la asignatura a modificar, con sus datos
    $proceso = new Casignatura();
    $asignatura = $proceso->obtenerAsignaturaModificar($id);
    include $proceso->vista;
?>