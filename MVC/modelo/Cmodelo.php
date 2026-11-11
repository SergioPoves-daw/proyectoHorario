<?php
    // Solo SQL (por ejemplo la entrada de datos)
    // Todo lo de mysqli aquí, incluso el fetch, para usarlo en la vista
    class Cmodelo {
        private $conexion;

        function __construct() {
            require 'configdb.php';
            $this->conexion = $conexion;
        }

        // Obtener todas las asignaturas
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

        // Obtener una asignatura concreta
        function obtenerAsignatura($id) {
            $sql = 'SELECT * FROM asignaturas WHERE idAsignatura = ' . $id . ';';
            $resultado = $this->conexion->query($sql);
            $asignatura = $resultado->fetch_assoc();
            return $asignatura;
        }

        // Insertar una asignatura
        function insertarAsignatura($asignatura, $codigo, $profesor, $clase) {
            $sql = 'INSERT INTO asignaturas(nombre, codigo, idProfesor, idClase) VALUES("' . $asignatura . '", "' . $codigo . '", ' . $profesor . ', ' . $clase . ');';
            $this->conexion->query($sql);
        }

        // Modificar una asignatura concreta
        function modificarAsignatura($id, $nombre, $codigo) {
            $sql = 'UPDATE asignaturas SET nombre ="' . $nombre . '", codigo="' . $codigo . '" WHERE idAsignatura = ' . $id . ';';
            $this->conexion->query($sql);
        }

        // Eliminar una asignatura concreta
        function eliminarAsignatura($id) {
            $sql = 'DELETE FROM asignaturas WHERE idAsignatura = ' . $id . ';';
            $this->conexion->query($sql);
        }

        // Obtener todos los profesores
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

        // Obtener todas las clases
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

        // Obtener una clase concreta
        function obtenerClase($idClase) {
            $sql = 'SELECT * FROM clases WHERE idClase = ' . $idClase . ';';
            $resultado = $this->conexion->query($sql);
            $clase = $resultado->fetch_assoc();
            return $clase;
        }
    }
?>