<?php
    require 'MVC/modelo/CmodeloHorario.php';

    class Chorario {
        public $vista;

        // Obtiene las filas de clases para alta horario
        function obtenerClasesHorario() {
            $datos = new CmodeloHorario();
            $clases = $datos->obtenerClases();
            $this->vista = 'MVC/vista/seleccionarClaseAltaHorario.php';
            return $clases;
        }

        // Recoge los datos del formulario de horario
        function introducirDatosHorario() {
            $datos = new CmodeloHorario();

            // Recoger valores principales para la consulta
            if (isset($_POST["clase"])) $idClase = $_POST["clase"]; // Recibe el id de la clase
            if (isset($_POST["asignaturas"])) $idAsignaturas = $_POST["asignaturas"]; // Recibe un array del id de las asignaturas seleccionadas
            if (isset($_POST["asignaturas"])) foreach ($idAsignaturas as $asignatura) $profesores[] = $datos->obtenerProfesorAsignatura($asignatura);

            if (isset($_POST["dia"])) $dia = $_POST["dia"];
            else $dia = "L";

            if (isset($_POST["horas"])) $horaAsignaturas = $_POST["horas"];

            if (isset($_POST["clase"]) && isset($_POST["asignaturas"]) && $profesores && $dia && isset($_POST["horas"])) {
                /* Visualizar datos
                echo $idClase;
                foreach ($idAsignaturas as $asignatura) echo '[' . $asignatura . ']';
                foreach ($profesores as $profesor) echo '(' . $profesor . ')';
                echo $dia;
                foreach ($horaAsignaturas as $hora) echo '{' . $hora . '}';*/

                // Visualización simulación consulta
                echo 'Consulta hora 1: ' . $idClase . ', ' . $idAsignaturas[0] . ', ' . $profesores[0] . ', ' . $dia . ', ' . $horaAsignaturas[0] . ';<br>';
                echo 'Consulta hora 2: ' . $idClase . ', ' . $idAsignaturas[1] . ', ' . $profesores[1] . ', ' . $dia . ', ' . $horaAsignaturas[1] . ';<br>';
                echo 'Consulta hora 3: ' . $idClase . ', ' . $idAsignaturas[2] . ', ' . $profesores[2] . ', ' . $dia . ', ' . $horaAsignaturas[2] . ';<br>';
                echo 'Consulta hora 4: ' . $idClase . ', ' . $idAsignaturas[3] . ', ' . $profesores[3] . ', ' . $dia . ', ' . $horaAsignaturas[3] . ';<br>';
                echo 'Consulta hora 5: ' . $idClase . ', ' . $idAsignaturas[4] . ', ' . $profesores[4] . ', ' . $dia . ', ' . $horaAsignaturas[4] . ';<br>';
                echo 'Consulta hora 6: ' . $idClase . ', ' . $idAsignaturas[5] . ', ' . $profesores[5] . ', ' . $dia . ', ' . $horaAsignaturas[5] . ';<br>';
            }

            // HORAS
            $horas = [
                1 => "8:15-9:10",
                2 => "9:10-10:05",
                3 => "10:05-11:00",
                4 => "11:30-12:25",
                5 => "12:25-13:20",
                6 => "13:20-14:15",
                7 => "14:15-15:30"
            ];

            // DIAS
            $dias = [
                "L" => "Lunes",
                "M" => "Martes",
                "X" => "Miércoles",
                "J" => "Jueves",
                "V" => "Viernes"
            ];

            // SABER DÍA SIGUIENTE
            switch ($dia) {
                case "L": 
                    $siguienteDia = "M";
                    break;

                case "M":
                    $siguienteDia = "X";
                    break;

                case "X":
                    $siguienteDia = "J";
                    break;

                case "J":
                    $siguienteDia = "V";
                    break;
            }

            // SABER CUÁNDO ES VIERNES
            if (isset($_POST["dia"]) && $_POST["dia"] == "V") {
                header("Location: index.php");
            }

            // $datosHorario[] = [$idClase, $idAsignaturas, $profesores, $dia, $horaAsignaturas];

            // FUNCIÓN PRINCIPAL
            $asignaturas = $datos->obtenerAsignaturasClase($idClase);
            $this->vista = 'MVC/vista/altaHorario.php';

            $datos = [
                "clase" => $idClase, 
                "asignaturas" => $asignaturas, 
                "dias" => $dias,
                "dia" => $dia,
                "siguienteDia" => $siguienteDia,
                "horas" => $horas
            ];

            return $datos;
        }
    }
?>