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
            if (!empty($id)) {
                $datos = new Cmodelo();
                $asignatura = $datos->obtenerAsignatura($id);
                $this->vista = '../MVC/vista/formularioModificar.php';
                return $asignatura;
            }

            else {
                $this->vista = '../MVC/vista/infoAsignaturas.php';
            }
        }
        
        function obtenerAsignaturaEliminar($id) {
            if (!empty($id)) {
                $datos = new Cmodelo();
                $asignatura = $datos->obtenerAsignatura($id);
                $this->vista = '../MVC/vista/confirmarEliminar.php';
                $this->validarId($id);
                return $asignatura;
            }

            else {
                $this->vista = '../MVC/vista/infoAsignaturas.php';
            }
        }

        // Insertar fila de nueva asignatura
        function insertarAsignatura($nombre, $codigo, $profesor, $clase) {
            if ($this->validar($nombre, $codigo) && !empty($profesor) && !empty($clase)) {
                $datos = new Cmodelo();    
                $datos->insertarAsignatura($nombre, $codigo, $profesor, $clase);
                $this->mensaje = "Asignatura añadida correctamente";
                header("refresh: 3 url=listarAsignaturas.php");
            }

            else {
                $this->mensaje = "Datos no válidos";
                header("refresh: 3 url=listarAsignaturas.php");
            }
        }

        // Modifica la fila de una asignatura
        function modificarAsignatura($id, $nombre, $codigo) {
            if ($this->validar($nombre, $codigo) && !empty($id)) {
                $datos = new Cmodelo();
                $datos->modificarAsignatura($id, $nombre, $codigo);
                $this->mensaje = "Asignatura modificada correctamente";
                header("refresh:3 url=listarAsignaturas.php");
            }

            else {
                $this->mensaje = "Datos no válidos";
                header("refresh:3 url=listarAsignaturas.php");
            }            
        }

        // Elimina la fila de asignatura concreta
        function eliminarAsignatura($id) {
            if (!empty($id)) {
                $datos = new Cmodelo();
                $datos->eliminarAsignatura($id);
                $this->vista = '../MVC/vista/infoAsignaturas.php';
                $this->mensaje = "Asignatura eliminada correctamente";
                header("refresh: 3 url=listarAsignaturas.php");
            }

            else {
                $this->mensaje = "Asignatura no encontrada";
                header("refresh: 3 url=listarAsignaturas.php");
            }
        }

        // Validar que existen las variables y que no estén vacías
        function validar($nombre, $codigo) {
            return !empty($nombre) && !empty($codigo);
        }

        function validarId($id) {
            $datos = new Cmodelo();
            $existe = $datos->obtenerAsignatura($id);
            if ($existe) echo true;
            if ($existe == null) echo false;
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
    }
?>