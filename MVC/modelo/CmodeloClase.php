<?php
    class CmodeloClase {
        private $conexion;

        function __construct() {
            require 'configdb.php';
            $this->conexion = $conexion;
        }

        // Obtener todas las clases
        function obtenerClases() {
            $sql = 'SELECT * FROM clases;';
            $resultado = $this->conexion->query($sql);
            $clases = [];

            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    $clases[] = $fila;
                }
            }
            return $clases;
        }

        // Obtener una clase concreta
        function obtenerClase($idClase) {
            $sql = 'SELECT * FROM clases WHERE idClase = ' . $idClase . ';';
            $resultado = $this->conexion->query($sql);
            $clase = $resultado->fetch_assoc();
            return $clase;
        }
    }
?>