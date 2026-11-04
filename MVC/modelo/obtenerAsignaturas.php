<?php
    function obtenerAsignaturas() {
        $sql = "SELECT * FROM asignaturas";
        $resultado = $this->conexion->query($sql);
        $asignaturas = [];

        if ($resultado->num_rows > 0) {
            while ($filas = $resultado->fetch_array()) {
                $asignaturas[] = $filas;
            }
        }

        return $asignaturas;
    }
?>