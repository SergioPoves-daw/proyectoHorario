<?php
    $control = [
        "id" => $_GET["id"], // Recibe el ID de la asignatura
        "action" => $_GET["action"] // Puede recibir "m" o "e" según el <a> seleccionado
    ];

    if ($control["action"] == "m") { // Modificar
        header('Location: ../../index.php?controlador=Casignatura&metodo=obtenerAsignaturaModificar&id=' . $control["id"]);
    }

    if ($control["action"] == "e") { // Eliminar
        header('Location: ../../index.php?controlador=Casignatura&metodo=obtenerAsignaturaEliminar&id=' . $control["id"]);
    }
?>