<?php
    require '../MVC/controlador/Casignatura.php';

    // Recibe la información del formulario y manda la información al controlador
    if (isset($_POST["nombre"])) $nombre = $_POST["nombre"];
    if (isset($_POST["codigo"])) $codigo = $_POST["codigo"];
    if (isset($_POST["profesor"])) $profesor = $_POST["profesor"];
    if (isset($_POST["clase"])) $clase = $_POST["clase"];

    $proceso = new Casignatura();
    if ($nombre && $codigo && $profesor && $clase) {
        $proceso->insertarAsignatura($nombre, $codigo, $profesor, $clase);
    } 
    else $proceso->mensaje = "Formulario vacío no válido";

    header("refresh: 3 url=listarAsignaturas.php");
    echo '<p>' . $proceso->mensaje . '</p>';
?>