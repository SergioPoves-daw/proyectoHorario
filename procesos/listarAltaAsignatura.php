<?php
    require '../MVC/controlador/Casignatura.php';

    // Muestra el formulario con los select dinámicos
    $proceso = new Casignatura();
    $profesores = $proceso->obtenerProfesores();
    $clases = $proceso->obtenerClases(); // No puede ser 2 controladores en 1 proceso
    include $proceso->vista;
?>