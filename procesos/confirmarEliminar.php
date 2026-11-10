<?php
    require '../MVC/controlador/Casignatura.php';

    // Lo recibe del header de vista/control.php
    $id = $_GET["id"];

    // Muestra la confirmación de eliminación de asignatura
    $proceso = new Casignatura();
    $asignatura = $proceso->obtenerAsignaturaEliminar($id);
    include $proceso->vista;
?>