<?php
    function obtenerAsignatura($id) {
        $sql = 'SELECT * FROM asignaturas WHERE idAsignatura = ' . $id . ';';
        $resultado = $this->conexion->query($sql);
        $asignatura = $resultado->fetch_assoc();
        return $asignatura;
    }
?>