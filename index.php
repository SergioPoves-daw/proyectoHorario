<?php
    $controlador = $_GET["controlador"];
    $metodo = $_GET["metodo"];

    require 'MVC/controlador/' . $_GET["controlador"] . '.php';
    $proceso = new $controlador();
    $datos = $proceso->$metodo();
?>