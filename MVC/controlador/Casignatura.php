<?php
    require 'MVC/modelo/CmodeloAsignatura.php';
    require 'MVC/modelo/CmodeloClase.php';

    class Casignatura {
        public $mensaje;
        public $vista;

        // Obtener filas de la BD
        function obtenerAsignaturas() {
            $datos = new CmodeloAsignatura();
            $asignaturas = $datos->obtenerAsignaturas();
            $this->vista = 'MVC/vista/infoAsignaturas.php';
            return $asignaturas;
        }
        
        // Obtiene la fila individual entera de la asignatura del ID correspondiente
        function obtenerAsignaturaModificar() {
            // Lo recibe del index.php que recibe el valor del header de vista/control.php
            $id = $_GET["id"];
    
            if ($id && $this->validarIdAsignatura($id)) {
                $datos = new CmodeloAsignatura();
                $asignatura = $datos->obtenerAsignatura($id);
                $this->vista = 'MVC/vista/formularioModificar.php';
                return $asignatura;
            }
            
            $this->mensaje = "Validación incorrecta";
            $this->vista = "MVC/vista/mensajeValidacion.php";
        }
        
        function obtenerAsignaturaEliminar() {
            // Lo recibe del index.php que recibe el valor del header de vista/control.php
            $id = $_GET["id"];

            if ($this->validarIdAsignatura($id)) {
                $datos = new CmodeloAsignatura();
                $asignatura = $datos->obtenerAsignatura($id);
                $this->vista = 'MVC/vista/confirmarEliminar.php';
                return $asignatura;
                
            }

            $this->mensaje = "Validación incorrecta";
            $this->vista = "MVC/vista/mensajeValidacion.php";
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
                $datos = new CmodeloAsignatura();    
                $datos->insertarAsignatura($nombre, $codigo, $profesor, $clase);
                $this->mensaje = "Asignatura añadida correctamente";
                
            }

            else {
                $this->mensaje = "Datos no válidos";
            }
        }

        // Modifica la fila de una asignatura
        function modificarAsignatura() {
            // Lo recibe del form vista/formularioModificar.php
            $id = $_GET["id"];
            $nombre = $_POST["nombre"];
            $codigo = $_POST["codigo"];

            $this->vista = 'MVC/vista/mensajeValidacion.php';

            if ($this->validarIdAsignatura($id) && $this->validar($nombre, $codigo)) {
                $datos = new CmodeloAsignatura();
                $datos->modificarAsignatura($id, $nombre, $codigo);
                $this->mensaje = "Asignatura modificada correctamente";
            }

            else {
                $this->mensaje = "Datos no válidos";
            }
        }

        // Elimina la fila de asignatura concreta
        function eliminarAsignatura() {
            // Lo recibe del <a href> de vista/confirmarEliminar.php
            $id = $_GET["id"];
            
            $this->vista = 'MVC/vista/mensajeValidacion.php';

            if (!empty($id)) {
                $datos = new CmodeloAsignatura();
                $datos->eliminarAsignatura($id);
                $this->mensaje = "Asignatura eliminada correctamente";
            }

            else {
                $this->mensaje = "Asignatura no encontrada";
            }
        }

        // Obtener las asignaturas de una clase concreta
        function obtenerAsignaturasClase($idClase) {
            if ($idClase && $this->validarIdClase($idClase)) {
                $datos = new CmodeloAsignatura();
                $asignaturas = $datos->obtenerAsignaturasClase($idClase);
                $this->vista = 'MVC/vista/altaHorario.php';
                return $asignaturas;
            }

            else {
                $this->mensaje = "Datos no válidos";
                $this->vista = "MVC/vista/mensajeValidacion.php";
            }
        }

        /* VALIDACIONES */
         // Validar que existen las variables y que no estén vacías
        function validar($nombre, $codigo) {
            return !empty($nombre) && !empty($codigo);
        }

        // Validar el id de la asignatura
        function validarIdAsignatura($id) {
            $datos = new CmodeloAsignatura();
            $existe = $datos->obtenerAsignatura($id);
            if ($existe) return true;
            if (!$existe) return false;
        }

        // Validar el id de la clase
        function validarIdClase($idClase) {
            $datos = new CmodeloClase();
            $existe = $datos->obtenerClase($idClase);
            if ($existe) return true;
            if (!$existe) return false;
        }
    }
?>