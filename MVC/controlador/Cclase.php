<?php
    require 'MVC/modelo/CmodeloClase.php';
    require 'MVC/modelo/CmodeloAsignatura.php';

    class Cclase {

    // Obtener filas de clases
        function obtenerClases() {
            $datos = new CmodeloClase();
            $clases = $datos->obtenerClases();
            $this->vista = 'MVC/vista/formularioInsertar.php';
            return $clases;
        }
        
        // Obtener filas de profesores
        function obtenerProfesores() {
            $datos = new CmodeloAsignatura();
            $profesores = $datos->obtenerProfesores();
            $this->vista = 'MVC/vista/formularioInsertar.php';
            return $profesores;
        }

        // Obtener clases y profesores
        function obtenerClasesYProfesores() {
            $clases = new CmodeloClase();
            $clasesProfesores = [
                "clases" => $clases->obtenerClases(),
                "profesores" => $this->obtenerProfesores()
            ];

            $this->vista = 'MVC/vista/formularioInsertar.php';
            return $clasesProfesores;
        }
    }
?>