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
        function obtenerAsignaturaModificar($id) {
            $datos = new Cmodelo();
            $asignatura = $datos->obtenerAsignatura($id);
            $this->vista = '../MVC/vista/formularioModificar.php';
            return $asignatura;
        }
        
        function obtenerAsignaturaEliminar($id) {
            $datos = new Cmodelo();
            $asignatura = $datos->obtenerAsignatura($id);
            $this->vista = '../MVC/vista/confirmarEliminar.php';
            return $asignatura;
        }

        // Insertar fila
        function insertarAsignatura($nombre, $codigo, $profesor, $clase) {
            if ($this->validar($nombre, $codigo)) {
            $datos = new Cmodelo();    
            $datos->insertarAsignatura($nombre, $codigo, $profesor, $clase);
                $this->mensaje = "Asignatura añadida";
            }

            else {
                $this->mensaje = "Datos no válidos";
            }
        }

        // Modifica la fila
        function modificarAsignatura($id, $nombre, $codigo) {
            if ($this->validar($nombre, $codigo)) {
                $datos = new Cmodelo();
                $datos->modificarAsignatura($id, $nombre, $codigo);
                $this->mensaje = "Asignatura modificada";
            }

            else {
                $this->mensaje = "Datos no válidos";
            }            
        }

        // Elimina la fila
        function eliminarAsignatura($id) {
            if (!empty($id)) {
                $datos = new Cmodelo();
                $datos->eliminarAsignatura($id);
                $this->mensaje = "Asignatura eliminada correctamente";
            }
            else {
                $this->mensaje = "Asignatura no encontrada";
            }
        }

        // Validar que existen las variables y que no estén vacías
        function validar($nombre, $codigo) {
            return !empty($nombre) && !empty($codigo);
        }

        // Obtener filas de profesores
        function obtenerProfesores() {
            $datos = new Cmodelo();
            $profesores = $datos->obtenerProfesores();
            $this->vista = '../MVC/vista/formularioInsertar.php';
            return $profesores;
        }

        // Obtener filas de clases
        function obtenerClases() {
            $datos = new Cmodelo();
            $clases = $datos->obtenerClases();
            $this->vista = '../MVC/vista/formularioInsertar.php';
            return $clases;
        }

        /*function insertarDatosHorario() {
            $datos = new Cmodelo();
            $asignaturas = $datos->obtenerAsignaturasClase(2);
            $this->vista = './../vista/altaHorario.php';
            include $vista;
        }*/
    }
?>