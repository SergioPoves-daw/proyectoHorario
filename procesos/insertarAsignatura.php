<?php
    require '../MVC/controlador/Casignatura.php';

    // Inserta la asignatura y muestra el mensaje de validación
    $proceso = new Casignatura();
    $proceso->insertarAsignatura();
    include $proceso->vista;
?>