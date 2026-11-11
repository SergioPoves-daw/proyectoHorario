<?php
    require '../MVC/modelo/CmodeloHorario.php';

    class Chorario {
        public $vista;

        function insertarDatosHorario() {
            $datos = new Cmodelo();
            $asignaturas = $datos->obtenerAsignaturasClase();
            $this->vista = '../vista/altaHorario.php';
        }
    }
?>