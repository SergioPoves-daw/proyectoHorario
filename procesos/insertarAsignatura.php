<?php
    require '../MVC/controlador/Casignatura.php';

    // Recibe la información del formulario de vista/formularioInsertar.php y manda la información al controlador
    $nombre = $_POST["nombre"];
    $codigo = $_POST["codigo"];
    $profesor = $_POST["profesor"];
    $clase = $_POST["clase"];

    // Inserta la asignatura y muestra el mensaje de validación
    $proceso = new Casignatura();
    $proceso->insertarAsignatura($nombre, $codigo, $profesor, $clase);
    echo '<p>' . $proceso->mensaje . '</p>';
?>