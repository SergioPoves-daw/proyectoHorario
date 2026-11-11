<?php
    require '../MVC/controlador/Casignatura.php';

    // Elimina la asignatura y muestra el mensaje de validación
    $proceso = new Casignatura();
    $proceso->eliminarAsignatura();
    include $proceso->vista;
?>