<?php
    require '../MVC/controlador/Casignatura.php';

    // Muestra el menú de seleccionar una clase para el alta del horario
    $proceso = new Casignatura();
    $clases = $proceso->obtenerClasesHorario();
    include $proceso->vista;
?>