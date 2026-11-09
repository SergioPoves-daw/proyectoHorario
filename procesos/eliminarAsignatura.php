<?php
    require '../MVC/controlador/Casignatura.php';

    $id = $_GET["id"];

    $proceso = new Casignatura();
    $proceso->eliminarAsignatura($id);
       
    header("refresh: 3 url=listarAsignaturas.php");
    echo '<p>' . $proceso->mensaje . '</p>';
?>