<?php
    class Cconexion {
        private $conexion;

        function __construct() {
            require 'configdb.php';
            $this->conexion = $conexion;
        }
    }
?>