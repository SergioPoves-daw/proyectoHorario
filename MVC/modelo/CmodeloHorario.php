<?php
    class CmodeloHorario {
        private $conexion;

        function __construct() {
            require 'configdb.php';
            $this->conexion = $conexion;
        }

        function obtenerAsignaturasClase($idClase) {
            $sql = "SELECT * FROM asignaturas WHERE idClase = " . $idClase;
            $resultado = $this->conexion->query($sql);
            $asignaturas = [];
            
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    $asignaturas[] = $fila;
                }
            }
            return $asignaturas;
        }
    }
?>