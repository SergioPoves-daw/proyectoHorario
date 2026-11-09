<?php
    require '../MVC/controlador/Casignatura.php';

    $id = $_GET["id"];

    $proceso = new Casignatura();
    $asignatura = $proceso->obtenerAsignatura($id, "e");
    include $proceso->vista;
?>