<?php
    require '../MVC/controlador/Casignatura.php';

    // Muestra el formulario con los select dinámicos
    $proceso = new Casignatura();
    $clasesProfesores = $proceso->obtenerClasesYProfesores();
    include $proceso->vista;
?>