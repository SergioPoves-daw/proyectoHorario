<?php
    require '../MVC/controlador/Casignatura.php';

    $proceso = new Casignatura();
    $clases = $proceso->obtenerClasesHorario();
    include $proceso->vista;
?>