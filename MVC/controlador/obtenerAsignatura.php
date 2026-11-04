<?php
    include 'Casignatura.php';

    function obtenerAsignatura($id) {
        $datos = new Cmodelo();
        $asignatura = $datos->obtenerAsignatura($id);
        $this->vista = './../vista/formularioVista';
        include $vista;
    }
?>