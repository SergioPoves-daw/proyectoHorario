<?php
    require '../MVC/modelo/CmodeloHorario.php';

    class Chorario {
        public $vista;

        function obtenerAsignaturasClase($idClase) {
            $datos = new CmodeloHorario();
            $asignaturas = $datos->obtenerAsignaturasClase($idClase);
            $this->vista = '../MVC/vista/altaHorario.php';
            return $asignaturas;
        }

        function insertarDatosHorario() {
            $datos = new Cmodelo();
            $asignaturas = $datos->obtenerAsignaturasClase();
            $this->vista = '../vista/altaHorario.php';
        }
    }
?>