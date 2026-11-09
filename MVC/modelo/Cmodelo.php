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

        function insertarAsignatura($asignatura, $codigo, $profesor, $clase) {
            $sql = 'INSERT INTO asignaturas(nombre, codigo, idProfesor, idClase) VALUES("' . $asignatura . '", "' . $codigo . '", ' . $profesor . ', ' . $clase . ');';
            $this->conexion->query($sql);
        }

        function modificarAsignatura($id, $nombre, $codigo) {
            $sql = 'UPDATE asignaturas SET nombre ="' . $nombre . '", codigo="' . $codigo . '" WHERE idAsignatura = ' . $id . ';';
            $this->conexion->query($sql);
        }

        function eliminarAsignatura($id) {
            $sql = 'DELETE FROM asignaturas WHERE idAsignatura = ' . $id . ';';
            $this->conexion->query($sql);
        }

        function obtenerProfesores() {
            $sql = 'SELECT * FROM profesores';
            $resultado = $this->conexion->query($sql);
            $profesores = [];

            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    $profesores[] = $fila;
                }
            }
            return $profesores;
        }

        function obtenerClases() {
            $sql = 'SELECT * FROM clases';
            $resultado = $this->conexion->query($sql);
            $clases = [];

            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    $clases[] = $fila;
                }
            }
            return $clases;
        }
    }
?>