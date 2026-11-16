<?php
    class CmodeloHorario {
        private $conexion;

        function __construct() {
            require 'configdb.php';
            $this->conexion = $conexion;
        }

        function obtenerProfesorAsignatura($idAsignatura) {
            $sql = 'SELECT idProfesor FROM asignaturas WHERE idAsignatura = '. $idAsignatura . ';';
            $resultado = $this->conexion->query($sql);
            $profesor = $resultado->fetch_array();
            return $profesor["idProfesor"];
        }
    }
?>