<?php
    require '../MVC/modelo/Cmodelo.php';

    class Casignatura {
        public $mensaje;
        public $vista;

        // Obtener filas de la BD
        function obtenerAsignaturas() {
            $datos = new Cmodelo();
            $asignaturas = $datos->obtenerAsignaturas();
            $this->vista = '../MVC/vista/infoAsignaturas.php'; // Cambiar a relativa
            return $asignaturas;
        }
        
        // Obtiene la fila individual entera de la asignatura del ID correspondiente
        function obtenerAsignatura($id) {
            $datos = new Cmodelo();
            $asignatura = $datos->obtenerAsignatura($id);
            $this->vista = '../MVC/vista/infoAsignaturas.php';
            include $vista;
        }

        function insertarDatosHorario() {
            $datos = new Cmodelo();
            $asignaturas = $datos->obtenerAsignaturasClase(2);
            $this->vista = './../vista/altaHorario.php';
            include $vista;
        }

        /*
        // Insertar fila
        function insertarDatos($asignatura, $color) {
            $sql = 'INSERT INTO asignaturas(nombre, color) VALUES("' . $asignatura . '", "' . $color . '");';
            $resultado = $this->conexion->query($sql);
            $this->mensaje = "Asignatura añadida";
        }

        // Modifica la fila
        function modificarFila($id, $nombre, $color) {
            $sql = 'UPDATE asignaturas SET nombre ="' . $nombre . '", color="' . $color . '" WHERE idAsignatura = ' . $id . ';';
            $this->conexion->query($sql);
            $this->mensaje = "Asignatura modificada";
        }

        // Elimina la fila
        function eliminarAsignatura($id) {
            $sql = 'DELETE FROM asignaturas WHERE idAsignatura = ' . $id . ';';
            $this->conexion->query($sql);
            $this->mensaje = "Asignatura eliminada";
        }*/
    }
?>