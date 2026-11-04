<?php
    include 'Casignatura.php';

    function insertarDatosHorario() {
        $datos = new Cmodelo();
        $asignaturas = $datos->obtenerAsignaturas();
        $vista = './../vista/altaHorario.php'; // Tendría que ser $this->vista
        include $vista;
    }

    insertarDatosHorario();
?>