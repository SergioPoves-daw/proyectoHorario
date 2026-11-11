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
            if ($this->validarIdAsignatura($id)) {
                $datos = new Cmodelo();
                $asignatura = $datos->obtenerAsignatura($id);
                $this->vista = '../MVC/vista/formularioModificar.php';
                return $asignatura;
            }

            else {
                header("Location: listarAsignaturas.php");
            }
        }
        
        function obtenerAsignaturaEliminar($id) {
            if ($this->validarIdAsignatura($id)) {
                $datos = new Cmodelo();
                $asignatura = $datos->obtenerAsignatura($id);
                $this->vista = '../MVC/vista/confirmarEliminar.php';
                return $asignatura;
            }

            else {
                header("Location: listarAsignaturas.php");
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
            if ($this->validarIdAsignatura($id) && $this->validar($nombre, $codigo)) {
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

        // Obtener filas de clases para alta horario
        function obtenerClasesHorario() {
            $datos = new Cmodelo();
            $clases = $datos->obtenerClases();
            $this->vista = '../MVC/vista/seleccionarClaseAltaHorario.php';
            return $clases;
        }

        // Obtener las asignaturas de una clase concreta
        function obtenerAsignaturasClase($idClase) {
            if ($this->validarIdClase($idClase)) {
                $datos = new CmodeloHorario();
                $asignaturas = $datos->obtenerAsignaturasClase($idClase);
                $this->vista = '../MVC/vista/altaHorario.php';
                return $asignaturas;
            }

            else {
                header("Location: listarAsignaturas.php");
            }
        }

        /* VALIDACIONES */
         // Validar que existen las variables y que no estén vacías
        function validar($nombre, $codigo) {
            return !empty($nombre) && !empty($codigo);
        }

        // Validar el id de la asignatura
        function validarIdAsignatura($id) {
            $datos = new Cmodelo();
            $existe = $datos->obtenerAsignatura($id);
            if ($existe) return true;
            if (!$existe) return false;
        }

        // Validar el id de la clase
        function validarIdClase($idClase) {
            $datos = new Cmodelo();
            $existe = $datos->obtenerClase($idClase);
            if ($existe) return true;
            if (!$existe) return false;
        }
    }
?>