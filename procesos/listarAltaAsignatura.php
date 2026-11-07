<?php
    require '../MVC/controlador/Casignatura.php';

    // Muestra el formulario con los select dinámicos
    $proceso = new Casignatura();
    $profesores = $proceso->obtenerProfesores();
    $clases = $proceso->obtenerClases();
    include $proceso->vista;
?>