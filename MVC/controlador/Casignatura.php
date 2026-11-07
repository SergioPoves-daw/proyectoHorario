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
            $this->vista = '../MVC/vista/formularioModificar.php';
            return $asignatura;
        }

        function insertarDatosHorario() {
            $datos = new Cmodelo();
            $asignaturas = $datos->obtenerAsignaturasClase(2);
            $this->vista = './../vista/altaHorario.php';
            include $vista;
        }
        
        // Insertar fila
        function insertarAsignatura($nombre, $codigo, $profesor, $clase) {
            $datos = new Cmodelo();

            if ($this->validar($nombre, $codigo)) {
                $datos->insertarAsignatura($nombre, $codigo, $profesor, $clase);
                $this->mensaje = "Asignatura añadida";
            }

            else {
                $this->mensaje = "Datos no válidos";
            }
        }

        // Modifica la fila
        function modificarAsignatura($id, $nombre, $codigo) {
            $datos = new Cmodelo();

            if ($this->validar($nombre, $codigo)) {
                $datos->modificarAsignatura($id, $nombre, $codigo);
                $this->mensaje = "Asignatura modificada";
            }

            else {
                $this->mensaje = "Datos no válidos";
            }            
        }

        // Validar que existen las variables y que no estén vacías
        function validar($nombre, $codigo) {
            return !empty($nombre) && !empty($codigo);
        }

        /* Elimina la fila
        function eliminarAsignatura($id) {
            $sql = 'DELETE FROM asignaturas WHERE idAsignatura = ' . $id . ';';
            $this->conexion->query($sql);
            $this->mensaje = "Asignatura eliminada";
        }*/

        function obtenerProfesores() {
            $datos = new Cmodelo();
            $profesores = $datos->obtenerProfesores();
            $this->vista = '../MVC/vista/formularioInsertar.php';
            return $profesores;
        }

        function obtenerClases() {
            $datos = new Cmodelo();
            $clases = $datos->obtenerClases();
            $this->vista = '../MVC/vista/formularioInsertar.php';
            return $clases;
        }
    }
?>