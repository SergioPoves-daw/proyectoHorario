<?php
    function obtenerHorario() {
        $sql = 'SELECT * FROM horario';
        $resultado = $this->conexion->$query($sql);
        
    }
?>