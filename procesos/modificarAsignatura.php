<?php
    require '../MVC/controlador/Casignatura.php';

    // Hace la función de modificar los datos de la BD
    $proceso = new Casignatura();
    $proceso->modificarAsignatura();
    include $proceso->vista;
?>