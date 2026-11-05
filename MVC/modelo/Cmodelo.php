<?php
    // Solo SQL (por ejemplo la entrada de datos)
    // Todo lo de mysqli aquí, incluso el fetch, para usarlo en la vista
    class Cmodelo {
        private $conexion;

        function __construct() {
            require 'configdb.php';
            $this->conexion = $conexion;
        }

        function obtenerAsignaturas() {
            $sql = "SELECT * FROM asignaturas";
            $resultado = $this->conexion->query($sql);
            $asignaturas = [];

            if ($resultado->num_rows > 0) {
                while ($filas = $resultado->fetch_array()) {
                    $asignaturas[] = $filas;
                }
            }

            return $asignaturas;
        }

        function obtenerAsignatura($id) {
            $sql = 'SELECT * FROM asignaturas WHERE idAsignatura = ' . $id . ';';
            $resultado = $this->conexion->query($sql);
            $asignatura = $resultado->fetch_assoc();
            return $asignatura;
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