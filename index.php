<?php
    require_once 'MVC/controlador/config.php';

    if (isset($_GET["controlador"])) $controlador = $_GET["controlador"]; else $controlador = CONTROLADOR;
    if (isset($_GET["metodo"])) $metodo = $_GET["metodo"]; else $metodo = METODO;

    require_once 'MVC/controlador/' . $controlador . '.php';
    $proceso = new $controlador();
    $datos = $proceso->$metodo();
    include $proceso->vista;
?>