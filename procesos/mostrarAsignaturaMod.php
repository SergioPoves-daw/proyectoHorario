<?php
    require '../MVC/controlador/Casignatura.php';

    // Lo recibe por control.php
    $id = $_GET["id"];

    $proceso = new Casignatura();
    $asignatura = $proceso->obtenerAsignaturaModificar($id);
    include $proceso->vista;
?>