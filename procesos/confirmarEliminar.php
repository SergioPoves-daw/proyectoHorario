<?php
    require '../MVC/controlador/Casignatura.php';

    $id = $_GET["id"];

    $proceso = new Casignatura();
    $asignatura = $proceso->obtenerAsignaturaEliminar($id);
    include $proceso->vista;
?>