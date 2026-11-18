<?php
    class CmodeloHorario {
        private $conexion;

        function __construct() {
            require 'configdb.php';
            $this->conexion = $conexion;
        }

        function insertarHorario($horario) {
            $this->conexion->begin_transaction();

            try {
                // Se inserta hora por hora
                foreach ($horario as $hora) {
                    $sql = 'INSERT INTO horario(idClase, idAsignatura, idProfesor, dia, hora) VALUES
                    (' . $hora["clase"] . ', ' . $hora["asignatura"] . ', ' . $hora["profesor"] . ', "' . $hora["dia"] . '", ' . $hora["hora"] . ')';
                    $this->conexion->query($sql);
                }

                // Si no hay errores
                $this->conexion->commit();
                return true;
            }

            catch (Exception $e) {
                $this->conexion->rollback();
                throw $e;
                return false;
            }
        }

        function obtenerFilaHorario($idClase) {
            $sql = 'SELECT * FROM horario WHERE idClase =' . $idClase . ';';
            $resultado = $this->conexion->query($sql);

            if ($resultado->num_rows > 0) return true;
            else return false;
        }
    }
?>