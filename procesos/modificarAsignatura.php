<?php
    require '../MVC/controlador/Casignatura.php';

    // Lo recibe del form vista/formularioModificar.php
    $id = $_GET["id"];
    $nombre = $_POST["nombre"];
    $codigo = $_POST["codigo"];

    $proceso = new Casignatura();
    $proceso->modificarAsignatura($id, $nombre, $codigo);

    header("refresh:3 url=listarAsignaturas.php");
    echo '<p>' . $proceso->mensaje . '</p>';
?>