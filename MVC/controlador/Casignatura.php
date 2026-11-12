<?php
    require 'MVC/modelo/Cmodelo.php';

    class Casignatura {
        public $mensaje;
        public $vista;

        // Obtener filas de la BD
        function obtenerAsignaturas() {
            $datos = new Cmodelo();
            $asignaturas = $datos->obtenerAsignaturas();
            $this->vista = 'MVC/vista/infoAsignaturas.php';
            include $this->vista;
        }
        
        // Obtiene la fila individual entera de la asignatura del ID correspondiente
        function obtenerAsignaturaModificar() {
            // Lo recibe del index.php que recibe el valor del header de vista/control.php
            $id = $_GET["id"];
    
            if ($this->validarIdAsignatura($id)) {
                $datos = new Cmodelo();
                $asignatura = $datos->obtenerAsignatura($id);
                $this->vista = 'MVC/vista/formularioModificar.php';
                include $this->vista;
            }

            else {
                header("Location: index.php?controlador=Casignatura&metodo=obtenerAsignaturas");
            }
        }
        
        function obtenerAsignaturaEliminar() {
            // Lo recibe del index.php que recibe el valor del header de vista/control.php
            $id = $_GET["id"];

            if ($this->validarIdAsignatura($id)) {
                $datos = new Cmodelo();
                $asignatura = $datos->obtenerAsignatura($id);
                $this->vista = 'MVC/vista/confirmarEliminar.php';
                include $this->vista;
            }

            else {
                header("Location: index.php?controlador=Casignatura&metodo=obtenerAsignaturas");
            }
        }

        // Insertar fila de nueva asignatura
        function insertarAsignatura() {
            // Recibe la información del formulario de vista/formularioInsertar.php
            $nombre = $_POST["nombre"];
            $codigo = $_POST["codigo"];
            $profesor = $_POST["profesor"];
            $clase = $_POST["clase"];

            $this->vista = 'MVC/vista/mensajeValidacion.php';

            if ($this->validar($nombre, $codigo) && !empty($profesor) && !empty($clase)) {
                $datos = new Cmodelo();    
                $datos->insertarAsignatura($nombre, $codigo, $profesor, $clase);
                $this->mensaje = "Asignatura añadida correctamente";
                
            }

            else {
                $this->mensaje = "Datos no válidos";
            }

            header("refresh: 3 url=index.php?controlador=Casignatura&metodo=obtenerAsignaturas");
            include $this->vista;
        }

        // Modifica la fila de una asignatura
        function modificarAsignatura() {
            // Lo recibe del form vista/formularioModificar.php
            $id = $_GET["id"];
            $nombre = $_POST["nombre"];
            $codigo = $_POST["codigo"];

            $this->vista = 'MVC/vista/mensajeValidacion.php';

            if ($this->validarIdAsignatura($id) && $this->validar($nombre, $codigo)) {
                $datos = new Cmodelo();
                $datos->modificarAsignatura($id, $nombre, $codigo);
                $this->mensaje = "Asignatura modificada correctamente";
            }

            else {
                $this->mensaje = "Datos no válidos";
            }            

            header("refresh:3 url=index.php?controlador=Casignatura&metodo=obtenerAsignaturas");
            include $this->vista;
        }

        // Elimina la fila de asignatura concreta
        function eliminarAsignatura() {
            // Lo recibe del <a href> de vista/confirmarEliminar.php
            $id = $_GET["id"];
            
            $this->vista = 'MVC/vista/mensajeValidacion.php';

            if (!empty($id)) {
                $datos = new Cmodelo();
                $datos->eliminarAsignatura($id);
                $this->mensaje = "Asignatura eliminada correctamente";
            }

            else {
                $this->mensaje = "Asignatura no encontrada";
            }

            header("refresh: 3 url=index.php?controlador=Casignatura&metodo=obtenerAsignaturas");
            include $this->vista;
        }

        // Obtener filas de profesores
        function obtenerProfesores() {
            $datos = new Cmodelo();
            $profesores = $datos->obtenerProfesores();
            $this->vista = 'MVC/vista/formularioInsertar.php';
            return $profesores;
        }

        // Obtener filas de clases
        function obtenerClases() {
            $datos = new Cmodelo();
            $clases = $datos->obtenerClases();
            $this->vista = 'MVC/vista/formularioInsertar.php';
            return $clases;
        }

        // Obtener las asignaturas de una clase concreta
        function obtenerAsignaturasClase($idClase) {
            if ($this->validarIdClase($idClase)) {
                $datos = new CmodeloHorario();
                $asignaturas = $datos->obtenerAsignaturasClase($idClase);
                $this->vista = 'MVC/vista/altaHorario.php';
                return $asignaturas;
            }

            else {
                header("Location: listarAsignaturas.php");
            }
        }

        // Obtener clases y profesores
        function obtenerClasesYProfesores() {
            $clasesProfesores = [
                "clases" => $this->obtenerClases(),
                "profesores" => $this->obtenerProfesores()
            ];

            $this->vista = 'MVC/vista/formularioInsertar.php';
            include $this->vista;
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