<?php
    require 'MVC/modelo/CmodeloClase.php';

    class Cclase {

    // Obtener filas de clases
        function obtenerClases() {
            $datos = new CmodeloClase();
            $clases = $datos->obtenerClases();
            $this->vista = 'MVC/vista/formularioInsertar.php';
            return $clases;
        }
    }
?>