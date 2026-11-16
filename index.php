<?php
    $controlador = $_GET["controlador"] ?? 'Cinicio';
    $metodo = $_GET["metodo"] ?? 'mostrarMenu';

    require 'MVC/controlador/' . $controlador . '.php';
    $proceso = new $controlador();
    $datos = $proceso->$metodo();
    include $proceso->vista;
?>