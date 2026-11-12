<?php
    require 'MVC/modelo/CmodeloHorario.php';

    class Chorario {
        public $vista;

        // Obtiene las filas de clases para alta horario
        function obtenerClasesHorario() {
            $datos = new CmodeloHorario();
            $clases = $datos->obtenerClases();
            $this->vista = 'MVC/vista/seleccionarClaseAltaHorario.php';
            include $this->vista;
        }

        // Recoge los datos del formulario de horario
        function introducirDatosHorario() {
            $idClase = $_POST["clase"];

            $horas = [
                0 => "8:15-9:10",
                1 => "9:10-10:05",
                2 => "10:05-11:00",
                3 => "11:30-12:25",
                4 => "12:25-13:20",
                5 => "13:20-14:15",
                6 => "14:15-15:30"
            ];

            $datos = new CmodeloHorario();
            $asignaturas = $datos->obtenerAsignaturasClase($idClase);
            $this->vista = 'MVC/vista/altaHorario.php';
            include $this->vista;
        }
    }
?>