<?php
    require '../MVC/controlador/Casignatura.php';

    // Lo recibe del <a href> de vista/confirmarEliminar.php
    $id = $_GET["id"];

    // Elimina la asignatura y muestra el mensaje de validación
    $proceso = new Casignatura();
    $proceso->eliminarAsignatura($id);
    echo '<p>' . $proceso->mensaje . '</p>';
?>