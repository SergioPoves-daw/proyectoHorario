<?php
    $idAsignatura = $_POST["asignatura"];
    $idClase = $_GET["clase"];
    $hora = $_GET["hora"];
    $dia = $_GET["dia"];

    echo '<p>' . $idClase . ': '. $dia . ': ' . $hora . '</p>';
    foreach ($idAsignatura as $asignatura) {
        echo '<p>' . $asignatura . '</p>';
    }
?>