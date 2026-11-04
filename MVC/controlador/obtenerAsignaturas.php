<?php
    include 'Casignatura.php';

    function obtenerAsignaturas() {
        $datos = new Cmodelo();
        $asignaturas = $datos->obtenerAsignaturas();
        $vista = './../vista/infoAsignaturas.php'; // Tendría que ser $this->vista
        include $vista;
    }

    obtenerAsignaturas();
?>